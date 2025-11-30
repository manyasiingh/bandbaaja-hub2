#!/usr/bin/env bash

# File: admin/start.sh

# Run Composer install again (optional, but ensures dependencies are present)
echo "Running Composer install..."
composer install --no-dev

# Add any framework-specific commands here (e.g., database migrations, caching)
# php artisan migrate --force
# php artisan config:cache

# Start PHP-FPM in the background
echo "Starting PHP-FPM..."
php-fpm -D

# Start Nginx and keep it in the foreground (daemon off)
echo "Starting Nginx..."
nginx -g "daemon off;"
