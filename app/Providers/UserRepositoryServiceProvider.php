<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repository\UserRepository;
use App\Repository\UserRepositoryInterface;
use App\Model\Admin;


class UserRepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(UserRepositoryInterface::class, function($userRepository){
            return new UserRepository;
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
