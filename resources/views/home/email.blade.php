<div id="wrap-inner">
    <div id="khach-hang">
        <h3>Thông tin khách hàng</h3>
        <p>
            <span class="info">Khách hàng: </span>
            {{ $infor['fullName'] }}
        </p>
        <p>
            <span class="info">Email: </span>
            {{ $infor['email'] }}
        </p>
        <p>
            <span class="info">Điện thoại: </span>
            {{ $infor['phoneNumber'] }}
        </p>
        <p>
            <span class="info">Địa chỉ: </span>
            {{ $infor['address'] }}
        </p>
        <p>
            <span class="info">Ghi chú: </span>
            {{ $infor['note'] }}
        </p>
    </div>
    <div id="hoa-don">
        <h3>Hóa đơn mua hàng</h3>
        <table class="table-bordered table-responsive">
            <tr class="bold">
                <td width="30%">Tên sản phẩm</td>
                <td width="25%">Giá</td>
                <td width="20%">Số lượng</td>
                <td width="15%">Thành tiền</td>
            </tr>
            <?php foreach ($cartinfor as $cart): ?>
            <tr>
                <td>{{$cart->name}}</td>
                <td class="price">{{ number_format($cart->price) }} VNĐ</td>
                <td>{{$cart->qty}}</td>
                <td class="price">{{number_format($cart->price*$cart->qty,0,',','.')}} VNĐ</td>
            </tr>
            <?php endforeach ?>

            <tr>
                <td colspan="3">Tổng tiền:</td>
                <td class="total-price">{{ $carttotal }} VNĐ</td>
            </tr>
        </table>
    </div>
    <div id="xac-nhan">
        <br>
        <p text-align="justify">
            <b>Quý khách đã đặt hàng thành công!</b><br />
            • Quý khách vui lòng không tắt máy, nhân viên bán hàng sẽ liên hệ sớm nhất với quý khách<br />
            • Nhân viên sẽ liên hệ với Quý khách qua Số Điện thoại mua hàng.<br />
            <b><br />Cám ơn Quý khách đã sử dụng Sản phẩm của Công ty chúng Tôi!</b>
        </p>
    </div>
</div>
