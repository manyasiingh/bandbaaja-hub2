# File: Dockerfile (in repository root)

# Stage 1: Build stage for Composer dependencies
FROM composer:latest as build
WORKDIR /app/admin 
# Copy only necessary Composer files from the admin subdirectory
COPY admin/composer.json ./
COPY admin/composer.lock ./
# Install dependencies (no dev dependencies for production)
RUN composer install --no-dev --optimize-autoloader

# Stage 2: Final runtime image with PHP-FPM and Nginx
FROM php:8.2-fpm-alpine

# Install Nginx and required PHP extensions
RUN apk add --no-cache nginx \ 
    && docker-php-ext-install pdo pdo_mysql opcache
    
# Copy the dependencies from the build stage to the container's web root
COPY --from=build /app/admin /var/www/html/

# Copy the rest of the application files from the admin subdirectory
COPY admin /var/www/html
RUN chmod +x /var/www/html/start.sh

# Copy the Nginx configuration file
COPY conf/nginx/default.conf /etc/nginx/conf.d/default.conf

EXPOSE 8080

# The CMD points to the startup script
CMD ["/var/www/html/start.sh"]
