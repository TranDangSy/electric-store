@include('widget.header')
@include('widget.dropdown')
<section id="cart_items">
    <div class="container">
        <form action="{{ url('/checkout') }}" method="post">
            @csrf
            <div class="breadcrumbs">
                <ol class="breadcrumb">
                    <li><a href="{{ asset('/') }}">Trang chủ</a></li>
                    <li class="active">Thủ tục thanh toán</li>
                </ol>
            </div>
            @if(session('notif'))
            <div class="alert alert-success">
                {{session('notif')}}
            </div>
            @elseif(count($errors) >0)
            <ul>
                @foreach($errors->all() as $error)
                <li class="text-danger">{{ $error }}</li>
                @endforeach
            </ul>
            @endif
            <div class="shopper-informations">
                <div class="row">
                    <div class="col-sm-7">
                        <div class="shopper-info">
                            <p>Thông tin khách hàng</p>

                            <div class="form-group">
                                <input type="text" name="fullName" class="form-control" value="{{ old('fullName') }}" placeholder="Họ và Tên *">
                            </div>
                            <div class="form-group">
                                <input type="text" name="email" value="{{ old('email') }}" class="form-control" placeholder="Email *">
                            </div>
                            <div class="form-group">
                                <input type="text" name="address" value="{{ old('address') }}" class="form-control" placeholder="Địa Chỉ *">
                            </div>
                            <div class="form-group">
                                <input type="text" name="phoneNumber" value="{{ old('phoneNumber') }}" class="form-control" placeholder="Số điện thoại *">
                            </div>
                            <p style="color: red; font-size: 14px">(*) Thông tin quý khách phải nhập đầy đủ</p>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="order-message">
                            <p>Lưu ý vận chuyển</p>
                            <textarea name="note" value="{{ old('message') }}" placeholder="Ghi chú"
                                rows="10"></textarea>
                        </div>
                    </div>
                </div>
            </div>
            <div class="review-payment">
                <h2>Xem lại & Đặt hàng</h2>
            </div>

            <div class="table-responsive cart_info">
                <table class="table table-condensed">
                    <thead>
                        <tr class="cart_menu">
                            <td class="image">Ảnh minh họa</td>
                            <td class="description">Tên sản phẩm</td>
                            <td class="price">Giá</td>
                            <td class="quantity">Số lượng</td>
                            <td class="total">Tổng</td>
                            <td></td>
                        </tr>
                    </thead>
                    <tbody>
                        @if(count($cart))
                        @foreach($cart as $item)
                        <tr>
                            <td class="cart_product" style="margin: 0px">
                                <img width="100px" height="100px" src="{{ asset($item->options->image) }}"
                                    alt="" />
                            </td>
                            <td class="cart_description">
                                <h4><a href="">{{ $item->name }}</a></h4>

                                <p>Web ID: {{ $item->id }}</p>
                            </td>
                            <td class="cart_price">
                                <p>{{ number_format($item->price)}} VNĐ</p>
                            </td>
                            <td class="cart_quantity">
                                {{ $item->qty }}
                            </td>
                            <td class="cart_total">
                                <p class="cart_total_price">{{ number_format($item->subtotal) }}
                                    VNĐ</p>
                            </td>
                        </tr>
                        @endforeach
                        <tr>
                            <td colspan="4">&nbsp;
                                <span>
                                    <a class="btn btn-default update" href="{{ url('/cart')}}">Quay về giỏ
                                        hàng</a>
                                </span>

                            </td>
                            <td colspan="2">
                                <table class="table table-condensed total-result">
                                    <tbody>
                                        <tr>
                                            <td>Tổng :</td>
                                            <td><span>{{ $total }} VNĐ</span></td>
                                        </tr>
                                        <tr>
                                            <td>
                                            </td>
                                            <td>
                                                <button type="submit" class="btn btn-default check_out"
                                                    href="{{ url('checkout')}}">Gửi đơn hàng</button></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </td>
                        </tr>
                        @else
                        <tr>
                            <td>Bạn không có sản phẩm nào trong giỏ hàng</td>
                        </tr>
                        <tr>
                            <td colspan="4">&nbsp;
                                <a class="btn btn-default update" href="{{ url('/')}}">Mua hàng</a>
                            </td>
                        </tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </form>
    </div>
</section>
@include('widget.endoffile')
@include('widget.footer')
