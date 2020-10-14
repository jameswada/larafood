<?php

namespace App\Tenant\Traits;


use App\Tenant\Scopes\TenantScope;
use App\Tenant\Observers\TenantObserver;

trait TenantTrait{

    protected static function booted()
    {
        parent::booted();
        static::observe(TenantObserver::class);
        static::addGlobalScope( new TenantScope); 
    }
}