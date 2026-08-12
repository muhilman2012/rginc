FROM php:8.4-fpm

# Install ekstensi pdo_mysql untuk koneksi database Laravel
RUN docker-php-ext-install pdo pdo_mysql