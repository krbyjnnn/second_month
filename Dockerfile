FROM php:8.2-cli

# Install system dependencies
RUN apt-get update && apt-get install -y \
    git \
    curl \
    zip \
    unzip \
    sqlite3 \
    libsqlite3-dev

# Install PDO SQLite extension
RUN docker-php-ext-install pdo_sqlite

# Get latest Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Set working directory
WORKDIR /var/www

# Copy application files
COPY . /var/www

# Install dependencies
RUN composer install --no-dev --optimize-autoloader

# Set permissions for storage and cache
RUN chmod -R 777 storage bootstrap/cache

# Expose port
EXPOSE 8000

# Touch SQLite file, migrate, and start app
CMD touch database/database.sqlite && php artisan migrate --force && php artisan serve --host=0.0.0.0 --port=8000