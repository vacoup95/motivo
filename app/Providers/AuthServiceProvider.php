<?php

namespace App\Providers;

use Illuminate\Contracts\Auth\Access\Gate as GateContract;
use App\User;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [];

    /**
     * Register any authentication / authorization services.
     *
     * @param GateContract $gate
     * @return void
     */
    public function boot(GateContract $gate)
    {
        $this->registerPolicies($gate);
        $gate->define('destroy-user-from-group', function ($user) {
            if ($user === null || !isset(request()->group) || User::find($user->id)->groups()->where('group_id', request()->group)->count() === 0) {
                return false;
            }
            return true;
        });

        $gate->define('store', function ($user) {
            if ($user === null || User::find($user->id)->id !== Auth()->user()->id) {
                return false;
            }
            return true;
        });

    }
}
