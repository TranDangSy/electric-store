@extends('admin.widget.index')
@section('content')
<div class="container-fluid">
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Sửa Sản phẩm</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
        <form action="{{ route('products.update',$product->id) }}" role="form" method="POST" enctype="multipart/form-data">
            @csrf
            @method('put')
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" name="name" class="form-control" value="{{ $product->name }}">
            </div>
            <div class="form-group">
                <label for="decription">Decription</label>
                <input type="text" name="decription" class="form-control" value="{{ $product->decription }}">
            </div>
            <div class="form-group">
                <label for="quantity">Quantity</label>
                <input type="text" name="quantity" class="form-control" value="{{ $product->quantity }}">
            </div>
            <div class="form-group">
                <label for="price">Price</label>
                <input type="text" name="price" class="form-control" value="{{ $product->price }}">
            </div>
            <div class="form-group">
                <label for="discount">Discount</label>
                <input type="text" name="discount" class="form-control" value="{{ $product->discount }}">
            </div>
            <div class="form-group">
                <label for="popular">Popular</label>
                <input type="text" name="popular" class="form-control" value="{{ $product->popular }}">
            </div>
            <div class="form-group">
                <label for="hot">Hot</label>
                <input type="text" name="hot" class="form-control" value="{{ $product->hot }}">
            </div>
            <div class="form-group">
                <label for="status">Status</label>
                <input type="text" name="status" class="form-control" value="{{ $product->status }}">
            </div>
            <div class="form-group">
                <label for="category">Category</label>
                <select name="category_id" class="form-control">
                    @foreach($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="brand">Brand</label>
                <select name="brand_id" class="form-control">
                    @foreach($brands as $brand)
                    <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Lưu thay đổi</button>
        </form>
        </div>
    </div>
</div>
</div>
@endsection
