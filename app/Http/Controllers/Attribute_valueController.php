<?php

namespace App\Http\Controllers;

use App\Attribute_value;
use App\Attribute;
use App\Product;
use App\Product_attribute;
use Illuminate\Http\Request;

class Attribute_valueController extends Controller
{
    public function create()
    {
        $attribute = Attribute::all();

        return view('admin.attribute_value.create', compact('attribute'));
    }

    public function store(Request $request)
    {
        Attribute_value::create($request->all());

        return redirect('admin/attribute_value/create')->with('thongbao','Tạo loại thuộc tính thành công');
    }

    public function valueProduct()
    {
        $attribute_value = Attribute_value::all();
        $product = Product::all();

        return view('admin.attribute_value.valueproduct', compact('attribute_value', 'product'));
    }

    public function addValueProduct(Request $request)
    {
        Product_attribute::create($request->all());

        return redirect('admin/category/create')->with('thongbao','Thêm thuộc tính thành công');
    }
}
