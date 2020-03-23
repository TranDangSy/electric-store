@extends('admin.widget.index')
@section('content')
<div class="container-fluid">
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Tài khoản</h6>
    <a href="admin/users/create" type="button" class="btn btn-sm btn-primary">Thêm tài khoản mới</a>
  </div>
  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-striped table-bordered" id="example" width="100%" cellspacing="0">
        <thead>
            <tr>
                <th style="width: 5%; text-align: center;">Name</th>
                <th style="width: 15%; text-align: center;">Email</th>
                <th style="width: 15%; text-align: center;">Giới tính</th>
                <th style="width: 25%; text-align: center;">Hành động</th>
            </tr>
        </thead>
        <tbody>
        @foreach($users as $user)
            <tr>
                <td style="width: 5%;" class="text-center"><span>
                {{$user->name}}</span></td>
                <td style="width: 5%;" class="text-center"><span>
                {{$user->email}}</span></td>
                <td style="width: 15%;" class="text-center"><span>
                @if($user->gender == 1)Nam @else Nữ @endif</span></td>
                <td style="width: 10%;">
                <a class="btn btn-sm btn-primary" href="{{ route('users.show', $user->id) }}" title="">Xem</a>
                <a class="btn btn-sm btn-primary" href="{{ route('users.edit', $user->id) }}" title="">Sửa</a>
                <form action="{{ route('users.destroy', $user->id) }}" class="form-delete" role="form" method="post" style="display: inline">
                    @csrf
                    @method('delete')
                      <input type="submit" value="Xóa" class="btn btn-sm btn-danger">
                </form>
                </td>
            </tr>
        @endforeach    
        </tbody>
      </table>
    </div>
  </div>
</div>
</div>
@endsection
