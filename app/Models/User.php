<?php

namespace App\Models;

use App\Models\Traits\UserACLTrait; 
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use UserACLTrait;
    use TwoFactorAuthenticatable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'tenant_id',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [
        'profile_photo_url',
    ];
    // local scope
        public function scopeTenantUsers(Builder $query){
            return $query->where('tenant_id', auth()->user()->tenant_id);
        }

    // global scope
    // protected static function booted()
    // {
    //     static::addGlobalScope('tenant', function (Builder $builder) {
    //         $builder->where('tenant_id', auth()->user()->tenant_id);
    //     });
    // }

    public function tenant(){
        return $this->belongsTo(Tenant::class);
    }

    public function roles(){
        return $this->belongsToMany(Role::class);
    }

    public function rolesAvailable($filter = null){
        $roles = Role::whereNotIn('id',function($query){
            $query->select('role_user.role_id');
            $query->from('role_user');
            $query->whereRaw("role_user.user_id={$this->id}");
            })
            ->where(function($queryFilter) use ($filter){
                if ($filter)
                    $queryFilter->where('roles.name','LIKE',"%{$filter}%");
                
            })
            ->paginate();

        return $roles;
    }


}
