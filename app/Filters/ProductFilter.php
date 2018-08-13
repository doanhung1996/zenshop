<?php
namespace App\Filters;
use Illuminate\Http\Request;
use App\User;
class ProductFilter extends Filters
{
    protected $filters = ['qc', 'q', 'min'];
    /**
     * @param $username
     * @return mixed
     */
 // ví dụ ở lọc kia có 1 key là min thì thêm 1 key ở $filter xong viết 1 function tên min
    public function qc($category)
    {
        return $this->builder->whereHas('category', function($q) use($category){
            $q->orwhere('slug', $category);
        });
    }

    public function q($value)
    {
        return $this->builder
            ->orwhere('product_name','like',"%$value%")
            ->orwhere('product_name_seal','like',"%$value%");
    }

    public function min($min)
    {
        return $this->builder
            ->where('viewer', '>=', $min);
    }

}