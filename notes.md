https://www.youtube.com/playlist?list=PLTZ2g-iFpCUuNWZ7wtDoxbKpSAChDyS0o
https://github.com/jhones/api-noticias-lumen

php artisan make:migration create_author_table
php artisan make:migration create_news_table
php artisan make:migration create_image_news_table

### Ep 22

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

tree . -L 1
.
├── README.md
├── api.http
├── app
├── artisan
├── bin
├── bootstrap
├── composer.json
├── composer.lock
├── database
├── docker-compose.yml
├── images
├── notes.md
├── phpunit.xml
├── public
├── resources
├── routes
├── storage
├── tests
└── vendor

## TODO

-   Fix XDebug OK
    https://stackoverflow.com/questions/62104199/issues-when-debugging-php-in-vscode-using-docker-and-wsl2

to use `encrypt` method we must set `APP_KEY` env var first

```php

php artisan make:migration change_image_column_type
docker-compose exec -t php php artisan migrate

## Ep 25

composer require cviebrock/eloquent-sluggable
```

NewsService Manual Slugs

```php
use Illuminate\Support\Str;

public function create(array $data): array
{
    $data['slug'] = $data['slug'] ?? Str::slug($data['title'] . ' ' . $data['subtitle']);
    return $this->repository->create($data);
}

public function editBy(string $param, array $data): bool
{
    //$data['slug'] = $data['slug'] ?? Str::slug($data['title'] . ' ' . $data['subtitle']);
    return $this->repository->editBy($param, $data);
}
```

https://github.com/cviebrock/eloquent-sluggable

## Commit

https://github.com/captainhookphp/captainhook
https://github.com/ramsey/conventional-commits

```sh
composer require --dev ramsey/conventional-commits
```

captainhook.json

```json
{
    "prepare-commit-msg": {
        "enabled": true,
        "actions": [
            {
                "action": "\\Ramsey\\CaptainHook\\PrepareConventionalCommit"
            }
        ]
    }
}
```

captainhook setup

```sh
vendor/bin/captainhook install
```

then

```sh
git commit
```
