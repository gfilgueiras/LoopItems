FROM php:8.3-fpm

WORKDIR /var/www

RUN cp "$PHP_INI_DIR/php.ini-development" "$PHP_INI_DIR/php.ini"

RUN apt-get update && apt-get install -y \
    build-essential \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    zip \
	vim \
    curl \
    unzip \
    git \
    libzip-dev

RUN apt-get clean && rm -rf /var/lib/apt/lists/*
RUN docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd sockets zip

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

RUN yes | pecl install xdebug
RUN docker-php-ext-enable xdebug
COPY extensions/Xdebug/docker-php-ext-xdebug.ini /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini
RUN touch /tmp/xdebug_remote.log
RUN chown www-data:www-data /tmp/xdebug_remote.log
RUN chmod 664 /tmp/xdebug_remote.log

RUN pecl install -o -f redis \
&&  rm -rf /tmp/pear \
&&  docker-php-ext-enable redis

RUN useradd -G www-data,root -u 1000 -d /home/loopitems loopitems
RUN mkdir -p /home/loopitems/.composer && \
chown -R loopitems:loopitems /home/loopitems
RUN echo "loopitems:loopitems" | chpasswd
RUN chsh -s /usr/local/bin/bash loopitems

USER root
CMD ["php-fpm"]
