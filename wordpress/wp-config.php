<?php
// WordPress 基本設定
$env = static function (string $key, $default = '') {
    $value = getenv($key);
    return $value !== false ? $value : $default;
};

define('DB_NAME', $env('WORDPRESS_DB_NAME', 'wordpress'));
define('DB_USER', $env('WORDPRESS_DB_USER', 'wordpress'));
define('DB_PASSWORD', $env('WORDPRESS_DB_PASSWORD', 'wordpress'));
define('DB_HOST', $env('WORDPRESS_DB_HOST', 'db'));
define('DB_CHARSET', 'utf8mb4');
define('DB_COLLATE', '');

$table_prefix = $env('WORDPRESS_TABLE_PREFIX', 'wp_');

define('WP_HOME', $env('WORDPRESS_SITE_URL', 'http://localhost:8080'));
define('WP_SITEURL', $env('WORDPRESS_SITE_URL', 'http://localhost:8080'));

// 認証用ユニークキーとソルト
$default_key = 'change-me-please';
define('AUTH_KEY', $env('WORDPRESS_AUTH_KEY', $default_key));
define('SECURE_AUTH_KEY', $env('WORDPRESS_SECURE_AUTH_KEY', $default_key));
define('LOGGED_IN_KEY', $env('WORDPRESS_LOGGED_IN_KEY', $default_key));
define('NONCE_KEY', $env('WORDPRESS_NONCE_KEY', $default_key));
define('AUTH_SALT', $env('WORDPRESS_AUTH_SALT', $default_key));
define('SECURE_AUTH_SALT', $env('WORDPRESS_SECURE_AUTH_SALT', $default_key));
define('LOGGED_IN_SALT', $env('WORDPRESS_LOGGED_IN_SALT', $default_key));
define('NONCE_SALT', $env('WORDPRESS_NONCE_SALT', $default_key));

// デバッグ設定
if (!defined('WP_DEBUG')) {
    define('WP_DEBUG', filter_var($env('WP_DEBUG', false), FILTER_VALIDATE_BOOLEAN));
}

// 絶対パス設定
if (!defined('ABSPATH')) {
    define('ABSPATH', __DIR__ . '/');
}

require_once ABSPATH . 'wp-settings.php';
