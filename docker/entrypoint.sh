#!/usr/bin/env sh
set -eu

cd /var/www/html

if [ ! -f .env ] && [ -f .env.example ]; then
    cp .env.example .env
fi

if [ -n "${DATABASE_URL:-}" ] && [ -z "${DB_URL:-}" ]; then
    export DB_URL="${DATABASE_URL}"
fi

if [ -n "${DATABASE_URL:-}" ] && [ -z "${DB_CONNECTION:-}" ]; then
    export DB_CONNECTION=pgsql
fi

[ -n "${PGHOST:-}" ] && [ -z "${DB_HOST:-}" ] && export DB_HOST="${PGHOST}"
[ -n "${PGPORT:-}" ] && [ -z "${DB_PORT:-}" ] && export DB_PORT="${PGPORT}"
[ -n "${PGDATABASE:-}" ] && [ -z "${DB_DATABASE:-}" ] && export DB_DATABASE="${PGDATABASE}"
[ -n "${PGUSER:-}" ] && [ -z "${DB_USERNAME:-}" ] && export DB_USERNAME="${PGUSER}"
[ -n "${PGPASSWORD:-}" ] && [ -z "${DB_PASSWORD:-}" ] && export DB_PASSWORD="${PGPASSWORD}"

export APP_ENV="${APP_ENV:-production}"
export APP_DEBUG="${APP_DEBUG:-false}"
export APP_URL="${APP_URL:-http://localhost}"
export LOG_CHANNEL="${LOG_CHANNEL:-stderr}"
export CACHE_STORE="${CACHE_STORE:-file}"
export SESSION_DRIVER="${SESSION_DRIVER:-file}"
export QUEUE_CONNECTION="${QUEUE_CONNECTION:-sync}"

mkdir -p bootstrap/cache storage/app storage/framework/cache storage/framework/sessions storage/framework/views storage/logs
chmod -R ug+rw bootstrap/cache storage || true

if [ -z "${APP_KEY:-}" ] && ! grep -Eq '^APP_KEY=base64:' .env 2>/dev/null; then
    php artisan key:generate --force --no-interaction
fi

php artisan optimize:clear --no-interaction
php artisan config:cache --no-interaction
php artisan route:cache --no-interaction
php artisan view:cache --no-interaction

if [ "${RUN_MIGRATIONS:-false}" = "true" ]; then
    php artisan migrate --force --no-interaction
fi

if [ "$#" -eq 0 ]; then
    set -- php artisan serve --host=0.0.0.0 --port="${PORT:-8080}"
fi

if [ "$1" = "php" ] && [ "${2:-}" = "artisan" ] && [ "${3:-}" = "serve" ]; then
    exec php artisan serve --host=0.0.0.0 --port="${PORT:-8080}"
fi

exec "$@"
