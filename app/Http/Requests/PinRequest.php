<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PinRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'title' => 'required|string|max:155',
            'description' => 'required',
            'image' => 'required|mimes:jpeg,png,jpg,gif',
            'is_publish' => 'nullable|in:0,1'
        ];
    }
}
