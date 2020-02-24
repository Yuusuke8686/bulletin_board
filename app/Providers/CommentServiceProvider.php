<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Service\CommentService;
use App\Repository\CommentRepository;
use App\Repository\CommentRepositoryInterface;
use App\Repository\ThreadRepository;
use App\Repository\ThreadRepositoryInterface;

class CommentServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(CommentService::class, function($app){
            return new CommentService($app->make(CommentRepositoryInterface::class), $app->make(ThreadRepositoryInterface::class));
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
