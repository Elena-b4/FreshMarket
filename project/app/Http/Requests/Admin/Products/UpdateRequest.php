<?php

namespace App\Http\Requests\Admin\Products;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
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
            'name' => 'required',
            'description' => 'required',
            'main_image_path' => '',
            'sale_price' => 'required',
            'base_price' => 'required',
            'in_stock' => '',
            'category_id' => 'required',
            'manufacture_id' => 'required',
        ];
    }
}
