<?php

namespace App\Http\Requests\Backoffice;

use Illuminate\Foundation\Http\FormRequest;

class TourRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return auth()->check() AND in_array(auth()->user()->type, ['super_user', 'admin', 'tour_guide']);
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
            'destination_id' => "required",
            'name' => "required",
            'details' => "required",
            'activities' => "required",
            'price' => "required",
            'thumbnail' => "required|file",
        ];
    }
}
