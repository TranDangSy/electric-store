@extends('admin.widget.index')
@section('content')
<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Thông tin chi tiết sản phẩm</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-user-information">
                    <tbody>
                        <tr>
                            <td>Product ID: </td>
                            <td>{{ $product->id }}</td>
                        </tr>
                        <tr>
                            <td>Cover Image: </td>
                            <td><img width="150px" src="{{asset($product->image)}}" alt=""></td>
                        </tr>
                        <tr>
                            <td>Name: </td>
                            <td>{{ $product->name }}</td>
                        </tr>
                        <tr>
                            <td>Decription: </td>
                            <td>{{ $product->decription }}</td>
                        </tr>
                        <tr>
                            <td>Quantity: </td>
                            <td>{{ $product->quantity }}</td>
                        </tr>
                        <tr>
                            <td>Price: </td>
                            <td>{{ $product->price }}</td>
                        </tr>
                        <tr>
                            <td>Discount: </td>
                            <td>{{ $product->discount }}</td>
                        </tr>
                        <tr>
                            <td>Popular: </td>
                            <td>{{ $product->popular }}</td>
                        </tr>
                        <tr>
                            <td>Hot: </td>
                            <td>{{ $product->hot }}</td>
                        </tr>
                        <tr>
                            <td>Category: </td>
                            <td>{{ $product->category->name }}</td>
                        </tr>
                        <tr>
                            <td>Brand: </td>
                            <td>{{ $product->brand->name }}</td>
                        </tr>
                    </tbody>
                </table>  
            </div>
        </div>
    </div>
</div>
@endsection
