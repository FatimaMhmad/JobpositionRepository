<?php

namespace App\Http\Requests\City;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class UpdateCityRequest extends FormRequest
{

    public function authorize(): bool
    {
        return  true;
    }

    public function rules(): array
    {
        return
        [
            'name' => 'nullable|max:50|min:4|string'
        ];
    }

    public function messages()
    {

        return
        [
            'title.max'       => 'لا يسمح اكثر من خمسين حرف',
            'title.min'       => 'لا يسمح اقل من اربعة احرف',
            'title.string'    => 'لا يسمح  بادخال رقم',
            'title.nullable'  => 'لم يتم تعديل البيانات البيانات هي نفسها القديمة'
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
        ];
    }
}
