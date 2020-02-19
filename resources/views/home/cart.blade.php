@include('widget.header')
@include('widget.dropdown')
<section id="cart_items">
    <div class="container">
        <div class="breadcrumbs">
            <ol class="breadcrumb">
                <li><a href="#">Home</a></li>
                <li class="active">Shopping Cart</li>
            </ol>
        </div>
        <div class="table-responsive cart_info">

            <table class="table table-condensed">
                <thead>
                    <tr class="cart_menu">
                        <td class="image">Item</td>
                        <td class="description">Name</td>
                        <td class="price">Price</td>
                        <td class="quantity">Quantity</td>
                        <td class="total">Total</td>
                        <td>Xóa</td>
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
                        <td>
                            <div class="form-group">
                                <input class="form-control" type="number" min="1" max="{{ $cart->options->qty_pro }}" value="{{ $cart->qty }}"
                                    onchange="updateCart(this.value, '{{ $cart->rowId }}')">
                            </div>
                        </td>
                        <td class="cart_total">
                        <td><span class="price">{{number_format($cart->price*$cart->qty,0,',','.')}}</span></td>
                        </td>
                        <td class="cart_delete">
                            <a class="cart_quantity_delete" href=""><i class="fa fa-times"></i></a>
                        </td>
                        <td>
                        <td><a href="{{asset('cart/delete/'.$cart->rowId)}}">Xóa</a></td>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <a class="btn btn-default check_out" href="{{ asset('/checkout') }}">Check Out</a>
    </div>
</section>
@include('widget.endoffile')
@include('widget.footer')
