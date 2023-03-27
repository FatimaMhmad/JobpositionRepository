<?php

namespace App\Http\Requests\Specialization;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class StoreSpecializationRequest extends FormRequest
{

    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return
        [
            'name' => 'required|min:4|max:50|string|unique:specializations'
        ];
    }

    public function messages()
    {
        return
        [
            'name.required' => 'الاسم مطلوب',
            'name.unique'   => 'هذا التخصص موجود مسبقا',
            'name.max'      => 'لا يسمح اكثر من خمسين حرف',
            'name.min'      => 'لا يسمح اقل من اربعة احرف',
            'name.string'    => 'قم بادخال نص مناسب',
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
