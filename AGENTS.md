# Repository Guidelines

## Project Structure & Module Organization
- `index.html` renders the public landing page with Tailwind CDN plus custom rules from `assets/css/home.css`.
- `pages/<slug>/index.html` hosts secondary screens; keep relative links (`../..`) intact when duplicating layouts.
- `assets/css/*.css` stores page-specific gradients and animation helpers; extend these files instead of inlining large `<style>` blocks.
- `assets/videos/` holds the hero loop in both `.webm` and `.mp4`; replace media with compressed exports under 5 MB.
- `circle-smile/articles/*.md` tracks long-form copy sources—update the paired Markdown when editing the rendered HTML.
- `3px.jp/` is a legacy snapshot kept for reference; only touch it when porting copy into the new structure.

## Build, Test, and Development Commands
- `python3 -m http.server 4173` from the repo root serves the entire site at `http://localhost:4173`.
- `npx live-server --open=index.html` starts an auto-reloading preview for quick iterations.
- `npx htmlhint index.html pages/**/*.html` quickly lint-checks markup using HtmlHint's defaults; add a `.htmlhintrc` alongside if custom rules are needed.

## Coding Style & Naming Conventions
- Format HTML with 4-space indentation and tidy closing tags to match the current templates.
- Favor Tailwind utility classes for layout, then layer reusable custom classes defined in `assets/css` (use lowercase-hyphen names).
- Keep inline scripts and styles minimal; move reusable logic into `assets/js/` should one be introduced.
- Asset filenames stay lowercase with hyphens, e.g., `assets/videos/hero-loop.webm`.

## Testing Guidelines
- Before committing, run the HtmlHint check above and open the page bundle in Chrome, Firefox, and Safari responsive views.
- Verify the mobile menu toggle, hero video autoplay, and cross-page navigation after any layout change.
- When editing translations or copy, compare against the Markdown source to prevent drift.

## Commit & Pull Request Guidelines
- Follow the existing Conventional Commit pattern (`feat:`, `fix:`, `style:`, `chore:`) with concise, imperative summaries.
- Group related HTML/CSS updates into a single commit; mention affected routes (e.g., `pages/faq`).
- Pull requests should include a short description, manual test notes, and before/after screenshots for visual tweaks.
- Link any tracking issue or reference doc, and request at least one review before merging.

## Content & Asset Workflow
- When updating imagery or video, include source credits in the PR description and confirm licensing.
- Keep Japanese copy authoritative; add English comments only when context would be unclear to future editors.
- Large assets belong in Git LFS or an external CDN—coordinate before committing binaries above 10 MB.
