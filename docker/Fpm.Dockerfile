FROM php:7.4-fpm

COPY /composer.json /composer.lock /var/www/phpunix/
# Install system dependencies
RUN apt-get update && apt-get install -y \
        git \
        curl \
        nano \
        libpng-dev \
        libonig-dev \
        libxml2-dev \
        zip \
        libzip-dev \
        unzip \
        nodejs \
        npm \
        mc

#        cron \
#RUN apt-get update && apt-get install -y cron
# Add docker custom crontab
#ADD crontab /etc/cron.d/crontab
#RUN chmod 0644 /etc/cron.d/crontab
## Specify crontab file for running
#RUN /usr/bin/crontab  /etc/cron.d/crontab
#RUN touch /var/log/cron.log
#crontab
#COPY crontab /etc/crontabs/root
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

#CMD ["cron", "-f"]
#CMD printenv > /etc/environment && echo “cron starting…” && (cron) && : > /var/log/cron.log && tail -f /var/log/cron.log

# Expose port 9000 and start php-fpm server
#EXPOSE 9000
#CMD ["php-fpm"]
# execute crontab

