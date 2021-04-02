https://www.youtube.com/playlist?list=PLTZ2g-iFpCUuNWZ7wtDoxbKpSAChDyS0o
https://github.com/jhones/api-noticias-lumen

php artisan make:migration create_author_table
php artisan make:migration create_news_table
php artisan make:migration create_image_news_table

https://github.com/maxsky/Lumen-AppKey-Generator
composer require maxsky/lumen-app-key-generator
php artisan key:generate

php artisan migrate

https://github.com/lephleg/laravel-lumen-docker
https://github.com/saada/docker-lumen
docker network create newsapi_default
docker-compose up --build -d

docker exec -t news-api_php_1 php artisan migrate
docker exec -t news-api_php_1 php artisan migrate:reset

MySQL
use lumen;
show tables;
describe author;

localhost:5001

mysql -uroot -p

apt install iputils-ping
ping db
