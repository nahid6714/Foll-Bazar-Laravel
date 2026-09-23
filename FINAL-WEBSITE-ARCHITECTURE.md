# Fol Bazar Laravel — Website Package

This package is the WEBSITE side only. No Admin UI is included.

## Runtime
- Laravel + Blade
- MySQL/MariaDB (`foll_bazar`)
- Laravel local/public storage
- JSON API endpoints for the future separate Admin App

## Website routes
- `/`
- `/shop`
- `/product/{slug}`
- `/cart`
- `/checkout`
- `/login`
- `/register`
- `/track`
- `/complaint`

## Admin separation
There is intentionally no Admin web interface in this package. The `/api/admin/*` endpoints are retained as the integration surface for the future separate Admin App.

## Database safety
Do not run `migrate:fresh` or `db:wipe` against the existing `foll_bazar` database.

## Source basis
The implementation was based on the supplied Fol Bazar Next.js app structure (app, components, lib, public and CSS) plus the supplied legacy PHP API/database structure.
