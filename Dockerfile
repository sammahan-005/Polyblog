FROM php:8.4-fpm

# Installation des dépendances système nécessaires
RUN apt-get update && apt-get install -y \
    libpq-dev \
    unzip \
    git \
    libzip-dev \
    && docker-php-ext-install pdo pdo_pgsql zip

# Installation de Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

WORKDIR /var/www/html

# Copie des fichiers de configuration en premier pour optimiser le cache des couches Docker
COPY composer.json composer.lock ./
RUN composer install --no-dev --no-scripts --optimize-autoloader

# Copie du reste de l'application
COPY . .

# Droits sur les dossiers de stockage (essentiel pour Laravel)
RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache

# Port utilisé par Render
EXPOSE 8000

# Script de démarrage plus robuste
CMD php artisan migrate --force && php artisan serve --host=0.0.0.0 --port=8000