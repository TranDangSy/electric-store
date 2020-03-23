@extends('admin.widget.index')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Tạo bài viết</div>
                <div class="card-body">
                    <form method="POST" action="{{ route('posts.update', $post->id) }}">
                        <div class="form-group">
                            @csrf
                            @method('put')
                            <label class="label">Tiêu đề bài viết: </label>
                            <input type="text" name="title" class="form-control" value="{{ $post->title }}" required />
                        </div>
                        <div class="form-group">
                            <label class="label">Thân bài: </label>
                            <textarea name="body" id="text" rows="10" cols="50" 
                            class="form-control">{!! $post->body !!}</textarea>
                            <script src={{ url('ckeditor/ckeditor.js') }}></script>
                            <script>
                                CKEDITOR.replace( 'text', {
                                    filebrowserBrowseUrl: '{{ route('ckfinder_browser') }}',} );
                            </script>
                            @include('ckfinder::setup')
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-success">Sửa</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection