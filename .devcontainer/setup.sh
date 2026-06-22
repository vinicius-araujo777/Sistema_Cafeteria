#!/usr/bin/env bash
set -e

cd "$(dirname "$0")/.."

if [ ! -f .env ]; then
    cp .env.example .env
fi

if ! grep -q "^APP_KEY=base64:" .env; then
    NEEDS_KEY=1
fi

if [ -n "$CODESPACES" ]; then
    CODESPACE_URL="https://${CODESPACE_NAME}-8000.${GITHUB_CODESPACES_PORT_FORWARDING_DOMAIN}"
    if grep -q "^APP_URL=" .env; then
        sed -i "s|^APP_URL=.*|APP_URL=${CODESPACE_URL}|" .env
    else
        echo "APP_URL=${CODESPACE_URL}" >> .env
    fi
    echo "Codespace detectado -> APP_URL = ${CODESPACE_URL}"
fi

docker compose up -d --build
docker compose exec -T app composer install --no-interaction

if [ -n "$NEEDS_KEY" ]; then
    docker compose exec -T app php artisan key:generate --ansi
fi

docker compose exec -T app php artisan migrate --force
npm install