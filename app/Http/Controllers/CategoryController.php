<?php

namespace App\Http\Controllers;
use App\Category;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
class CategoryController extends Controller
{
    function __construct()
    {
        $this->middleware('checklevel')->only(['destroy']);
        $this->middleware('checklevel2')->only(['update', 'destroy']);
    }

    public function index()
    {
        $categories = Category::all();
        return view('admin.category.index', compact('categories'));
    }

    public function create()
    {
        return view('admin.category.create');
    }

    public function store(StoreCategoryRequest $request)
    {
        $category = new Category();
        $category->name = $request->input('name');
        $category->detail = $request->input('detail');
        $category->keyword = $request->input('keyword');
        $category->status = $request->input('status');
        if($request->hasfile('file')){
            $file = $request->file('file');
            $name = time().$file->getClientOriginalName();
            $file->move('admin_asset/img/category/',$name);
            $category->image = $name;
        }
        else {
            return $request;
            $category->image = '';
        }
        $category ->save();
        return redirect('admin/category/create')->with('thongbao','Tạo Category thành công');
    }

    public function show($id)
    {
        $category = Category::find($id);
        return view('admin.category.show', compact('category'));
    }

    public function edit($id)
    {
        $category = Category::find($id);
        return view('admin.category.edit', compact('category'));
    }

    public function update(UpdateCategoryRequest $request, $id)
    {
        $category = Category::find($id);
        $category->name = $request->input('name');
        $category->detail = $request->input('detail');
        $category->keyword = $request->input('keyword');
        if($request->hasFile('file')){
            $file = $request->file('file');
            $name = time().$file->getClientOriginalName();
            $file->move('admin_asset/img/category/',$name);
            $category->image = $name;
        }
        $category->save();
        return redirect('admin/category/');
    }

    public function destroy($id)
    {
        $category= Category::findOrFail($id);
        unlink(public_path()."/"."admin_asset/img/category/" . $category->image);
        $category -> delete();
        return back();
    }
}
