<?php

namespace App\Providers;

use App\Models\News\News;
use App\Services\News\NewsService;
use Illuminate\Support\ServiceProvider;
use App\Repositories\News\NewsRepository;

class NewsServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(NewsService::class, function ($app) {
            return new NewsService(new NewsRepository(new News()));
        });
    }
}
