FROM php:8.2-fpm

RUN apt-get update && apt-get install -y \
    git unzip curl libpq-dev libonig-dev libxml2-dev libzip-dev \
    && docker-php-ext-install pdo pdo_mysql zip dom

WORKDIR /var/www/backend

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer
