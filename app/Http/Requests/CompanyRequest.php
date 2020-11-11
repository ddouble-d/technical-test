<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CompanyRequest extends FormRequest
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
            $logo = 'image|mimes:png|max:2048|dimensions:min_width=100,min_height=100';
        } else {
            $email = 'required|email|unique:companies,email';
            $logo = 'required|image|mimes:png|max:2048|dimensions:min_width=100,min_height=100';
        }

        return [
            'nama' => 'required',
            'email' => $email,
            'logo' => $logo,
            'website' => 'required|url',
        ];
    }
}
