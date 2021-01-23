FROM php:8-fpm-alpine

COPY --from=mlocati/php-extension-installer /usr/bin/install-php-extensions /usr/bin/
RUN install-php-extensions opcache mysqli apcu

RUN echo "error_reporting=E_ALL & ~E_DEPRECATED" > "$PHP_INI_DIR/conf.d/error_reporting.ini"
