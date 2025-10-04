#!/usr/bin/env bash
set -euo pipefail

if ! command -v docker >/dev/null 2>&1; then
  echo "Docker が必要です。インストール後に再実行してください。" >&2
  exit 1
fi

COMPOSE_BIN="docker compose"
if ! docker compose version >/dev/null 2>&1; then
  if command -v docker-compose >/dev/null 2>&1; then
    COMPOSE_BIN="docker-compose"
  else
    echo "docker compose (または docker-compose) が見つかりません。" >&2
    exit 1
  fi
fi

if [ ! -f .env ]; then
  echo ".env が存在しません。.env.example を複製して設定してください。" >&2
  exit 1
fi

${COMPOSE_BIN} up -d db wordpress

if ${COMPOSE_BIN} run --rm wpcli core is-installed >/dev/null 2>&1; then
  echo "WordPress は既にセットアップ済みです。" >&2
  exit 0
fi

source .env

${COMPOSE_BIN} run --rm wpcli core install \
  --url="${WORDPRESS_SITE_URL}" \
  --title="${WORDPRESS_SITE_TITLE}" \
  --admin_user="${WORDPRESS_ADMIN_USER}" \
  --admin_password="${WORDPRESS_ADMIN_PASSWORD}" \
  --admin_email="${WORDPRESS_ADMIN_EMAIL}"

${COMPOSE_BIN} run --rm wpcli theme activate circle-smile

FRONT_PAGE_ID=$(${COMPOSE_BIN} run --rm wpcli post create \
  --post_type=page \
  --post_status=publish \
  --post_title='ホーム' \
  --post_name=front-page \
  --porcelain)

${COMPOSE_BIN} run --rm wpcli option update show_on_front page
${COMPOSE_BIN} run --rm wpcli option update page_on_front "${FRONT_PAGE_ID}"

create_page() {
  local slug="$1"
  local title="$2"
  local body="$3"
  local existing
  existing=$(${COMPOSE_BIN} run --rm wpcli post list --post_type=page --pagename="${slug}" --field=ID)
  if [ -n "${existing}" ]; then
    echo "ページ '${slug}' は既に存在します (ID: ${existing})" >&2
    return
  fi
  ${COMPOSE_BIN} run --rm wpcli post create \
    --post_type=page \
    --post_status=publish \
    --post_title="${title}" \
    --post_name="${slug}" \
    --post_content="${body}"
}

create_page "about" "概要" "コンテンツを編集してください。"
create_page "profiles" "メンバー紹介" "コンテンツを編集してください。"
create_page "contact" "お問い合わせ" "コンテンツを編集してください。"
create_page "faq" "FAQ" "コンテンツを編集してください。"

${COMPOSE_BIN} run --rm wpcli cache flush >/dev/null

echo "WordPress セットアップが完了しました。管理画面: ${WORDPRESS_SITE_URL}/wp-admin"
