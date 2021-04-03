<?php

namespace App\Providers;

use App\Models\Author\Author;
use App\Services\Author\AuthorService;
use Illuminate\Support\ServiceProvider;
use App\Repositories\Author\AuthorRepository;

class AuthorServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(AuthorService::class, function ($app) {
            return new AuthorService(new AuthorRepository(new Author()));
        });
    }
}
