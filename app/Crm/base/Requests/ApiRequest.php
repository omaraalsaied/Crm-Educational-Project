<?php

namespace Crm\base\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Validation\ValidationException;
use Symfony\Component\HttpFoundation\Response;

abstract class ApiRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    abstract public function authorize();

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    abstract public function rules();

    /**
     */
    protected function failedValidation(Validator $validator)
    {
        $errors = (new ValidationException($validator))->errors();
        if(!empty($errors)){
            $transformedErrors=[];
            foreach ($errors as $field=>$message){
                $transformedErrors[] =[
                $field=>$message[0]
                ];
            }
            throw new HttpResponseException(
                response()->json(
                    [
                    'status'=>'error',
                    'errors'=>$transformedErrors
                    ],
                    Response::HTTP_BAD_REQUEST
                )
            );
        }
    }

}
