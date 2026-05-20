in /backend do npm run intsall then run dev
in root folder docker compose up build


docker compose exec app sh
composer install 
chown -R www-data:www-data /var/www/storage /var/www/bootstrap/cache
chmod -R 775 /var/www/storage /var/www/bootstrap/cache
php artisan migrate
