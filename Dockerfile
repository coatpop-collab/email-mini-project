FROM php:8.2-apache
RUN apt-get update && apt-get install -y libzip-dev zip
RUN docker-php-ext-install zip
# ติดตั้ง Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer
WORKDIR /var/www/html