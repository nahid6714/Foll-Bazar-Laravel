# Fol Bazar Laravel — Git/cPanel baseline

Built from the current cPanel Laravel project plus the current `public_html` snapshot.

- `.env` is intentionally excluded.
- `vendor/` is included because the current cPanel workflow does not rely on a shell/Composer install step.
- Runtime cache/session/view/log files are excluded.
- `deployment/public_html/` contains the current live public_html files, including the cPanel PHP 8.3 handler in `.htaccess`.
- Do not commit server secrets or database credentials.
- Do not delete/overwrite live uploaded files or the database during deployment.
