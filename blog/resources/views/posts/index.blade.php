@extends('layout')

@section('title', 'Blog posts')

@section('content')

	@if ($posts->count())
		@foreach ($posts as $post)
			@include('posts.item', compact('post'))
		@endforeach
		{!! $posts->links() !!}
	@else
		<div class="panel panel-default">
			<div class="panel-body">
				No posts yet.
				@if (($user = \Auth::user()) && $user->isModerator())
					But you can <a href="{{ route('posts.create') }}">create</a> one.
				@endif
			</div>
		</div>
	@endif

@endsection
