<?php

namespace App\Http\Requests\Company;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class UpdateCompanyRequest extends FormRequest
{

    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return
        [
            'name' => 'nullable|min:5|max:50|string',
            'address'=>'nullable|min:10|max:250|string',
            'description'=>'nullable|min:20|max:250|string',
            'city_id'=>'nullable|numeric',
            'specialization_id'=>'nullable|array',
            'specialization_id.*'=>'numeric|exists:specializations,id',
        ];
    }


    public function messages()
    {
        return
        [
            'name.max'      => 'لا يسمح اكثر من خمسين حرف',
            'name.min'      => 'لا يسمح اقل من خمسة احرف',
            'name.string'    => 'قم بادخال نص مناسب',

            'address.max'=>'لا يسمح اكثر من مئتين وخمسين حرفا',
            'address.min'=>'لا يسمح اقل من عشرة احرف',
            'address.string'=>'قم بادخال نص مناسب',

            'description.max'=>'لا يسمح اكثر من مئتين وخمسين حرفا',
            'description.min'=>'لا يسمح اقل من عشرين حرفا',
            'description.string'=>'قم بادخال نص مناسب',

            'city_id.numeric'=>'قم باخال رقم المدينة',

            'specialization_id.*.numeric'=>'قم بادخال رقم تخصص مناسب'

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
            'name'                  =>$this->name,
            'address'               =>$this->address,
            'description'           =>$this->description,
            'city_id'               =>$this->city_id,
            'user_id'                =>$this->user_id,
            'specialization_id'      =>$this->specialization_id

        ];
    }

}
