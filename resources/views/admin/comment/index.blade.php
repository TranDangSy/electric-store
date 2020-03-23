@extends('admin.widget.index')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <h1>Quản lý bình luận</h1>
            <table class="table table-bordered">
                <thead>
                    <th width=80px>Id</th>
                    <th>Nội dung</th>
                    <th>Người bình luận</th>
                    <th>Bài viết</th>
                    <th width=150px>Hành động</th>
                </thead>
                <tbody>
                @foreach($comments as $comment)
                <tr>
                    <td>{{ $comment->id }}</td>
                    <td>{{ $comment->body }}</td>
                    <td>{{ $comment->user->name }}</td>
                    <td>{{ $comment->post->title }}</td>
                    <td>
                        <a href="{{ route('posts.show', $comment->id) }}" class="btn btn-info">Xem</a>
                        <a href="{{ route('posts.edit', $comment->id) }}" class="btn btn-warning">Sửa</a>
                        <form method="POST" action="{{ route('comments.destroy', $comment->id) }}" role="form">
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
