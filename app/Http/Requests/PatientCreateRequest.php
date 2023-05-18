<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PatientCreateRequest extends FormRequest
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
            'patient_id' => 'required',
            'pet_name' => 'required',
            'status' => 'required|numeric',
            'parent' => 'required',
            'breed' => 'required',
            'gender' => 'required',
            'dob' => 'required',
            'contact_phone' => 'required|numeric',
            'address' => 'required'
        ];
    }
}
