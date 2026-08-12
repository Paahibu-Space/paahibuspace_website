#!/bin/bash
set -e

DEPLOY_PATH="$1"

if [ -z "$DEPLOY_PATH" ]; then
    echo "Usage: $0 <deploy_path>"
    exit 1
fi

echo "=== Deployment Started ==="
echo "Target: $DEPLOY_PATH"

cd "$DEPLOY_PATH" || { echo "Failed to cd to $DEPLOY_PATH"; exit 1; }
echo "Working in: $(pwd)"

PHP_BIN=$(command -v php82 || command -v php)
echo "PHP: $PHP_BIN"
$PHP_BIN -v | head -n 1

if [ ! -f "artisan" ]; then
    echo "artisan not found in $(pwd)"
    ls -la
    exit 1
fi

mkdir -p storage/app/public storage/logs storage/framework/{cache,sessions,views}

echo "Running migrations..."
$PHP_BIN artisan migrate --force --no-interaction

echo "Clearing caches..."
$PHP_BIN artisan optimize:clear

echo "Caching..."
$PHP_BIN artisan config:cache
$PHP_BIN artisan route:cache
$PHP_BIN artisan view:cache

echo "Linking storage..."
rm -rf public/storage
$PHP_BIN artisan storage:link

echo "=== Deployment Complete ==="
