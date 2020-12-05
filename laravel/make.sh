#!/bin/sh
composer dump-autoload

php artisan cache:clear
php artisan config:clear

php artisan migrate:refresh --seed
