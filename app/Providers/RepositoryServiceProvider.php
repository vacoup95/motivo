<?php

namespace App\Providers;

use App\Repositories\GroupRepository;
use App\Repositories\Interfaces\IGroupRepository;
use App\Repositories\Interfaces\IUserRepository;
use App\Repositories\UserRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    public $bindings = [
        IUserRepository::class,UserRepository::class,
        IGroupRepository::class,GroupRepository::class,
    ];

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(IUserRepository::class,UserRepository::class);
        $this->app->bind(IGroupRepository::class,GroupRepository::class);
    }
}
