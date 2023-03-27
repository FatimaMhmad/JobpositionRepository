<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Support\Facades\Hash;

class RegisterRequest extends FormRequest
{

    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return
        [
            'name' => 'required|string|max:255|min:5',
            'email' => 'required|string|email|max:255|min:5|unique:users',
            'password' => 'required|string|min:6|confirmed',
            'password_confirmation' => 'min:6'
        ];
    }

    public function messages()
    {
        return
        [
            'name.required' => 'الاسم مطلوب',
            'name.string'   => 'قم بادخال نص مناسب',
            'name.max'      => 'لا يسمح اكثر من مئتان وخمسةوخمسين حرف',
            'name.min'      => 'لا يسمح اقل من خمسة احرف',

            'email.required' => 'الايميل مطلوب',
            'email.string'   => ' قم بادخال نص مناسب'  ,
            'email.max'      => 'لا يسمح اكثر من مئتان وخمسةوخمسين حرف',
            'email.min'      => 'لا يسمح اقل من خمسة احرف',
            'email.unique'   => 'هذا الايميل موجود مسبقا',
            'email.email'    => 'قم بادخال ايميل مناسب '  ,

            'password.required' => 'كلمة السر مطلوبة',
            'password.string'   => 'قم بادخال نص مناسب',
            'password.min'      => 'لا يسمح اقل من ستة احرف',
            'password.confirmed' => 'قم بتأكيد كلمة السر' ,

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
            'name'                   =>$this->name,
            'email'                  =>$this->email,
            'password'               =>Hash::make($this->password),
        ];
    }
}
