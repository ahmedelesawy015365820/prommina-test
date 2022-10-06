<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class AlbumRequest extends FormRequest
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
        switch ($this->method()) {
            case 'POST':
            {
                return [
                    'name' => 'required|max:255|string',
                    'images' => 'required',
                    'images.*' => 'mimes:jpg,jpeg,png,gif|max:3000',
                ];
            }
            case 'PUT':
            case 'PATCH':
            {
                return [
                    'name' => 'required|max:255|string',
                    'images' => 'nullable',
                    'images.*' => 'mimes:jpg,jpeg,png,gif|max:3000',
                ];
            }
            default: break;
        }
    }
}
