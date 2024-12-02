# Base image
FROM php:8.3-fpm

# Set working directory
WORKDIR /var/www/html

# Install system dependencies
RUN apt-get update && apt-get install -y \
    libzip-dev \
    unzip \
    libjpeg-dev \
    libpng-dev \
    libonig-dev \
    libxml2-dev

# Install PHP extensions
RUN docker-php-ext-install pdo pdo_mysql zip gd mbstring exif pcntl bcmath

# Install MongoDB extension
RUN pecl install mongodb && docker-php-ext-enable mongodb

# Install Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Copy application files
COPY . /var/www/html

# Install project dependencies
RUN composer install --optimize-autoloader --no-scripts --no-interaction --ignore-platform-reqs

# Set file permissions
RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache

# Nginx configuration
COPY default.conf /etc/nginx/conf.d/default.conf

# Expose port
EXPOSE 80

# Start PHP-FPM
CMD ["php-fpm"]