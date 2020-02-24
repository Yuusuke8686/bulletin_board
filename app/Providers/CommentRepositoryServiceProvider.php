<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repository\CommentRepository;
use App\Repository\CommentRepositoryInterface;

class CommentRepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(CommentRepositoryInterface::class, function($commentRepository){
            return new CommentRepository;
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
