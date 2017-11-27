<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NetworkRequest extends FormRequest
{
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
            'ipaddress' => 'required|ip',
            'netmask'   => 'required|ip',
            'gateway'   => 'required|ip',
        ];


    }

    public function messages()
    {
        return [
            'ipaddress.required'      => 'IP Address field is required',
            'netmask.required' => 'Subnet Mask field is required',
            'gateway.required' => 'Gateway  field is required',
        ];
    }
}
