@extends('layout')

@section('title', trim($post->title, '.') . " - Blog")

@section('content')

	@include('posts.item', ['post' => $post, 'detailed' => true])

	<a name="comments" class="anchor-offsetted"></a>

	@if ($count = ($comments = $post->comments)->count())
		<div class="comments">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title">Comments ({{ $count }})</h3>
				</div>
				<ul class="list-group">
					@foreach ($comments as $comment)
						<li class="list-group-item comment">
							@include('comments.item', compact('comment'))
						</li>
					@endforeach
				</ul>
			</div>
		</div>
	@endif

	@if (\Auth::user())
		@include('comments.edit', ['comment' => new Blog\Comment([]), 'post' => $post])
	@else
		<div class="panel panel-default">
			<div class="panel-body text-warning">
				Only <a href="{{ route('users.login-form') }}">logined</a> users can leave comments.
			</div>
		</div>
	@endif

@endsection
