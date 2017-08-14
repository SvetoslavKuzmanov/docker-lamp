FROM php:fpm
COPY php.ini /usr/local/etc/php/
RUN pecl install xdebug-2.5.5 \
    && docker-php-ext-enable xdebug \
    && docker-php-ext-install mysqli pdo pdo_mysql
