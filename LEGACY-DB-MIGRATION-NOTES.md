# Fol Bazar legacy database compatibility

The existing `foll_bazar` database is preserved. The create-table migrations now skip tables that already exist and only create missing Laravel-specific tables (notably `personal_access_tokens`).

Do not use `migrate:fresh`, `db:wipe`, DROP, or EMPTY against the legacy database.

For local testing, use file sessions/cache and the synchronous queue so the legacy `sessions` table is not treated as Laravel's database-session schema.
