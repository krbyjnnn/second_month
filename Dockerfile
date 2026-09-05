FROM php:8.2-cli

# Install system dependencies
RUN apt-get update && apt-get install -y \
    git \
    curl \
    zip \
    unzip

# Get latest Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Set working directory
WORKDIR /var/www

# Copy existing application directory contents
COPY . /var/www

# Install dependencies
RUN composer install --no-dev --optimize-autoloader

# Expose port and start serve
EXPOSE 8000
CMD php artisan serve --host=0.0.0.0 --port=8000