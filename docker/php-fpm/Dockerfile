FROM php:8.0.0-fpm

COPY wait-for-it.sh /usr/bin/wait-for-it

RUN chmod +x /usr/bin/wait-for-it

RUN apt-get update && \
    apt-get install -y --no-install-recommends libssl-dev zlib1g-dev curl git unzip netcat libxml2-dev libpq-dev libzip-dev && \
    pecl install apcu && \
    docker-php-ext-install pdo pdo_mysql mysqli && docker-php-ext-enable pdo pdo_mysql mysqli && \
    docker-php-ext-install -j$(nproc) zip opcache intl && \
    apt-get clean && rm -rf /var/lib/apt/lists/* /tmp/* /var/tmp/*

RUN docker-php-ext-configure pdo_mysql --with-pdo-mysql=mysqlnd

COPY --from=composer /usr/bin/composer /usr/bin/composer

WORKDIR /var/www

EXPOSE 9000
