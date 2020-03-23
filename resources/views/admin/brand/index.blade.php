@extends('admin.widget.index')
@section('content')
<div class="container-fluid">
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h4 class="m-0 font-weight-bold text-primary">Thương hiệu</h4>
    <a href="admin/brands/create" type="button" class="btn btn-sm btn-primary">Thêm thương hiệu mới</a>
  </div>
  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-striped table-bordered" id="example" width="100%" cellspacing="0">
        <thead>
            <tr>
                <th style="width: 5%; text-align: center;">Name</th>
                <th style="width: 15%; text-align: center;">Nội dung</th>
                <th style="width: 25%; text-align: center;">Hành động</th>
            </tr>
        </thead>
        <tbody>
        @foreach($brands as $brand)
            <tr>
                <td style="width: 5%;" class="text-center"><span>
                {{$brand->name}}</span></td>
                <td style="width: 15%;" class="text-center"><span class="badge" 
                style ="white-space: nowrap; width: 200px; border: 1px solid #000000;
                 overflow: hidden; text-overflow: clip;">
                {{$brand->content}}</span></td>
                <td style="width: 10%;">
                <a class="btn btn-sm btn-primary" href="{{ route('brands.show', $brand->id) }}" title="">Xem</a>
                @if(Auth::user()->level==1 || Auth::user()->level==2)
                  <a class="btn btn-sm btn-primary" href="{{ route('brands.edit', $brand->id) }}" title="">Sửa</a>
                @endif
                @if(($brand->status) == 1)
                <a onclick="return confirm('Bạn có muốn thay đổi trạng thái nhà cung cấp này')"
                  href="admin/brands/off/{{$brand->id}}" class="btn btn-sm btn-danger">Tắt</a>
                @else
                <a onclick="return confirm('Bạn có muốn thay đổi trạng thái nhà cung cấp này')"
                  href="admin/brands/on/{{$brand->id}}" class="btn btn-sm btn-success">Bật</a>
                @endif
                @if(Auth::user()->level==2)
                <form action="{{ route('brands.destroy', $brand->id) }}" class="form-delete" role="form" method="post" style="display: inline">
                    @csrf
                    @method('delete')
                      <input type="submit" value="Xóa" class="btn btn-sm btn-danger">
                </form>
                @endif
                </td>
            </tr>
        @endforeach    
        </tbody>
      </table>
    </div>
  </div>
</div>
</div>
@endsection
