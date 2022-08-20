## install project

change the databade connection in .env file

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=drjob_app
DB_USERNAME=username
DB_PASSWORD=password

run in terminal

php artisan migrate
php artisan db:seed
composer install
