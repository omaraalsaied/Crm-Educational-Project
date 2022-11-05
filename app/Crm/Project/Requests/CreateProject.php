<?php

namespace App\Crm\Project\Requests;


use Crm\base\Requests\ApiRequest;


class CreateProject extends ApiRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules(): array
    {
        return [
            'name'=> 'min:3 | required',
            'status'=> 'required | numeric',
            'cost' =>'required | numeric',
        ];
    }
}
