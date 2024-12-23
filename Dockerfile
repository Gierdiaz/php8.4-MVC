FROM php:8.4.1-apache

RUN apt-get update && apt-get install -y libpng-dev libjpeg-dev libfreetype6-dev \
    libicu-dev libxml2-dev libzip-dev libxslt-dev zlib1g-dev \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install gd mysqli pdo pdo_mysql zip intl xsl soap opcache

RUN a2enmod rewrite

WORKDIR /var/www/html

COPY ./src /var/www/html

EXPOSE 80
