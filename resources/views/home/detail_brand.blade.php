@extends('widget.index')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-sm-9 padding-right">
            <div class="features_items">
                @foreach($products as $product)
                <div class="col-sm-4">
                    <div class="product-image-wrapper">
                        <div class="single-products">
                            <div class="productinfo text-center">
                                <a href="product/{{$product->id}}/{{$product->slug}}.html"><img
                                        src="{{asset($product->image)}}" alt="" /></a>
                                <h2>{{$product->price}}</h2>
                                <p>{{$product->name}}</p>
                                <p><a href="{{asset('cart/add/'.$product->id)}}">Đặt hàng</a></p>
                            </div>
                        </div>
                        <div class="choose">
                            <ul class="nav nav-pills nav-justified">
                                <li><a href="{{asset('wishlist/add/'.$product->id)}}"><i 
                                    class="fa fa-plus-square"></i>Add to wishlist</a></li>
                            </ul>
                        </div>
                    </div>
                </div>

                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection
