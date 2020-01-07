@extends('admin.widget.index')
@section('content')
<div class="container-fluid">
<form action="{{ route('users.update',$user->id) }}" role="form" method="POST" enctype="multipart/form-data">
    @csrf
    @method('put')
    <div class="form-group">
        <label for="email">Email address</label>
        <input type="text" readonly class="form-control-plaintext" value="{{ $user->email }}">
    <div class="form-group">
        <label for="name">Name</label>
        <input type="text" name="name" class="form-control" value="{{ $user->name }}">
    </div>
    <div class="form-group">
    <label for="gender">Giới tính</label>
    <select class="form-control" name="gender">
        <option value="1" {{ $user->gender == 1 ? 'selected = "selected"' : '' }}>Nam</option>
	    <option value="0" {{ $user->gender == 0 ? 'selected = "selected"' : '' }}>Nữ</option>
    </select>
  </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>
</div>
@endsection