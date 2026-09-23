# Fol Bazar — Laravel Website

Customer-facing Laravel website for Fol Bazar. The Admin UI is intentionally not included; the separate Admin App connects through `/api/admin/*`.

## Local setup
1. Copy `.env.example` to `.env`.
2. Set `DB_DATABASE=foll_bazar` and the correct MySQL credentials.
3. Run `php artisan key:generate` if needed.
4. Run `php artisan migrate` only after backing up the existing database; migrations are designed to preserve existing tables and add missing delivery fields conditionally.
5. Run `php artisan storage:link`.
6. Start with `php artisan serve` or configure XAMPP/Apache to point the domain document root at `public/`.

## Architecture
- Laravel Blade + JavaScript customer website
- Laravel API + MySQL/MariaDB
- Local Laravel public storage for uploads
- Separate Admin Android/Desktop App using `/api/admin/*`
- No Supabase dependency for runtime website data
- No Cloudinary dependency for complaint uploads
