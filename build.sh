#!/usr/bin/env bash
set -o errexit

# Installer les bibliothèques PHP
composer install --no-dev --optimize-autoloader

# Préparer les fichiers (CSS/JS) si tu as du front-end
# npm install && npm run build

# Lancer les migrations (créer les tables)
php artisan migrate --force