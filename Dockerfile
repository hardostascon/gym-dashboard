# Partimos de la imagen php en su versión 7.4
FROM php:8.2-fpm

# Copiamos los archivos package.json composer.json y composer-lock.json a /var/www/
COPY composer*.json /var/www/

# Nos movemos a /var/www/
WORKDIR /var/www/

# Instalamos las dependencias necesarias
RUN apt-get update && apt-get install -y \
    build-essential \
    libzip-dev \
    libpng-dev \
    libjpeg62-turbo-dev \
    libfreetype6-dev \
    libonig-dev \
    locales \
    zip \
    jpegoptim optipng pngquant gifsicle \
    vim \
    git \
    curl \
    libpq-dev 

# Instalamos extensiones de PHP
#RUN docker-php-ext-install  pdo_pgsql mbstring exif pcntl bcmath gd 
RUN docker-php-ext-install pdo pdo_pgsql
RUN docker-php-ext-configure gd --with-freetype --with-jpeg
RUN docker-php-ext-install gd



# Instalamos composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Instalamos dependendencias de composer
# RUN composer install --no-ansi --no-dev --no-interaction --no-progress --optimize-autoloader --no-scripts

# Copiamos todos los archivos de la carpeta actual de nuestra 
# computadora (los archivos de laravel) a /var/www/
COPY . /var/www/
COPY nginx.conf /etc/nginx/sites-available/default

# Exponemos el puerto 9000 a la network
EXPOSE 80 9000


COPY start.sh /start.sh
RUN chmod +x /start.sh



# Corremos el comando php-fpm para ejecutar PHP
CMD ["php-fpm"]