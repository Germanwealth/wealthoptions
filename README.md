# Wealth Options Laravel App

## Railway deployment

This project is set up to deploy on Railway with the included `Dockerfile` and `railway.json`.

### Required Railway variables

Set these in Railway:

- `APP_ENV=production`
- `APP_DEBUG=false`
- `APP_URL=https://your-railway-domain`
- `APP_KEY=` a Laravel app key, or let the container generate one on first boot
- Either `DATABASE_URL` from Railway Postgres or the standard Laravel `DB_*` variables

### Optional variables

- `RUN_MIGRATIONS=true` to run `php artisan migrate --force` during startup
- `LOG_CHANNEL=stderr` for Railway log output

### Local Docker build

```bash
docker build -t wealthoptions .
docker run --rm -p 8080:8080 --env-file .env wealthoptions
```

The container starts Laravel on `0.0.0.0:$PORT`, which matches Railway's runtime expectations.
