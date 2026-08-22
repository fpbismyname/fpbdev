# syntax=docker/dockerfile:1

# Stage 1: Frontend build (Vite + Tailwind v4 + daisyUI + motion)
FROM node:20-alpine AS frontend
WORKDIR /app

# Install deps — handle pnpm-lock.yaml (repo pakai pnpm) atau package-lock.json
COPY package.json pnpm-lock.yaml* package-lock.json* .npmrc* ./
RUN if [ -f pnpm-lock.yaml ]; then \
        corepack enable && corepack prepare pnpm@9 --activate && pnpm install --frozen-lockfile --ignore-scripts; \
    elif [ -f package-lock.json ]; then \
        npm ci --ignore-scripts; \
    else \
        npm install --ignore-scripts; \
    fi

COPY vite.config.js ./
COPY resources ./resources
COPY public ./public
# Build — dukung pnpm atau npm
RUN if [ -f pnpm-lock.yaml ]; then pnpm run build; else npm run build; fi

# Stage 2: PHP runtime (Laravel 13 + Filament 5, PHP 8.5)
FROM serversideup/php:8.5-fpm-nginx AS production

USER root

# Ext untuk Filament/Spatie Media Library: gd (image), intl, bcmath, zip; pdo_sqlite sudah ada di base
RUN install-php-extensions gd intl bcmath zip

WORKDIR /var/www/html

# Copy composer files dulu untuk layer cache (opsional tapi bantu rebuild cepat)
COPY composer.json composer.lock ./
# Install PHP deps — no-dev untuk production; kalau vendor belum ada, install di sini
# Jika vendor sudah ter-copy dari host, step ini tetap aman (composer akan skip)
RUN composer install --no-dev --no-interaction --no-progress --prefer-dist --optimize-autoloader --no-scripts || true

# Copy source code (termasuk vendor jika ada) — chown agar www-data bisa tulis storage/database
COPY --chown=www-data:www-data . /var/www/html

# Overwrite public/build dengan hasil frontend stage (pastikan manifest fresh)
COPY --from=frontend --chown=www-data:www-data /app/public/build ./public/build

# Siapkan folder writable untuk sqlite + storage persist di Render (Disk akan mount ke /var/www/html/storage & /var/www/html/database)
RUN mkdir -p storage/app/private storage/framework/cache storage/framework/sessions storage/framework/views storage/logs bootstrap/cache database \
    && touch database/database.sqlite \
    && chown -R www-data:www-data storage bootstrap/cache database \
    && chmod -R 775 storage bootstrap/cache \
    && chmod 664 database/database.sqlite || true

# Entrypoint untuk migrate + storage:link tiap deploy (Render Web Service jalankan container baru tiap deploy)
COPY docker/entrypoint.sh /entrypoint.sh
RUN chmod +x /entrypoint.sh

USER www-data

EXPOSE 8080

# Render inject $PORT (default 10000) — serversideup nginx listen 8080, Render akan proxy PORT->8080
# Jika butuh listen $PORT, bisa ENV PORT=8080 atau override nginx config
ENTRYPOINT ["/entrypoint.sh"]
