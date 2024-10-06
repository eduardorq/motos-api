FROM php:8.2-fpm

# Install PHP Extensions
RUN docker-php-ext-install pdo_mysql \
    &&  docker-php-ext-install mysqli \
    &&  docker-php-ext-enable mysqli
