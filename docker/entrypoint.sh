#!/bin/sh
set -e

# Render persistent storage: pastikan folder & sqlite ada meski Disk mount kosong saat first deploy
mkdir -p storage/app/private storage/framework/cache storage/framework/sessions storage/framework/views storage/logs bootstrap/cache database
if [ ! -f database/database.sqlite ]; then
    touch database/database.sqlite
    chmod 664 database/database.sqlite || true
fi

# Pastikan permission benar (www-data sudah owner dari Dockerfile, tapi Disk mount bisa reset owner)
chmod -R 775 storage bootstrap/cache 2>/dev/null || true

# Tunggu sampai .env tersedia (Render inject via env vars, bukan file)
# Jika APP_KEY belum set, artisan akan fail — Render harus set APP_KEY, APP_URL, APP_ENV=production
echo "Running Laravel bootstrap..."

# Storage link untuk Spatie Media Library (posts/cover, site_logo) — idempotent
php artisan storage:link --no-interaction 2>/dev/null || true

# Migrate sqlite — --force untuk production
php artisan migrate --force --no-interaction || echo "Migrate failed (cek DB_CONNECTION/DB_DATABASE)"

# Filament & optimize
php artisan filament:upgrade --no-interaction 2>/dev/null || true
php artisan optimize --no-interaction 2>/dev/null || true

# Jika APP_KEY kosong dan ada .env.example, generate (fallback, tapi di Render seharusnya sudah set)
if [ -z "$APP_KEY" ] && [ -f .env.example ] && [ ! -f .env ]; then
    cp .env.example .env
    php artisan key:generate --no-interaction || true
fi

# Jalankan entrypoint asli serversideup (nginx + php-fpm)
# serversideup image menyediakan /usr/local/bin/docker-php-serversideup-entrypoint
if [ -x "/usr/local/bin/docker-php-serversideup-entrypoint" ]; then
    exec /usr/local/bin/docker-php-serversideup-entrypoint "$@"
else
    # Fallback: jalankan php-fpm + nginx manual
    exec "$@"
fi
