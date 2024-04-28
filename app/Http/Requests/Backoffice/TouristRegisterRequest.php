<?php

namespace App\Http\Requests\Backoffice;

use Illuminate\Foundation\Http\FormRequest;

class TouristRegisterRequest extends FormRequest
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
        $user = auth()->user();
        return [
            //
            'fname' => "required",
            'lname' => "required",
            'contact_number' => "required",
            'email' => "required|unique:users,email",
            'password' => "confirmed|min:8",
            'password_confirmation' => "required",
        ];
    }

    public function messages(){
        return [
        ];
    }
}
