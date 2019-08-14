FROM php:7.3-fpm-alpine

WORKDIR /app

COPY --from=composer:1.7.2 /usr/bin/composer /usr/bin/composer

RUN docker-php-ext-install mysqli pdo_mysql
