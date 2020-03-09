@include('widget.header')

<body>
	<script async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v6.0">
	</script>
	@include('widget.dropdown')
	<section id="slider">
		<div class="container">
			<div class="row">
				<div class="col-sm-12">
					<div id="slider-carousel" class="carousel slide" data-ride="carousel">
						<ol class="carousel-indicators">
							<li data-target="#slider-carousel" data-slide-to="0" class="active"></li>
							<li data-target="#slider-carousel" data-slide-to="1"></li>
							<li data-target="#slider-carousel" data-slide-to="2"></li>
						</ol>
						<div class="carousel-inner">
							<div class="col-sm-1"></div>
							<div class="item active col-sm-10">
								<img src="../admin_asset/images/home/bannner-giai-phap-karaoke.jpg"
									class="girl img-responsive" alt="" />
							</div>
							<div class="item col-sm-12">
								<div class="col-sm-1"></div>
								<img src="../admin_asset/images/home/slideshow-am-thanh-gia-dinh.jpg"
									class="girl img-responsive" alt="" />
							</div>
							<div class="item col-sm-12">
								<div class="col-sm-1"></div>
								<img src="../admin_asset/images/home/slideshow-am-thanh-phong-hat.jpg"
									class="girl img-responsive" alt="" />
							</div>
						</div>

						<a href="#slider-carousel" class="left control-carousel hidden-xs" data-slide="prev">
							<i class="fa fa-angle-left"></i>
						</a>
						<a href="#slider-carousel" class="right control-carousel hidden-xs" data-slide="next">
							<i class="fa fa-angle-right"></i>
						</a>
					</div>

				</div>
			</div>
		</div>
	</section>
	<div class="col-sm-3">
		<div class="left-sidebar">
			<h2>Loại sản phẩm</h2>
			<div class="panel-group category-products" id="accordian">
				@foreach($categories as $category)
				<div class="panel panel-default">
					<div class="panel-heading">
						<h4 class="panel-title"><a
								href="{{asset('category/'.$category->id.'/'.$category->slug.'.html')}}">{{ $category->name }}</a>
						</h4>
					</div>
				</div>
				@endforeach
			</div>
			<div class="brands_products">
				<h2>Thương hiệu</h2>
				<div class="brands-name">
					<ul class="nav nav-pills nav-stacked">
						@foreach($brands as $brand)
						<li><a href="{{asset('brand/'.$brand->id.'/'.$brand->slug.'.html')}}">{{ $brand->name }}</a>
						</li>
						@endforeach
					</ul>
				</div>
			</div>
			<div class="shipping text-center">
				<img src="../admin_asset/images/home/shipping.jpg" alt="" />
			</div>
		</div>
	</div>
	@yield('content')
	@include('widget.endoffile')
	@include('widget.footer')
