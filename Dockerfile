FROM php:8.3-cli

# Installation des dépendances système et des extensions PHP nécessaires à MySQL
RUN apt-get update && apt-get install -y \
    git \
    unzip \
    libpq-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    && docker-php-ext-install pdo pdo_mysql

# Installation de Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

WORKDIR /var/www

# Copie des fichiers du projet
COPY . .

# Installation des dépendances Composer sans les packages de dev
RUN composer install --no-dev --optimize-autoloader

# Permissions pour les dossiers de stockage Laravel
RUN chown -R www-data:www-data /var/www/storage /var/www/bootstrap/cache

EXPOSE 10000

# Commande de démarrage : exécution des migrations puis lancement du serveur
CMD php artisan migrate --force && php artisan serve --host=0.0.0.0 --port=10000
