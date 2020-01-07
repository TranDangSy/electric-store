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
    <h6 class="m-0 font-weight-bold text-primary">Category Detail</h6>
    <h1>Category ID: {{ $category->id }}</h1>
    <ul>
        <li>Name: {{ $category->name }}</li>
        <li>Detail: {{ $category->detail }}</li>
        <li>Keyword: {{ $category->keyword }}</li>
    </ul>
</div>
@endsection
