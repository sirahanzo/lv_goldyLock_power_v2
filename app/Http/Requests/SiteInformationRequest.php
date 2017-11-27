<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SiteInformationRequest extends FormRequest {


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
            'pn'      => 'required',
            'sn'      => 'required',
            'site_id'      => 'required',
            'site_name'    => 'required',
            'address' => 'required',
        ];
    }


    public function messages()
    {
        return [
            'pn.required'      => 'Part Number field is required',
            'sn.required'      => 'Serial Number field is required',
            'site_id.required'      => 'Site ID field is required',
            'site_name.required'    => 'Site Name field is required',
            'address.required' => 'Site Address field is required',
        ];
    }
}
