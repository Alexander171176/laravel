### For local dev

1) Make directory for docker: <br>
   `mkdir ./storage/docker`
2) Copy .env.example <br>
   `cp .env.example .env`
3) Add host user to .env <br>
   `echo UID=$(id -u) >> .env` <br>
   `echo GID=$(id -g) >> .env`
4) Run services docker <br>
   `docker-compose up -d --build`
5) Install npm dependencies <br>
   `npm i`
6) Migrate Laravel <br>
   `docker exec php-app php artisan migrate`<br>
   `docker exec php-app php artisan migrate:rollback`<br>
    `docker exec php-app php artisan migrate`
7) Install Dropzone
    `npm install --save dropzone`
8) Install Breeze <br>
    `composer require laravel/breeze --dev`<br>
    `php artisan breeze:install vue`
9) DB Seed <br>
   `docker exec php-app php artisan db:seed --class=BlogCategorySeeder`<br>
   `docker exec php-app php artisan db:seed --class=BlogTagSeeder`<br>
   `docker exec php-app php artisan db:seed --class=BlogPostSeeder`<br>
   `docker exec php-app php artisan db:seed --class=BlogPostBlogTagSeeder`<br> 
