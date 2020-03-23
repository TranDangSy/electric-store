@extends('widget.index')
@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <p>
                        {!! $post->body !!}
                    </p>

                    @include('post.commentsDisplay', ['comments' => $post->comments, 'post_id' => $post->id])
                    @if(session('messenger'))
                    <div class="alert alert-success">
                        {{ session('messenger') }}
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection