<?php

namespace App\Http\Controllers;

use App\Attribute;
use Illuminate\Http\Request;

class AttributeController extends Controller
{
    public function create()
    {
        return view('admin.attribute.create');
    }

    public function store(Request $request)
    {
        Attribute::create($request->all());

        return redirect('admin/attribute/create')->with('thongbao','Tạo thuộc tính thành công');
    }
}
