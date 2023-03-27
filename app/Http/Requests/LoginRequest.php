<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class LoginRequest extends FormRequest
{

    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return
        [
            'email'    => 'required|string|email',
            'password' => 'required|string|min:6',
        ];
    }

    public function messages()
    {
        return
        [
            'email.required' => 'الايميل مطلوب',
            'email.string'   => ' قم بادخال نص مناسب'  ,
            'email.email'    => 'قم بادخال ايميل مناسب '  ,

            'password.required' => 'كلمة السر مطلوبة',
            'password.string'   => 'قم بادخال نص مناسب',
            'password.min'      => 'لا يسمح اقل من ستة احرف',

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
            'email'                  => $this->email,
            'password'               => $this->password,
        ];
    }
}
