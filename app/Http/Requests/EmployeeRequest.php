<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EmployeeRequest extends FormRequest
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
        if ($this->method() == 'PUT') {
            $email = 'required|email|unique:companies,email,' . $this->id;
        } else {
            $email = 'required|email|unique:companies,email';
        }

        return [
            'nama' => 'required',
            'company_id' => 'required',
            'email' => $email,
        ];
    }
}
