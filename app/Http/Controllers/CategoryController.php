<?php

namespace App\Http\Controllers;
use App\Category;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Http\File;
class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $categories = Category::all();
        return view('admin.category.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCategoryRequest $request)
    {
        //
        

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

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $category = Category::find($id);
        return view('admin.category.show', compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $category = Category::find($id);
        return view('admin.category.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCategoryRequest $request, $id)
    {
        //
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

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $category= Category::findOrFail($id);
        unlink(public_path()."/"."admin_asset/img/category/" . $category->image);
        $category -> delete();
        return back();
    }
}
