DOCKER:
    CENTOS 8
    PHP-FPM 7.2
    MYSQL
    LARAVEL

APP:
    LARAVEL 5.x


How to run:

composer install
php artisan migrate
php artisan db:seed


    run testing:
        - docker-compose exec -w /var/www/html/ut web php vendor/phpunit/phpunit/phpunit
