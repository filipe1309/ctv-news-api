# <p align="center">CTV News API :newspaper:</p>

<p align="center">
<img src="https://img.shields.io/badge/lumen-8.0-orange" alt="Lumen"/>
<img src="https://img.shields.io/badge/php-8.0-green" alt="PHP"/>
</p>

## 💬 About

This project was developed following **Level PHP** youtube playlist "[Lumen Microframework](https://www.youtube.com/playlist?list=PLTZ2g-iFpCUuNWZ7wtDoxbKpSAChDyS0o)".

## :computer: Technologies

-   [Lumen](https://lumen.laravel.com/)
-   [Docker](https://www.docker.com/)

## 🧰 Architecture

### DB ER Diagram

![alt](public/db-er-diagram.png)

### Service-Repository Pattern

## :octocat: Setup

### Installation

```sh
# Clone this repo
git@github.com:filipe1309/ctv-news-api.git

# Enter project folder
cd ctv-news-api
```

#### Run the migrations to create db tables on db container

```sh
docker exec -t news-api_php_1 php artisan migrate
```

### 🏃 Runnning

```sh
./bin/runenv
```

The app will run at: http://localhost:5001

### Testing

```sh
docker exec -it news-api_php_1 php ./vendor/bin/phpunit --testdox
```

## About Me

<p align="center">
    <a style="font-weight: bold" href="https://www.linkedin.com/in/filipe1309/">
    <img style="border-radius:50%" width="100px; "src="https://avatars.githubusercontent.com/u/2081014?s=60&v=4"/>
    </a>
</p>

---

<p align="center">
Done with ♥ by <a style="font-weight: bold" href="https://www.linkedin.com/in/filipe1309/">Filipe Leuch Bonfim</a> 🖖

</p>
