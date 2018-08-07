<?php

namespace App\Http\Requests;

use App\Models\Admin\Product;
use Illuminate\Foundation\Http\FormRequest;

class AddQtyCartRequest extends FormRequest
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
        $productQty = Product::find(request('product_id'))->qty;
        return [
            'qty'=>'required|numeric|min:1|max:' . $productQty
        ];
    }
}
