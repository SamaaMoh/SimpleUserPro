## install project

add .env file and change the database connection to

DB_CONNECTION=mysql <br/>
DB_HOST=127.0.0.1   <br/>
DB_PORT=3306        <br/>
DB_DATABASE=drjob_app <br/> 
DB_USERNAME=username   <br/>
DB_PASSWORD=password    <br/>

run in terminal  <br/>

php artisan migrate  <br/>
php artisan db:seed  <br/>
composer install     <br/>
npm install          <br/>
npm run dev          <br/>
