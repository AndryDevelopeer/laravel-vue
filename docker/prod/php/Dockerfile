FROM php:8.1.0-fpm-alpine

ARG WWWGROUP

RUN apk update && apk add --no-cache git zip postgresql-dev && \
    docker-php-ext-install pdo pdo_pgsql pdo_mysql opcache bcmath sockets
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

RUN addgroup -g $WWWGROUP sail
RUN adduser -D -G sail -u 1000 sail

COPY ./zzz-docker.conf /usr/local/etc/php-fpm.d/zzz-docker.conf

WORKDIR /app
CMD ["php-fpm"]
