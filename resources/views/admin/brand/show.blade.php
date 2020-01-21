@extends('admin.widget.index')
@section('content')
<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Thông tin chi tiết Brand</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-user-information">
                    <tbody>
                        <tr>
                            <td>Brand ID: </td>
                            <td>{{ $brand->id }}</td>
                        </tr>
                        <tr>
                            <td>Cover Image: </td>
                            <td><img width="150px" src="{{asset($brand->image)}}" alt=""></td>
                        </tr>
                        <tr>
                            <td>Name: </td>
                            <td>{{ $brand->name }}</td>
                        </tr>
                        <tr>
                            <td>Detail: </td>
                            <td>{{ $brand->content }}</td>
                        </tr>
                        <tr>
                            <td>Keyword: </td>
                            <td>{{ $brand->address }}</td>
                        </tr>
                    </tbody>
                </table>  
            </div>
        </div>
    </div>
</div>
@endsection
