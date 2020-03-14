<!DOCTYPE html>
<html>

<head>
    <title>Create brand</title>
    <base href="{{asset('admin_asset')}}">
    <link href="../admin_asset/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="../admin_asset/css/bootstrap-4.css" rel="stylesheet" type="text/css">
    <style type="text/css">
        body {
            font-family: 'Roboto', Arial, sans-serif;
            font-size: 13px;
            line-height: 1.4;
            background: #eee;
        }

        .container-fluid {
            margin-right: auto;
            margin-left: auto;
        }

        .main-content {
            padding-top: 25px;
            padding-left: 25px;
            padding-right: 25px;
        }

        * {
            box-sizing: border-box;
        }

        .splash-container {
            max-width: 401px;
            margin: 50px auto;
        }

        div {
            display: block;
        }

        .splash-container .panel {
            margin-bottom: 30px;
        }

        .panel-border-color-primary {
            border-top-color: #4285f4;
        }

        .panel {
            background-color: #ffffff;
            box-shadow: 0px 0px 4px 0px rgba(0, 0, 0, 0.04);
            border-width: 0;
            border-radius: 3px;
        }

        .panel-default {
            border-color: #ddd;
        }

        .splash-container .panel-heading {
            text-align: center;
            margin-bottom: 20px;
            padding-top: 40px;
            padding-bottom: 0px;
        }

        .panel-heading {
            font-size: 18px;
            font-weight: 300px;
            padding-left: 0px;
            padding-right: 0px;
            padding-bottom: 10px;
            margin: 0px 20px;
            border-bottom-width: 0px;
            border-radius: 3px 3px 0 0;
        }

        .splash-description {
            text-align: center;
            display: block;
            line-height: 20px;
            font-size: 20px;
            color: #5a5a5a;
            margin-top: -20px;
            padding-bottom: 10px
        }

        .splash-container .panel .panel-body {
            padding: 20px 30px 15px;
        }

        .panel-body {
            border-radius: 0 0 3px 3px;
        }

        .form-control {
            border-width: 1px;
            border-top-color: #bdc0c7;
            box-shadow: none;
            padding: 10px 12px;
            font-size: 15px;
            transition: none;
            display: block;
            width: 100%;
            height: 48px;
            line-height: 1.5;
            background-color: #fff;
            border: 1px solid #d5d8de;
            border-radius: 2px;
        }

        .btn-xl {
            padding: 0px 12px;
            font-size: 15px;
            line-height: 43px;
            border-radius: 3px;
            font-weight: 500;
        }

        .btn-primary {
            background-color: #4285f4;
        }

        .login-submit .btn {
            margin-top: 20px;
            width: 100%;
        }
    </style>
</head>

<body>
    <div class="container-fluid main-content">
        <div class="splash-container">
            <div class="panel panel-default panel-border-color panel-border-color-primary">
                <div class="panel-heading">
                    <span class="splash-description">Tạo chi tiết thuộc tính</span>
                </div>
                <div class="panel-body">
                    @foreach ($errors->all() as $error)
                    <div class="alert alert-warning">{{ $error }}</div>
                    @endforeach
                    @if(session('thongbao'))
                    <div class="alert alert-success">
                        {{session('thongbao')}}
                    </div>
                    @endif
                    <form action="{{route('addValueProduct')}}" method="POST" role="form"
                        enctype="multipart/form-data">
                        @csrf
                        <h6 for="product_id">Tên sản phẩm:</h6>
                        <select class="form-control" name="product_id">
                            <option value="">---</option>
                            @foreach($product as $pro)
                            <option value="{{$pro->id}}">{{$pro->name}}</option>
                            @endforeach
                        </select>
                        <h6 for="attribute_value_id">Thuộc tính</h6>
                        <select class="form-control" name="attribute_value_id">
                            <option value="">---</option>
                            @foreach($attribute_value as $atr_vl)
                            <option value="{{$atr_vl->id}}">{{$atr_vl->value}}</option>
                            @endforeach
                        </select>
                        <div class="form-group login-submit">
                            <button data-dismiss="modal" type="submit" class="btn btn-primary btn-xl">Tạo thuộc
                                tính</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
