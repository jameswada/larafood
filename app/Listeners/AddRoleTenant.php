<?php

namespace App\Listeners;

use App\Events\Tenant\Events\TenantCreated;
use App\Models\Role;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class AddRoleTenant
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle(TenantCreated $event)
    {
        $user = $event->user();
        if(!$role = Role::first())
            return; 
        $user->roles()->attach(); 
        return 1; 
    }
}
