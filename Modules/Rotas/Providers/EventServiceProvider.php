<?php

namespace Modules\Rotas\Providers;

use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;  
use App\Events\GivePermissionToRole;
use Modules\Rotas\Listeners\GiveRoleToPermission;



class EventServiceProvider extends ServiceProvider
{
    /**
     * Register the service provider.
     *
     * @return void
     */

     protected $listen = [

        GivePermissionToRole::class =>[
            GiveRoleToPermission::class
        ],
     ];

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return [];
    }
}
