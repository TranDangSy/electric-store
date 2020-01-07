@extends('admin.widget.index')
@section('content')
<div class="container-fluid">
<form action="{{ route('category.update',$category->id) }}" role="form" method="POST" enctype="multipart/form-data">
    @csrf
    @method('put')
    <div class="form-group">
        <label for="name">Name</label>
        <input type="text" name="name" class="form-control" value="{{ $category->name }}">
    </div>
    <div class="form-group">
        <label for="name">Image</label>
        <input type="file" name="file" class="form-control">
    </div>
    <div class="form-group">
        <label for="content">Detail</label>
        <input type="text" name="detail" class="form-control" value="{{ $category->detail }}">
    </div>
    <div class="form-group">
        <label for="address">Keyword</label>
        <input type="text" name="keyword" class="form-control" value="{{ $category->keyword }}">
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>
</div>
@endsection
