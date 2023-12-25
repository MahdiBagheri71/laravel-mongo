FROM php:8.1-fpm
RUN apt-get update && apt-get install -y && apt-get install -y libcurl4-openssl-dev pkg-config libssl-dev\
    git \
    curl \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    libzip-dev \
    zip \
    unzip \
    supervisor\
    redis-server \
    nodejs \
    npm \
    && pecl install redis \
    && pecl install mongodb \
    && docker-php-ext-enable redis\
    && docker-php-ext-enable mongodb
RUN apt-get clean && rm -rf /var/lib/apt/lists/*
RUN docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd xml zip soap sockets
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
ENV COMPOSER_ALLOW_SUPERUSER=1
WORKDIR /var/www/html
COPY ./ /var/www/html
RUN composer install  --working-dir=/var/www/html
COPY /docker/app/supervisord.conf /etc/supervisor/conf.d/supervisord.conf
COPY /docker/app/entrypoint.sh /usr/local/bin/entrypoint.sh
RUN chmod +x /usr/local/bin/entrypoint.sh
CMD ["/usr/local/bin/entrypoint.sh"]
