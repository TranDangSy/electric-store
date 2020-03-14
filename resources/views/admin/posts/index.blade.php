@extends('admin.widget.index')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <h1>Quản lý bài viết</h1>
            <a href="{{ route('posts.create') }}" class="btn btn-success" style="float: right">Tạo bài viết</a>
            <table class="table table-bordered">
                <thead>
                    <th width=80px>Id</th>
                    <th>Tiêu đề</th>
                    <th width=150px>Hành động</th>
                </thead>
                <tbody>
                @foreach($posts as $post)
                <tr>
                    <td>{{ $post->id }}</td>
                    <td>{{ $post->title }}</td>
                    <td>
                        <a href="{{ route('posts.show', $post->id) }}" class="btn btn-primary">Xem bài viết</a>
                    </td>
                </tr>
                @endforeach
                </tbody>
   
            </table>
        </div>
    </div>
</div>
@endsection
