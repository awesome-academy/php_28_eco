<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
            'name' => 'required|unique:products,name',
            'category_id' => 'required',
            'cate_parent' => 'required',
            'status' => 'required',
            'price' => 'required|numeric|min:6',
            'image' => 'required|image',
        ];
    }
}
