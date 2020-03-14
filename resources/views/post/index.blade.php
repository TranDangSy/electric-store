@extends('widget.index')
@section('content')
@if(session('notif'))
<div class="alert alert-success">
	{{session('notif')}}
</div>
@endif

<div class="container">
	<div class="row">
		<div class="col-sm-9 padding-right">
			<div class="features_items">
				<h2 class="title text-center">Danh sách bài viết</h2>
                @foreach($posts as $post)
                    <a href="posts/{{$post->id}}/{{$post->slug}}.html"><p>{{ $post->title }}</p></a>
				@endforeach
			</div>
		</div>
	</div>
</div>
@endsection
