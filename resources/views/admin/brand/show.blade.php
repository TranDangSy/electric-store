@extends('admin.widget.index')
@section('content')
<style>
    ul {
        text-decoration: none;
        list-style-type: none;
    }
    ul li {
        text-decoration: none;
        list-style: none;
    }
</style>
<div class="container-fluid">
    <h6 class="m-0 font-weight-bold text-primary">Brand Detail</h6>
    <h1>Brand ID: {{ $brand->id }}</h1>
    <ul>
        <li>Name: {{ $brand->name }}</li>
        <li>Content: {{ $brand->content }}</li>
        <li>Address: {{ $brand->address }}</li>
    </ul>
</div>
@endsection