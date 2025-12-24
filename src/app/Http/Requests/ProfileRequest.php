<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProfileRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'image' => 'file|mimetypes:image/jpeg,image/png',
            'name' => 'required|max:20',
            'post_number' => 'required|regex:/^\d{3}-\d{4}$/',
            'address' => 'required',
        ];
    }
}
