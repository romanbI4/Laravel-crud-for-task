<?php

namespace App\Providers;

use App\Interfaces\TasksRepositoryInterface;
use App\Repositories\TasksRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(TasksRepositoryInterface::class, TasksRepository::class);
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
