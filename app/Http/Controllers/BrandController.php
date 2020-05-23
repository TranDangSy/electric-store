<?php

namespace App\Http\Controllers;

use App\Brand;
use App\Http\Requests\StoreBrandRequest;
use App\Http\Requests\UpdateBrandRequest;
use Illuminate\Support\Str;

class BrandController extends Controller
{
    function __construct()
    {
        $this->middleware('checklevel')->only(['destroy']);
        $this->middleware('checklevel2')->only(['update', 'destroy']);
    }
    
    public function index()
    {
        $brands = Brand::all();

        return view('admin.brand.index', compact('brands'));
    }

    public function create()
    {
        return view('admin.brand.create');
    }

    public function store(StoreBrandRequest $request)
    {
        $image = $this->upload($request->file('file'), 'admin_asset/img/brand/');
        $request->merge(['image' => $image]);
        $request['slug'] = Str::slug($request->name);
        $brand = Brand::create($request->all());

        return redirect('admin/brands/create')->with('thongbao','Tạo brand thành công');
    }

    public function show($id)
    {
        $brand = Brand::find($id);

        return view('admin.brand.show', compact('brand'));
    }

    public function edit($id)
    {
        $brand = Brand::find($id);

        return view('admin.brand.edit', compact('brand'));
    }

    public function update(UpdateBrandRequest $request, $id)
    {
        $brand = Brand::find($id);
        $brand->name = $request->name;
        $brand->content = $request->content;
        $brand->address = $request->address;
        $brand->save();

        return redirect('admin/brands');
    }

    public function on($id)
    {
        $brand = Brand::find($id);  
        if ($brand)
        {
            $brand->status = 1;
            $brand->save();
            return redirect('admin/brands');
        }
        else {
            return redirect('admin/brands');
        } 
    }

    public function off($id)
    {
        $brand = Brand::find($id);
        if ($brand) 
        {
            $brand->status = 0;
            $brand->save();
            return redirect('admin/brands');
        }
        else 
            return redirect('admin/brands');
    }

    public function destroy($id)
    {
        Brand::destroy($id);
        
        return back();
    }

    public function upload($file, $path)
    {
        $name = sha1(date('YmdHis') . Str::random(5) . Str::random(2)) . '.' . $file->getClientOriginalExtension();

        $file->move($path, $name);

        return $path . $name;
    }
}
