# Stage 1: Build stage for Composer dependencies
FROM composer:latest as build
# Set working directory to the admin folder inside the container
WORKDIR /app/admin 
# Copy only Composer files from the admin subdirectory
COPY admin/composer.json ./
COPY admin/composer.lock ./
# Install dependencies (no dev dependencies)
RUN composer install --no-dev --optimize-autoloader

# Stage 2: Final runtime image with PHP-FPM and Nginx
FROM php:8.2-fpm-alpine
