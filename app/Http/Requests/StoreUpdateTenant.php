<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUpdateTenant extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $id = $this->segment(3);

        return [
            'name'=>['required','min:3','max:255', "unique:tenants,name,{$id},id"],
            'cnpj'=>['required','digits:14',"unique:tenants,cnpj,{$id},id"],
            'email'=>['nullable', 'min:3','max:255']
        ];

        if ($this->method()=='PUT'){
            $rules['logo']= ['nullable', 'image'];
        }
        
    }
}