FROM php:7.4-cli

WORKDIR /app

RUN apt-get update && apt-get install -y \
    git unzip curl libpng-dev libonig-dev libxml2-dev

RUN docker-php-ext-install pdo pdo_mysql mbstring bcmath gd

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

COPY . .

RUN composer install --no-dev --optimize-autoloader


RUN php artisan storage:link || true

CMD php artisan serve --host=0.0.0.0 --port=$PORT
