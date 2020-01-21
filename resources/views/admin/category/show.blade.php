@extends('admin.widget.index')
@section('content')
<div class="container-fluid">
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Thông tin chi tiết Category</h6>
  </div>
  <div class="card-body">
    <div class="table-responsive">
        <table class="table table-user-information">
            <tbody>
                  <tr>
                    <td>Category ID: </td>
                    <td>{{ $category->id }}</td>
                  </tr>
                  <tr>
                    <td>Cover Image: </td>
                    <td><img width="150px" src="{{asset('../public/admin_asset/img/category/'.$category->image)}}" alt=""></td>
                  </tr>
                  <tr>
                    <td>Name: </td>
                    <td>{{ $category->name }}</td>
                  </tr>
                  <tr>
                    <td>Detail: </td>
                    <td>{{ $category->detail }}</td>
                  </tr>
                  <tr>
                    <td>Keyword: </td>
                    <td>{{ $category->keyword }}</td>
                  </tr>
            </tbody>
        </table>  
    </div>
  </div>
</div>
</div>
@endsection
