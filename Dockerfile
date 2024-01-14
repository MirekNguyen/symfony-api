FROM composer:2.6.6 AS composer
WORKDIR /app
COPY . .
RUN composer install --optimize-autoloader
RUN composer dump-autoload --optimize

FROM php:8.2-cli
WORKDIR /app
COPY --from=composer /usr/bin/composer /usr/bin/composer
COPY --from=composer /app .

RUN apt-get update -y 

# Install PostgreSQL PDO
RUN apt-get install -y libpq-dev \
    && docker-php-ext-configure pgsql -with-pgsql=/usr/local/pgsql \
    && docker-php-ext-install pdo pdo_pgsql pgsql

# Install Symfony CLI
RUN curl -1sLf 'https://dl.cloudsmith.io/public/symfony/stable/setup.deb.sh' | bash
RUN apt-get install -y symfony-cli
RUN symfony check:requirements

CMD [ "symfony", "server:start" ]

