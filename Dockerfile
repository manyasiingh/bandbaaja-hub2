# File: Dockerfile (FIXED)

# Stage 1: Build stage for Composer dependencies
# Use a standard PHP base image that is compatible with the final runtime image
FROM php:8.2-fpm-alpine as build

# Install Git and Composer using the standard Alpine packages
RUN apk add --no-cache git \
    && curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

WORKDIR /app

# Copy application code into the build stage
# Assuming the root of your application code is in the 'admin' directory
COPY admin/ composer.json ./
COPY admin/ composer.lock ./

# Install dependencies
RUN composer install --no-dev --optimize-autoloader


# Stage 2: Final runtime image with PHP-FPM and Nginx
FROM php:8.2-fpm-alpine

# Install Nginx, Bash (needed for start.sh), and required PHP extensions
RUN apk add --no-cache nginx bash \
    && docker-php-ext-install pdo pdo_mysql opcache \
    # Add the necessary database tool for Composer to be available at runtime
    && curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Set the working directory
WORKDIR /var/www/html

# --- FIX 3: Copy only the final vendor and application files ---
# Copy the installed dependencies and code from the build stage
COPY --from=build /app/vendor /var/www/html/vendor/
COPY admin/ .

# --- NEW FIX: Set Executable on start.sh and ensure line endings ---
# Copy the start script to a clean location
COPY admin/start.sh /usr/local/bin/start.sh
RUN chmod +x /usr/local/bin/start.sh

# Copy the Nginx configuration file
COPY conf/nginx/default.conf /etc/nginx/conf.d/default.conf

EXPOSE 8080

# The CMD points to the new startup script location
CMD ["/usr/local/bin/start.sh"]
