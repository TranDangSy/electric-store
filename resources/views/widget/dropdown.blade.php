<header id="header">
    <div class="header_top">
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <div class="contactinfo">
                        <ul class="nav nav-pills">
                            <li><a href=""><i class="fa fa-phone"></i> 0386496611</a></li>
                            <li><a href=""><i class="fa fa-envelope"></i> dangsy1998@gmail.com</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="social-icons pull-right">
                        <ul class="nav navbar-nav">
                            <li><a href=""><i class="fa fa-facebook"></i></a></li>
                            <li><a href=""><i class="fa fa-twitter"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="header-middle">
        <div class="container">
            <div class="row">
                <div class="col-sm-4">
                    <div class="logo pull-left">
                        <a href="{{ asset('/') }}"><img src="../admin_asset/images/home/logo-binhansi.jpg" class=""
                                style="width: 139px;" /></a>
                    </div>
                </div>
                <div class="col-sm-8">
                    <div class="shop-menu pull-right">
                        <ul class="nav navbar-nav">
                            <li><a href="{{ asset('/wishlist') }}"><i class="fa fa-star"></i>Danh sách yêu thích</a>
                            </li>
                            <li><a href="{{ asset('/checkout') }}"><i class="fa fa-crosshairs"></i>Thanh toán</a></li>
                            <li><a href="{{ asset('/cart') }}"><i class="fa fa-shopping-cart"></i>Giỏ hàng
                                    ({{ Cart::count() }})</a></li>
                            @if(Auth::user())
                            <li>
                                <p style="padding-top: 10px;"><i class="fa fa-user"></i>{{ Auth::user()->name }}</p>
                            </li>
                            <li><a href="" onclick="event.preventDefault();
                                document.getElementById('logout').submit();" title="">Đăng xuất</a></li>
                            <form id="logout" action="logout" method="POST" style="display: none;">
                                @csrf
                            </form>
                            @else
                            <li><a href="login"><i class="fa fa-lock"></i>Đăng nhập</a></li>
                            @endif
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="header-bottom">
        <div class="container">
            <div class="row">
                <div class="col-sm-9">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse"
                            data-target=".navbar-collapse">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                    </div>
                    <div class="mainmenu pull-left">
                        <ul class="nav navbar-nav collapse navbar-collapse">
                            <li><a href="{{ asset('/') }}">Trang chủ</a></li>
                            <li class="dropdown"><a href="#">Bài viết<i class="fa fa-angle-down"></i></a>
                                <ul role="menu" class="sub-menu">
                                    <li><a href="post">Danh sách bài viết</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="search_box pull-right">
                        <form class="typeahead" role="search">
                            <input type="search" name="q" class="form-control search-input"
                                placeholder="Bạn muốn tìm gì?...." autocomplete="off">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>