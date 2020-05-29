FROM php:7-apache

RUN apt update && apt install -y vim libcurl4-openssl-dev pkg-config
RUN docker-php-ext-install pdo pdo_mysql mysqli curl

# Use the default production configuration
COPY ./php.ini $PHP_INI_DIR/php.ini
