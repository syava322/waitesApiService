<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductRequest extends FormRequest
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
            'name' => 'required|string|max:200|min:1',
            'price' => 'required|integer|max:15000',
            'main_picture' => 'required|url',
            'description' => 'string|max:1000',
            'images' => 'url'
        ];
    }

    public function messages()
    {
        return [
            'images.url' => 'Image should url format (https://link.com/)',
            'main_picture.url' => 'Image should url format (https://link.com/)',
            'price.integer' => 'Enter in numerical format',
        ];
    }
}
