<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCreateProductRequest extends FormRequest
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
            'product_name'=>'required|unique:products',
            'product_code'=>'required',
            'price'=>'required|numeric',
            'product_purchase'=>'required|numeric',
            'description'=>'required',
            'detail'=>'required',
            'fileUpload'=>'required',
            'product_cat_id'=>'required',
            'status'=>'required',
            'images'=>'required',
            'images_s'=>'required',
            'link_video'=>'required',
            'product_discount'=>'numeric|min:0|max:100'
        ];
    }
}
