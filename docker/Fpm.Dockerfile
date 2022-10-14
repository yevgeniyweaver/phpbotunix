FROM php:7.4-fpm

COPY /composer.json /composer.lock /var/www/phpunix/
# Install system dependencies
RUN apt-get update && apt-get install -y \
        git \
        curl \
        libpng-dev \
        libonig-dev \
        libxml2-dev \
        zip \
        libzip-dev \
        unzip \
        nodejs \
        npm \
        mc

RUN apt-get update && apt-get install -y cron
# Add docker custom crontab
ADD phpunix_crontab /etc/cron.d/phpunix_crontab
# Specify crontab file for running
RUN crontab /etc/cron.d/phpunix_crontab

# Clear cache
RUN apt-get clean && rm -rf /var/lib/apt/lists/*

# Remove Cache
#RUN rm -rf /var/cache/apk/*

# Install PHP extensions
RUN docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd zip mysqli pdo sockets
RUN docker-php-ext-configure zip

# Install composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

WORKDIR /var/www/phpunix

# Add user for laravel application
#RUN groupadd -g 1000 www
#RUN groupadd -g 1000 www-data
#RUN useradd -u 1000 -ms /bin/bash -g www www
#RUN useradd -u 1000 -ms /bin/bash -g www-data www-data
RUN usermod -u 1000 www-data

# Copy existing application directory contents
COPY . /var/www/phpunix
# Copy existing application directory permissions
#COPY --chown=www:www . /var/www
COPY --chown=www-data:www-data . /var/www/phpunix
USER www-data

#RUN chmod go+w /var/www/crmex/storage/logs/laravel.log
RUN chmod -R o+w /var/www/phpunix/storage/
#chown -R www-data:www-data /var/www/crmex/storage \
#chown -R www-data:www-data storage &&

# Expose port 9000 and start php-fpm server
EXPOSE 9000
CMD ["php-fpm"]
# execute crontab
CMD ["cron", "-f"]
