@include('widget.header')
@include('widget.dropdown')
<section id="cart_items">
    <div class="container">
        <div class="breadcrumbs">
            <ol class="breadcrumb">
                <li><a href="{{ asset('/') }}">Home</a></li>
                <li class="active">Danh sách yêu thích</li>
            </ol>
        </div>
        <div class="table-responsive cart_info">

            <table class="table table-condensed">
                <thead>
                    <tr class="cart_menu">
                        <td class="image">Ảnh sản phẩm</td>
                        <td class="description">Tên sản phẩm</td>
                        <td class="price">Giá sản phẩm</td>
                        <td>Xóa</td>
                    </tr>
                </thead>
                <tbody>
                    @foreach($wishlist as $wish)
                    <tr>
                        <td class="wish_product">
                            <img src="{{ asset($wish->options->image) }}" alt="" width=110px, height=110px />
                        </td>
                        <td class="wish_description">
                            <h4>
                                <a href="product/{{$wish->id}}/{{$wish->options->slug}}.html">{{ $wish->name }}</a>
                            </h4>
                        </td>
                        <td class="wish_price">
                            <p>{{ number_format($wish->price) }} VNĐ</p>
                        </td>
                        </td>
                        <td class="wish_delete">
                            <a class="wish_quantity_delete" href="{{asset('wishlist/delete/'.$wish->rowId)}}"><i
                                    class="fa fa-times"></i></a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</section>
@include('widget.endoffile')
@include('widget.footer')