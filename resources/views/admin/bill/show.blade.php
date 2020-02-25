@extends('admin.widget.index')
@section('content')
<div class="container-fluid" id="detail-order">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Thông tin chi tiết Hóa đơn {{ $bill->id }}</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-user-information">

                    <tbody>
                        <tr>
                            <td>Thông tin người đặt hàng: </td>
                            <td>{{ $bill->customer->name }}</td>
                        </tr>
                        <tr>
                            <td>Email: </td>
                            <td>{{ $bill->customer->email }}</td>
                        </tr>
                        <tr>
                            <td>Ngày đặt hàng: </td>
                            <td>{{ $bill->date_order }}</td>
                        </tr>
                        <tr>
                            <td>Số điện thoại: </td>
                            <td>{{ $bill->customer->phone_number }}</td>
                        </tr>
                        <tr>
                            <td>Địa chỉ: </td>
                            <td>{{ $bill->customer->address }}</td>
                        </tr>
                        <tr>
                            <td>Ghi chú: </td>
                            <td>{{ $bill->customer->note }}</td>
                        </tr>

                    </tbody>

                </table>
                <table id="myTable" class="table table-bordered table-hover" role="grid"
                    aria-describedby="example2_info">
                    <thead>
                        <tr role="row">
                            <th>STT</th>
                            <th>Tên sản phẩm</th>
                            <th>Số lượng</th>
                            <th>Giá tiền</th>
                    </thead>
                    <tbody>
                        @foreach($bill_details as $key => $item)
                        <tr>
                            <td>{{ $key+1 }}</td>
                            <td>{{ $item->product->name }}</td>
                            <td>{{ $item->quantity  }}</td>
                            <td>{{ number_format($item->price*$item->quantity) }} VNĐ</td>
                        </tr>
                        @endforeach
                        <tr>
                            <td colspan="3"><b>Tổng tiền:</b></td>
                            <td colspan="1"><b style="color:red" class="text-red">{{ number_format($bill->total) }}
                                    VNĐ</b></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="col-md-12">
            <form action="admin/bills/updatebill/{{$bill->id}}" class="status-bill" method="POST">
                @csrf
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-inline">
                            <label>Trạng thái giao hàng: </label>
                            @if($bill->status == 0 || $bill->status == 1)
                            <select class="form-control" name="status">
                                <option value="0" {{ $bill->status == 0 ? 'selected = "selected"' : '' }}>Đang
                                    xử lí</option>
                                <option value="1" {{ $bill->status == 1 ? 'selected = "selected"' : '' }}>Đang
                                    giao hàng</option>
                                <option value="2" {{ $bill->status == 2 ? 'selected = "selected"' : '' }}>Hoàn
                                    thành</option>
                            </select>
                            <input type="submit" value="Cập nhập" class="btn btn-sm btn-danger">
                            @else
                            <label style="color:red">Hoàn thành</label>
                            @endif
                            </tr>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <input type="button" value="Xuất file PDF hóa đơn" class="btn btn-md btn-success"
                            id="export-btn">
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
