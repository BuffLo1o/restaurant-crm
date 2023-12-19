FROM composer:2.2.21 AS composer

FROM php:8.1-fpm-alpine

COPY --from=composer /usr/bin/composer /usr/bin/composer

WORKDIR /var/www/html

COPY php.ini /etc/php/8.1/php.ini
COPY php-fpm.conf /etc/php/8.1/php-fpm.conf
COPY pool.d /etc/php/8.1/pool.d

RUN apk add icu-dev zlib-dev libpng-dev libzip-dev postgresql-dev
RUN docker-php-ext-install intl gd zip pdo pdo_pgsql pgsql

COPY . /var/www/html

RUN composer install

RUN chown -R www-data:www-data /var/www

EXPOSE 9000
