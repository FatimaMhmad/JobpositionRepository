<?php

namespace App\Http\Requests\Job_Position;

use App\Models\CompanySpecialization;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class UpdateJobpositionRequest extends FormRequest
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

            'work_nature' => 'nullable|min:10|max:250|string|',
            'working_hours'=>'nullable|integer',
            'salary'=>'nullable|numeric',

            'required_qualifications'=>'nullable|string',
            'number_of_people_allowed'=>'nullable|integer',
            'date_of_publication'=>'nullable|date|after:now',

            'company_id'=>'nullable|integer|exists:companies,id',
            'specialization_id'=>'nullable|integer|exists:specializations,id',
        ];
    }


    public function messages()
    {
        return
        [
            'work_nature.max'      => 'لا يسمح اكثر من مئتان وخمسين حرف',
            'work_nature.min'      => 'لا يسمح اقل من عشرة احرف',
            'work_nature.string'    => 'قم بادخال نص مناسب',
            'working_hours.integer'=>'قم بادخال عدد ساعات مناسب',
            'salary.numeric'=>'قم بادخال راتب مناسب',
            'required_qualifications.string'=> 'قم باخال مؤهلات مناسبة',
            'number_of_people_allowed.integer'=>'قم بادخال عدد اشخاص مناسب',
            'date_of_publication.date'=>'قم بادخال تاريخ نشر مناسب',
            'company_id.integer'=>'قم بادخال رقم شركة مناسب',
            'specialization_id.integer'=>'قم بادخال رقم تخصص مناسب'

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

        $company_specialization=CompanySpecialization::query()
        ->where('company_id',$this->company_id)
        ->where('specialization_id',$this->specialization_id)->first()->id;

        return
        [
            'work_nature'                  =>$this->work_nature,
            'working_hours'               =>$this->working_hours,
            'salary'           =>$this->salary,
            'required_qualifications'=>$this->required_qualifications,
            'number_of_people_allowed'=>$this->number_of_people_allowed,
            'date_of_publication'=>$this->date_of_publication,

            'company_specialization_id'=>$company_specialization
        ];
    }
}
