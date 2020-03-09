@extends('admin.widget.index')
@section('content')
<div class="container-fluid">
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Sửa thương hiệu {{ $brand->name }}</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
        <form action="{{ route('brands.update',$brand->id) }}" role="form" method="POST" enctype="multipart/form-data">
            @csrf
            @method('put')
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" name="name" class="form-control" value="{{ $brand->name }}">
            </div>
            <div class="form-group">
                <label for="content">Content</label>
                <input type="text" name="content" class="form-control" value="{{ $brand->content }}">
            </div>
            <div class="form-group">
                <label for="address">Address</label>
                <input type="text" name="address" class="form-control" value="{{ $brand->address }}">
            </div>
            <button type="submit" class="btn btn-primary">Lưu thay đổi</button>
        </form>
        </div>
    </div>
</div>
</div>
@endsection
