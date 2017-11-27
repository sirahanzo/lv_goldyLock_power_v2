<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LogRequest extends FormRequest {


    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }


    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            //
            'id.447.value' => 'required|numeric|between:1,10000',
            'id.448.value' => 'required|numeric|between:1,60',
            'id.449.value' => 'required|numeric|between:1,10000',
        ];
    }


    public function messages()
    {
        return [
            'id.447.value.required' => 'Max of Datalog is required',
            'id.447.value.numeric'  => 'Max of Datalog Must Be A Number',
            'id.447.value.between'  => 'Max of Datalog  Must Be Between 1 And 10000',

            'id.448.value.required' => 'Interval  is required',
            'id.448.value.numeric'  => 'Interval  Must Be A Number',
            'id.448.value.between'  => 'Interval   Must Be Between 1 And 60',

            'id.449.value.required' => 'Max of Eventlog is required',
            'id.449.value.numeric'  => 'Max of Eventlog Must Be A Number',
            'id.449.value.between'  => 'Max of Eventlog  Must Be Between 1 And 10000',
        ];
    }
}
