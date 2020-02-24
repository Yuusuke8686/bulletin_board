<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repository\ThreadRepository;
use App\Repository\ThreadRepositoryInterface;
use App\Model\Thread;

class ThreadRepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(ThreadRepositoryInterface::class, function($threadRepository){
            return new ThreadRepository;
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
