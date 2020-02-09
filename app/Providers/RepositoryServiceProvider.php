<?php

namespace App\Providers;

use App\Repositories\GroupRepository;
use App\Repositories\Interfaces\IGroupRepository;
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
        $this->app->bind(
            IGroupRepository::class,
            GroupRepository::class
        );
    }
}
