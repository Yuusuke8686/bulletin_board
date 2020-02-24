<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Service\ThreadService;
use App\Model\Thread;
use App\Repository\ThreadRepository;
use App\Repository\ThreadRepositoryInterface;

class ThreadServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(ThreadService::class, function($app){
            return new ThreadService($app->make(ThreadRepositoryInterface::class));
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
