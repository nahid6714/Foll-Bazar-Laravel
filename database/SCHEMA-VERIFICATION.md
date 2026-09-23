# Fol Bazar database schema verification

The existing `foll_bazar` database is intentionally preserved. The original migrations use `Schema::hasTable(...)` so they do not replace legacy tables.

Before production deployment, run this against a backup/staging copy of the existing database:

```bash
php artisan folbazar:schema-verify
```

The command is read-only. It checks that every table used by the Laravel models/orders/auth system contains the required columns. It does **not** create, alter, or delete data.

If a column is reported as missing, stop the deployment and reconcile the schema first. Do not run `migrate:fresh` against the existing database.
