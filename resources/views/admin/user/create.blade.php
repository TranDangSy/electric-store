@extends('admin.widget.index')
@section('content')
<div class="container">
    <div class="card o-hidden border-0 shadow-lg my-5">
        <div class="card-body p-0">
            <div class="row">
                <div class="col-lg-12">
                    <div class="p-5">
                        @if(session('thongbao'))
                        <div class="alert alert-success">
                            {{session('thongbao')}}
                        </div>
                        @endif
                        <div class="text-center">
                            <h1 class="h4 text-gray-900 mb-4">Tạo tài khoản quản trị</h1>
                        </div>
                        <form action="{{route('users.store')}}" method="POST" role="form" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group row">
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <input type="text" class="form-control form-control-user" name="name"
                                        placeholder="Tên nhân viên">
                                </div>
                                <div class="col-sm-6">
                                    <input type="email" class="form-control form-control-user" name="email"
                                        placeholder="Email nhân viên">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <input type="text" class="form-control form-control-user" name="phone"
                                        placeholder="Điện thoại nhân viên">
                                </div>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control form-control-user" name="address"
                                        placeholder="Địa chỉ nhân viên">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <input type="password" class="form-control form-control-user" name="password"
                                        placeholder="Password">
                                </div>
                                <div class="col-sm-2">
                                    <p>Giới tính:</p>
                                </div>
                                <div class="col-sm-4">
                                    <select class="form-control form-control-user" name="gender">
                                        <option value="1">Nam</option>
                                        <option value="0">Nữ</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-2">
                                    <p>Ảnh đại diện</p>
                                </div>
                                <div class="col-sm-10">
                                    <input type="file" class="form-control form-control-user" name="file">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-2">
                                    <p>Cấp độ nhân viên:</p>
                                </div>
                                <div class="col-sm-4">
                                    <select class="form-control form-control-user" name="level">
                                        <option value="1">Nhân viên</option>
                                        <option value="2">Admin</option>
                                    </select>
                                </div>
                                <div class="col-sm-2">
                                    <p>Trạng thái tài khoản:</p>
                                </div>
                                <div class="col-sm-4">
                                    <select class="form-control form-control-user" name="status">
                                        <option value="1">Hoạt động</option>
                                        <option value="0">Tạm dừng</option>
                                    </select>
                                </div>
                            </div>
                            <button data-dismiss="modal" type="submit"
                                class="btn btn-primary btn-xl btn-user btn-block">Tạo tài khoản</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection