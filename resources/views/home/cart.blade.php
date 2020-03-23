@include('widget.header')
@include('widget.dropdown')
<section id="cart_items">
    <div class="container">
        <div class="breadcrumbs">
            <ol class="breadcrumb">
                <li><a href="{{ asset('/') }}">Trang chủ</a></li>
                <li class="active">Giỏ hàng</li>
            </ol>
        </div>
        @if(session('error'))
            <div class="alert alert-danger">
                {{session('error')}}
            </div>
        @endif
        <div class="table-responsive cart_info">
            <table class="table table-condensed">
                <thead>
                    <tr class="cart_menu">
                        <td class="image">Ảnh sản phẩm</td>
                        <td class="description">Tên</td>
                        <td class="price">Giá</td>
                        <td class="quantity">Số lượng</td>
                        <td class="total" style="text-align: center;">Tổng</td>
                        <td class="action">Thao tác</td>
                    </tr>
                </thead>
                <tbody>
                    @foreach($carts as $cart)
                    <tr>
                        <td class="cart_product">
                            <img src="{{ asset($cart->options->image) }}" alt="" width=110px, height=110px />
                        </td>
                        <td class="cart_description">
                            <h4><a href="">{{ $cart->name }}</a></h4>
                        </td>
                        <td class="cart_price">
                            <p>{{ number_format($cart->price) }} VNĐ</p>
                        </td>
                        <td class="cart_quantity">
                            <input type="number" class="form-sm-controll" min="1" max="{{ $cart->options->qty_pro }}" value="{{ $cart->qty }}"
                                    onchange="updateCart(this.value, '{{ $cart->rowId }}')">
                        </td>
                        <td class="cart_price">
                            <p class="price">{{number_format($cart->price*$cart->qty,0,',','.')}} VNĐ</p>
                        </td>
                        <td class="cart_delete" style="width: 70px; text-align: center;">
                            <a href="{{asset('cart/delete/'.$cart->rowId)}}" class="cart_quantity_delete">
                                <i class="fa fa-times"></i></a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <a class="btn btn-default check_out" href="{{ asset('/checkout') }}">Đặt hàng</a>
        </div>
    </div>

    <script type="text/javascript">
        function updateCart(qty, rowId){
                $.get(
                    '{{ asset('cart/update') }}',
                    {qty:qty, rowId:rowId},
                    function(){
                            location.reload();
                    }
                );
            }
    </script>
</section>
@include('widget.endoffile')
@include('widget.footer')
