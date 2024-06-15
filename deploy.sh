#!/bin/bash

composer install --no-interaction --optimize-autoloader
php artisan migrate --force

