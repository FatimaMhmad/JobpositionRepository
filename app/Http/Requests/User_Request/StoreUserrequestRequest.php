<?php

namespace App\Http\Requests\User_Request;

use App\Http\Controllers\ApiResponseTrait;
use App\Models\UserJobposition;
use App\Models\Userrequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class StoreUserrequestRequest extends FormRequest
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
        return [

            'name' =>'required|string',
            'age'  =>'required|integer',
            'marital_status'=>'required|string',
            'address'=>'required|string',
            'phone'=>'required|regex:/(0)[0-9]{9}/',
            'email'=>'required|email|string',
            'scientific_experience'=>'required|string',
            'practical_experience'=>'required|string',
            'mother_langue'=>'required|in:Chinese,English,Spanish,Arabic,French,Persian,German,Russian,Malay,Portuguese,Italian,Turkish,Lahnda,Tamil,Urdu,Korean,Hindi,Bengali,Japanese,Vietnamese,Telugu,Marathi',
            'level_of_mother_langue'=>'required|in:Beginners,Intermediate,Advanced',
            'additional_languages'=>'required|in:Chinese,English,Spanish,Arabic,French,Persian,German,Russian,Malay,Portuguese,Italian,Turkish,Lahnda,Tamil,Urdu,Korean,Hindi,Bengali,Japanese,Vietnamese,Telugu,Marathi',
            'level_of_additional_languages'=>'required|in:Beginners,Intermediate,Advanced',
            'skills'=>'required|string',
            'hobbies'=>'required|string' ,
            'jobposition_id'=>'required|integer|exists:jobpositions,id',

        ];
    }

    public function messages()
    {
        return
        [
            'name.required' => ' الاسم مطلوب',
            'name.string'=>'قم بادخال نص مناسب',

            'age.required'=>'العمر مطلوب',
            'age.integer'=>'قم بادخال عمر مناسب',

            'marital_status.required'=>'الحالة الاجتماعية مطلوبة',
            'marital_status.string'=>'قم بادخال نص مناسب',

            'address.required'=>'العنوان مطلوب',
            'address.string'=>'قم بادخال عنوان مناسب',

            'phone.required'=>'رقم الموبايل مطلوب',

            'email.required'=>'الايميل مطلوب',
            'email.string'=>'قم بادخال نص مناسب',
            'email.email'=>'قم بادخال ايميل مناسب',
            'scientific_experience.required'=>'الخبرات العلمية مطلوبة',
            'scientific_experience.string'=>'قم بادخال نص مناسب',

            'practical_experience.required'=>'الخبرات العملية مطلوبة',
            'practical_experience.string'=>'قم بادخال نص مناسب',

            'mother_langue.required'=>'اللغة الام مطلوبة',
            'level_of_mother_langue.required'=>'مستوى اللغة الام مطلوب',

            'additional_languages.required'=>'اللغات الاضافية مطلوبة',
            'level_of_additional_languages.required'=>'مستوى اللغات الاضافية مطلوب',

            'skills.required'=>'المهارات مطلوبة',
            'skills.string'=>'قم بادخال نص مناسب',

            'hobbies.required'=>'الهوايات مطلوبة',
            'hobbies.string'=>'قم بادخال نص مناسب',

            'jobposition_id.required'=>'رقم الشاغر الوظيفي مطلوب',
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
        $user_id=auth()->user()->id;
        $count_request=UserJobposition::query()->where('user_id',$user_id)
                                        ->where('jobposition_id',$this->jobposition_id)
                                        ->count('id');

        if($count_request == 0)
        {
            return
            [

                'name'                  =>$this->name,
                'age'                   =>$this->age,
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
                'jobposition_id'=>$this->jobposition_id,
                'user_id'=>$this->user_id,

            ];

        }

        else

        {

            throw new HttpResponseException(response()->json([

            'success'   => false,

            'message'   => 'Validation errors',

            'data'      => 'you already send cv to this jobPosition'

        ]));

        }


    }
}
