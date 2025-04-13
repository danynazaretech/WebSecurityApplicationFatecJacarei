FROM php:8.4-apache

RUN apt-get update && apt-get install -y \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    unzip \
    libzip-dev \
    && docker-php-ext-install pdo_mysql mysqli mbstring exif pcntl bcmath gd zip \
    && pecl install mongodb \
    && docker-php-ext-enable mongodb

RUN a2enmod rewrite
COPY src/ /var/www/html/
COPY docker/php/php.ini /usr/local/etc/php/conf.d/custom.ini
