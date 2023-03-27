<?php

namespace App\Http\Requests\User_Request;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class UpdateUserrequestRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return
        [

            'name' =>'nullable|string',
            'age'  =>'nullable|integer',
            'marital_status'=>'nullable|string',
            'address'=>'nullable|string',
            'phone'=>'nullable|regex:/(0)[0-9]{9}/',
            'email'=>'nullable|email|string',
            'scientific_experience'=>'nullable|string',
            'practical_experience'=>'nullable|string',
            'mother_langue'=>'nullable|in:Chinese,English,Spanish,Arabic,French,Persian,German,Russian,Malay,Portuguese,Italian,Turkish,Lahnda,Tamil,Urdu,Korean,Hindi,Bengali,Japanese,Vietnamese,Telugu,Marathi',
            'level_of_mother_langue'=>'nullable|in:Beginners,Intermediate,Advanced',
            'additional_languages'=>'nullable|in:Chinese,English,Spanish,Arabic,French,Persian,German,Russian,Malay,Portuguese,Italian,Turkish,Lahnda,Tamil,Urdu,Korean,Hindi,Bengali,Japanese,Vietnamese,Telugu,Marathi',
            'level_of_additional_languages'=>'nullable|in:Beginners,Intermediate,Advanced',
            'skills'=>'nullable|string',
            'hobbies'=>'nullable|string' ,
            'jobposition_id'=>'nullable|integer|exists:jobpositions,id',
        ];
    }

    public function messages()
    {
        return
        [
            'name.string'=>'قم بادخال نص مناسب',

            'age.integer'=>'قم بادخال عمر مناسب',

            'marital_status.string'=>'قم بادخال نص مناسب',

            'address.string'=>'قم بادخال عنوان مناسب',

            'email.string'=>'قم بادخال نص مناسب',
            'email.email'=>'قم بادخال ايميل مناسب',

            'scientific_experience.string'=>'قم بادخال نص مناسب',

            'practical_experience.string'=>'قم بادخال نص مناسب',

            'skills.string'=>'قم بادخال نص مناسب',

            'hobbies.string'=>'قم بادخال نص مناسب',

            'jobposition_id.integer'=>'قم بادخال رقم شاغر وظيفي مناسب',

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
            'age'               =>$this->age,
            'marital_status'           =>$this->marital_status,
            'address'=>$this->address,
            'phone'=>$this->phone,
            'email'=>$this->email,
            'scientific_experience'=>$this->scientific_experience,
            'practical_experience'=>$this->practical_experience,
            'mother_langue'=>$this->mother_langue,
            'level_of_mother_langue'=>$this->level_of_mother_langue,
            'additional_languages'=>$this->additional_languages,
            'level_of_additional_languages'=>$this->level_of_additional_languages,
            'skills'=>$this->skills,
            'hobbies'=>$this->hobbies,

        ];
    }

}
