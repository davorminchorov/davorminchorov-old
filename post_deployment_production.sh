#!/bin/bash
composer install --no-ansi --no-dev --no-interaction --no-plugins --no-progress --no-scripts --no-suggest --optimize-autoloader
php artisan migrate --force --no-ansi --no-interaction
php artisan optimize
