@extends('widget.index')
@section('content')
@if(session('notif'))
<div class="alert alert-success">
	{{session('notif')}}
</div>
@endif

<div class="container">
	<div class="row">
		<div class="col-sm-9 padding-right">
			<div class="features_items">
				<h2 class="title text-center">Sản phẩm</h2>
				<div class="dropdown">
					<button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Sắp xếp theo
						<span class="caret"></span></button>
					<ul class="dropdown-menu">
						<li>
							<a href="{{ asset('?price_desc') }}" class="title">Giá giảm dần</a>
						</li>
						<li>
							<a href="{{ asset('?new_pro') }}" class="title">Mới nhất</a>
						</li>
						<li>
							<a href="{{ asset('?buy_max') }}" class="title">Mua nhiều nhất</a>
						</li>
					</ul>
				</div>
				@foreach($products as $product)
				<div class="col-sm-4">
					<div class="product-image-wrapper">
						<div class="single-products">
							<div class="productinfo text-center">
								<a href="product/{{$product->id}}/{{$product->slug}}.html"><img
										src="{{asset($product->image)}}" alt="" /></a>
								<h2>{{$product->price}}</h2>
								<p>{{$product->name}}</p>
								<a href="{{asset('cart/add/'.$product->id)}}" class="btn btn-default add-to-cart">
									<i class="fa fa-shopping-cart"></i>Đặt hàng</a>
							</div>
						</div>
						<div class="choose">
							<ul class="nav nav-pills nav-justified">
								<li><a href="{{asset('wishlist/add/'.$product->id)}}"><i
											class="fa fa-plus-square"></i>Thêm vào danh sách mong muốn</a></li>
							</ul>
						</div>
					</div>
				</div>
				@endforeach
				{{ $products->appends(Request::all())->links() }}
			</div>
			<div class="recommended_items">
				<h2 class="title text-center">Sản phẩm đề xuất</h2>
				<div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
					<div class="carousel-inner">
						<div class="item active">
							@foreach($productPay as $item)
							<div class="col-sm-4">
								<div class="product-image-wrapper">
									<div class="single-products">
										<div class="productinfo text-center">
											<a href="product/{{$product->id}}/{{$product->slug}}.html">
												<img src="{{asset($item->image)}}" alt="" /></a>
											<h2>{{$item->price}}</h2>
											<p>{{$item->name}}</p>
											<a href="" class="btn btn-default add-to-cart"><i
													class="fa fa-shopping-cart"></i>Add to cart</a>
										</div>

									</div>
								</div>
							</div>
							@endforeach
						</div>
					</div>
					<a class="left recommended-item-control" href="#recommended-item-carousel" data-slide="prev">
						<i class="fa fa-angle-left"></i>
					</a>
					<a class="right recommended-item-control" href="#recommended-item-carousel" data-slide="next">
						<i class="fa fa-angle-right"></i>
					</a>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection