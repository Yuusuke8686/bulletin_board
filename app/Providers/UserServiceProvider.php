<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Service\UserService;
use App\Model\Admin;
use App\Repository\UserRepository;
use App\Repository\UserRepositoryInterface;

class UserServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(UserService::class, function($app){
            return new UserService($app->make(UserRepositoryInterface::class));
        });
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
