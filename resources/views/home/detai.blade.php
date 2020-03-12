@extends('widget.index')
@section('content')
<div class="container">
	<div class="row">
		<div class="col-sm-9 padding-right">
			<div class="product-details">
				<div class="col-sm-5">
					<div class="view-product">
						<img src="{{asset($product->image)}}" alt="" />
					</div>
				</div>
				<div class="col-sm-7">
					<div class="product-information">
						<img src="../admin_asset/images/product-details/new.jpg" class="newarrival" alt="" />
						<h2>{{ $product->name }}</h2>
						<img src="../admin_asset/images/product-details/rating.png" alt="" />
						<span>
							<span>{{ number_format($product->price) }} Đ</span>
							<a href="{{asset('cart/add/'.$product->id)}}" class="btn btn-default add-to-cart">
								<i class="fa fa-shopping-cart"></i>Đặt hàng</a>
						</span>
						<p><b>Tình trạng:</b> Còn hàng</p>
						<p><b>Loại sản phẩm:</b> {{ $product->category->name }}</p>
						<p><b>Thương hiệu:</b> {{ $product->brand->name }} </p>
					</div>
				</div>
			</div>
			<div class="category-tab shop-details-tab">
				<div class="col-sm-12">
					<ul class="nav nav-tabs">
						<li><a href="#details" data-toggle="tab">Details</a></li>
						<li class="active"><a href="#reviews" data-toggle="tab">Reviews</a></li>
					</ul>
				</div>
				<div class="tab-content">
					<div class="tab-pane fade" id="details">
						<p>{{ $product->decription }}</p>
					</div>
					<div class="tab-pane fade active in" id="reviews">
						<div class="col-sm-12">
							<ul>
								<li><a href=""><i class="fa fa-user"></i>EUGEN</a></li>
								<li><a href=""><i class="fa fa-clock-o"></i>12:41 PM</a></li>
								<li><a href=""><i class="fa fa-calendar-o"></i>31 DEC 2014</a></li>
							</ul>
							<div class="fb-comments" data-href="{{Request::url()}}" data-width="" data-numposts="5">
							</div>
						</div>
					</div>

				</div>
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
											<img src="../admin_asset/images/home/recommend1.jpg" alt="" />
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
