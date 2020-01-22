release: chmod u+x ./post_deployment_production.sh && ./post_deployment_production.sh
web: vendor/bin/heroku-php-apache2 public/
worker: php artisan queue:restart && php artisan queue:work --tries=3
