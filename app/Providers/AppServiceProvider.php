<?php

namespace App\Providers;

use App\Repositories\Item\ItemRepository;
use App\Repositories\Item\ItemRepositoryImplement;
use Illuminate\Support\ServiceProvider;
use App\Repositories\User\UserRepository;
use App\Repositories\User\UserRepositoryImplement;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            UserRepository::class,
            UserRepositoryImplement::class
        );
        $this->app->bind(
            ItemRepository::class,
            ItemRepositoryImplement::class,
        );
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
