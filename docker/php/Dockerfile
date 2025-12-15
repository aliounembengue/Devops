# Utiliser l'image officielle PHP avec FPM (FastCGI Process Manager)
FROM php:8.2-fpm

# Installer les dépendances système (nécessaires pour certaines extensions PHP)
RUN apt-get update && apt-get install -y \
    git \
    curl \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    unzip

# Nettoyer le cache apt pour réduire la taille de l'image
RUN apt-get clean && rm -rf /var/lib/apt/lists/*

# Installer les extensions PHP courantes
RUN docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd

# Installer Composer (récupéré depuis l'image officielle de Composer)
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Définir le répertoire de travail
WORKDIR /var/www

# (Optionnel) Créer un utilisateur système pour ne pas tourner en root
# RUN useradd -G www-data,root -u 1000 -d /home/dev dev
# USER dev