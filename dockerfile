# Use the official PHP image
FROM php:8.2-fpm

# Install dependencies and extensions
RUN apt-get update && apt-get install -y libpng-dev libjpeg-dev libfreetype6-dev git unzip libzip-dev libxml2-dev && \
    docker-php-ext-configure gd --with-freetype --with-jpeg && \
    docker-php-ext-install gd zip pdo pdo_mysql xml dom \
    apt-get install -y nodejs npm

# Set the working directory inside the container
WORKDIR /var/www

# Install Composer globally
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Copy the existing application to the container
COPY . /var/www

# Install Laravel dependencies
RUN composer install --no-dev --optimize-autoloader

# Set the permissions for Laravel (important for file storage and cache)
RUN chown -R www-data:www-data /var/www/storage /var/www/bootstrap/cache

# Expose port 9000 and start PHP-FPM server
EXPOSE 9000
CMD ["php-fpm"]
