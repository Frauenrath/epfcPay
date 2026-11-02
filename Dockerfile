FROM php:8.2-apache

# Installation des extensions PHP nécessaires à MySQL et la gestion d'images (GD)
RUN apt-get update && apt-get install -y \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install pdo pdo_mysql gd mysqli

# Activation du module mod_rewrite pour le support du .htaccess
RUN a2enmod rewrite

# Copie des fichiers du projet dans le dossier web d'Apache
COPY . /var/www/html/

# Attribution des permissions d'écriture pour les téléversements
RUN chown -R www-data:www-data /var/www/html/uploads