<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Category;
use App\Brand;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    function __construct()
    {
        $this->middleware('checklevel')->only(['destroy']);
        $this->middleware('checklevel2')->only(['update', 'destroy']);
    }
    
    public function index()
    {
        $products = Product::all();     

        return view('admin.product.index',compact('products'));
    }

    public function create()
    {
        $products = Product::all();
        $categories = Category::all();
        $brands = Brand::all();

        return view('admin.product.create',compact('products', 'categories', 'brands'));
    }

    public function store(StoreProductRequest $request)
    {
        $image = $this->upload($request->file('file'), 'admin_asset/img/product/');
        $request->merge(['image' => $image]);
        $request['slug'] = Str::slug($request->name);

        Product::create($request->all());

        return redirect('admin/products/create')->with('thongbao','Tạo sản phẩm thành công');
    }

    public function show($id)
    {
        $product = Product::find($id);

        return view('admin.product.show', compact('product'));
    }

    public function edit($id)
    {
        $product = Product::find($id);
        $categories = Category::all();
        $brands = Brand::all();

        return view('admin.product.edit', compact('product', 'categories', 'brands'));
    }

    public function update(UpdateProductRequest $request, $id)
    {
        $product = Product::find($id);
        

        $product->name = $request->name;
        $product->decription = $request->decription;
        $product->quantity = $request->quantity;
        $product->price = $request->price;
        $product->discount = $request->discount;
        $product->hot = $request->hot;
        $product->status = $request->status;
        $product->category_id = $request->category_id;
        $product->brand_id = $request->brand_id;
        $product->save();

        return redirect('admin/products');
    }

    public function on($id)
    {
        $product = Product::find($id);  
        if ($product)
        {
            $product->status = 1;
            $product->save();
            return redirect('admin/products');
        }
        else {
            return redirect('admin/products');
        } 
    }

    public function off($id)
    {
        $product = Product::find($id);
        if ($product) 
        {
            $product->status = 0;
            $product->save();
            return redirect('admin/products');
        }
        else 
            return redirect('admin/products');
    }

    public function destroy($id)
    {
        Product::destroy($id);
        
        return back();
    }

    public function upload($file, $path)
    {
        $name = sha1(date('YmdHis') . Str::random(5) . Str::random(2)) . '.' . $file->getClientOriginalExtension();

        $file->move($path, $name);

        return $path . $name;
    }
}
