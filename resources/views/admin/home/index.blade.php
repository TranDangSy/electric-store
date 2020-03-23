@extends('admin.widget.index')
@section('content')
<div class="container-fluid">
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Trang chủ</h1>
  </div>
  <div class="row">
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-primary shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Số sản phẩm</div>
              <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $totalProducts }}</div>
            </div>
            <div class="col-auto">
              <i class="fa fa-calendar fa-2x text-gray-300"></i>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-success shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Sản phẩm bán chạy</div>
              <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $productPay }}</div>
            </div>
            <div class="col-auto">
              <i class="fa fa-dollar-sign fa-2x text-gray-300"></i>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-info shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Số hóa đơn chưa xử lý</div>
              <div class="row no-gutters align-items-center">
                <div class="col-auto">
                  <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">{{ $totalBill }}</div>
                </div>
                <div class="col">
                  <div class="progress progress-sm mr-2">
                    <div class="progress-bar bg-info" role="progressbar" style="width: 50%" aria-valuenow="50"
                      aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-auto">
              <i class="fa fa-clipboard-list fa-2x text-gray-300"></i>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-warning shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Tài khoản</div>
              <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $totalUser }}</div>
            </div>
            <div class="col-auto">
              <i class="fa fa-comments fa-2x text-gray-300"></i>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div id="container"></div>
  @section('scripts')
  <script type="text/javascript" src="https://code.highcharts.com/highcharts.js"></script>
  <script type="text/javascript" src="https://code.highcharts.com/modules/exporting.js"></script>
  <script type="text/javascript" src="https://code.highcharts.com/modules/export-data.js"></script>
  <script type="text/javascript">
    $(document).ready(function(){
        var data_order = <?php echo $data; ?>;
    
    var chart = Highcharts.chart('container', {
    
    title: {
       text: 'Doanh thu theo tháng'
    },
    xAxis: {
       
       categories: ['Tháng 1','Tháng 2','Tháng 3' ,'Tháng 4','Tháng 5','Tháng 6','Tháng 7','Tháng 8','Tháng 9','Tháng 10','Tháng 11','Tháng 12']
    },
    
    
    series: [{
       type: 'column',
       name: 'Tổng doanh thu',
       colorByPoint: true,
       data: data_order,
       showInLegend: false
    }]
    });
    
    $('#plain').click(function () {
    chart.update({
        chart: {
            inverted: false,
            polar: false
        },
        subtitle: {
            text: 'Plain'
        }
    });
    });
    
    $('#inverted').click(function () {
    chart.update({
        chart: {
            inverted: true,
            polar: false
        },
        subtitle: {
            text: 'Inverted'
        }
    });
    });
    
    $('#polar').click(function () {
    chart.update({
        chart: {
            inverted: false,
            polar: true
        },
        subtitle: {
            text: 'Polar'
        }
    });
    });
    });
 </script>
  @endsection
</div>
@stop