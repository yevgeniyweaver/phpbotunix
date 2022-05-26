#Run Project:

docker-compose up -d

#Open php(fpm) container:

docker-compose exec fpm /bin/bash

#Run necessary commands:

composer install

php artisan migrate

php artisan db:seed
