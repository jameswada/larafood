<?php

namespace App\Actions\Fortify;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use App\Services\TenantService;


class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Validate and create a newly registered user.
     *
     * @param  array  $input
     * @return \App\Models\User
     */
    public function create(array $input)
    {
        Validator::make($input, [
            'name' => ['required', 'string', 'min:3','max:255'],
            'email' => [
                'required',
                'string',
                'email',
                'min:3',
                'max:255',
                Rule::unique(User::class),
            ],
            'password' => ['required','string', 'min:3','max:8'],
            'cnpj'=>['required','numeric', 'min:14','max:14','unique:tenants'],
            'empresa'=>['required', 'string', 'min:3','unique:tenants,name'],
        ])->validate();
        
        if (!$plan = session('plan')){
            return redirect()->route('site.home');
        }

        $tenantService = app(TenantService::class);
        $user = $tenantService->make($plan,$input );

        return $user; 
        // return User::create([
        //     'name' => $input['name'],
        //     'email' => $input['email'],
        //     'password' => Hash::make($input['password']),
        // ]);
    }
}

