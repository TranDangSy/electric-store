@extends('admin.widget.index')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <h1>Quản lý bài viết</h1>
            <a href="{{ route('posts.create') }}" class="btn btn-success" style="float: left">Tạo bài viết</a>
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
                        <a href="{{ route('posts.show', $post->id) }}" class="btn btn-info">Xem</a>
                        <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-warning">Sửa</a>
                        <form method="POST" action="{{ route('posts.destroy', $post->id) }}" role="form">
                            @csrf
                            @method('delete')
                                <input type="submit" value="Xóa" class="btn btn-danger">
                        </form>
                    </td>
                </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
