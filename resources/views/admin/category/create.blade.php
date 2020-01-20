<!DOCTYPE html>
<html>
<head>
    <title>Create brand</title>
    <link href="admin_asset/css/bootstrap.min.css" rel="stylesheet">
    <link href="admin_asset/css/font-awesome.min.css" rel="stylesheet">
    <style type="text/css">
    body{
        font-family: 'Roboto', Arial, sans-serif;
        font-size: 13px;
        line-height: 1.4;
        background: #eee;
    }
    .container-fluid{
        margin-right: auto;
        margin-left: auto;
    }
    .main-content{
        padding-top: 25px;
        padding-left: 25px;
        padding-right: 25px;
    }
    *{
        box-sizing: border-box;
    }
    .splash-container{
        max-width: 401px;
        margin: 50px auto;
    }
    div{
        display: block;
    }
    .splash-container .panel{
        margin-bottom: 30px;
    }
    .panel-border-color-primary{
        border-top-color: #4285f4;
    }
    .panel{
        background-color: #ffffff;
        box-shadow: 0px 0px 4px 0px rgba(0, 0, 0, 0.04);
        border-width: 0;
        border-radius: 3px;
    }
    .panel-default{
        border-color: #ddd;
    }
    .splash-container .panel-heading{
        text-align: center;
        margin-bottom: 20px;
        padding-top: 40px;
        padding-bottom: 0px;
    }
    .panel-heading{
        font-size: 18px;
        font-weight: 300px;
        padding-left: 0px;
        padding-right: 0px;
        padding-bottom: 10px;
        margin: 0px 20px;
        border-bottom-width: 0px;
        border-radius: 3px 3px 0 0;
    }
    .splash-description{
        text-align: center;
        display: block;
        line-height: 20px;
        font-size: 20px;
        color: #5a5a5a;
        margin-top: -20px;
        padding-bottom: 10px
    }
    .splash-container .panel .panel-body{
        padding: 20px 30px 15px;
    }
    .panel-body{
        border-radius: 0 0 3px 3px;
    }
    .form-control{
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
    .btn-xl{
        padding: 0px 12px;
        font-size: 15px;
        line-height: 43px;
        border-radius: 3px;
        font-weight: 500;
    }
    .btn-primary{
        background-color: #4285f4; 
    }
    .login-submit .btn{
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
                    <span class="splash-description">Create Category</span>
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
                    <form action="{{route('category.store')}}" method="POST" role="form" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="name">Name:</label>
                            <input type="text" placeholder="Nhập tên của category" class="form-control" name="name" required autofocus>
                        </div>
                        <div class="form-group">
                            <label for="content">Detail:</label>
                            <textarea rows="4" cols="50" name="detail" class="form-control" placeholder="Nhập thông tin của category"></textarea>
                        </div>    
                        <div class="form-group">
                            <label for="image">Image</label>
                            <input type="file" class="form-control" name="file">
                        </div>
                        <div class="form-group">
                            <label for="address">Keyword:</label>
                            <input type="text" class="form-control" placeholder="Nhập địa chỉ của brand" class="form-control" name="keyword">
                        </div>
                        <div class="form-group">
                            <label for="status">Category status:</label>
                            <input type="text" placeholder="Nhập status" class="form-control" name="status">
                        </div>
                        <div class="form-group login-submit">
                            <button data-dismiss="modal" type="submit" class="btn btn-primary btn-xl">Create Category</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>