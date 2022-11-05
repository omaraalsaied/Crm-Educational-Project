<?php

namespace App\Crm\User\Requests;

class CreateUser extends \Crm\base\Requests\ApiRequest
{



    public function authorize(): bool
    {
        return true;
    }


    public function rules(): array
    {
        return [
          'name'=>'required| unique:users',
            'email'=>'required| unique:users',
            'password'=>'required ' ,

        ];
    }
}
