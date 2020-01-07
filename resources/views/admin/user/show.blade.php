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
    <h6 class="m-0 font-weight-bold text-primary">User Detail</h6>
    <h1>User ID: {{ $user->id }}</h1>
    <ul>
        <li>Name: {{ $user->name }}</li>
        <li>Email: {{ $user->email }}</li>
        <li>Giới tính: @if($user->gender == 1)Nam @else Nữ @endif</li>
    </ul>
</div>
@endsection