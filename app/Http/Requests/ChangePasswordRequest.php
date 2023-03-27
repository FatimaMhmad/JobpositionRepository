<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class ChangePasswordRequest extends FormRequest
{

    public function authorize(): bool
    {
        return true;
    }


    public function rules(): array
    {
        return
        [
            'current_password'      => 'required',
            'password'              => 'confirmed|string|min:6',
            'password_confirmation' => 'min:6'
        ];
    }

    public function messages()
    {
        return
        [
            'current_password.required' => 'كلمة السر القديمة مطلوب',

            'password.string'    => ' قم بادخال نص مناسب'  ,
            'password.confirmed' => 'قم بتأكيد كلمة السر',
            'password.min'       => 'لا يسمح اقل من ستة احرف',

            'password_confirmation.min' =>  'لا يسمح اقل من ستة احرف',

        ];
    }

    public function failedValidation(Validator $validator)
    {

        throw new HttpResponseException(response()->json([

            'success'   => false,

            'message'   => 'Validation errors',

            'data'      => $validator->errors()

        ]));

    }

    public function validated($key = null, $default = null)
    {
        return
        [
            'current_password'                  => $this->email,
            'password'                          => $this->password,
        ];
    }
}
