<!DOCTYPE html>
<html lang="vn">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name=csrf-token content="{{csrf_token()}}">
    
    <title>Home | BAS</title>
    <base href="{{asset('admin_asset')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-star-rating/4.0.2/css/star-rating.min.css" />
    <link href="../admin_asset/css/bootstrap.min.css" rel="stylesheet">
    <link href="../admin_asset/css/font-awesome.min.css" rel="stylesheet">
	<link href="../admin_asset/css/main.css" rel="stylesheet">
    <link href="../admin_asset/css/responsive.css" rel="stylesheet">
    <link href="../admin_asset/css/preview.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <style>
        .post__content {
            display: flex;

        }

        .post__icon {
            width: 10px;
            height: 10px;
        }

        .post__text {
            margin-left: 10px;
            font-size: 18px;
        }
    </style>
</head>
