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
            'name'=>'required|string|min:3|max:255',
            'desc'=> 'required|string|min:20|max:12000',
            'price' => 'required|integer',
            'categories_id' => 'required|integer|exists:categories,id',
            'image' => 'required|mimes:jpeg,bmp,png'

        ];
    }
}
