<?php

namespace App\Providers;

use App\Models\ImageNews\ImageNews;
use App\Services\ImageNews\ImageNewsService;
use Illuminate\Support\ServiceProvider;
use App\Repositories\ImageNews\ImageNewsRepository;

class ImageNewsServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(ImageNewsService::class, function ($app) {
            return new ImageNewsService(new ImageNewsRepository(new ImageNews()));
        });
    }
}
