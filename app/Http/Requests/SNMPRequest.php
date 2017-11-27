<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SNMPRequest extends FormRequest
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
            'snmp_trap'      => 'required|ip',
            'snmp_version' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'snmp_trap.required'      => 'SNMP Trap Adddress field is required',
            'snmp_version.required' => 'SNMP Version field is required',
        ];
    }
}
