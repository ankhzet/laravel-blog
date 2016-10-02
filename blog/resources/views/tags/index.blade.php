@extends('layout')

@section('title', 'Blog tags')

@section('content')

	@if ($tags->count())
		@foreach ($tags as $tag)
			@include('tags.item', compact('tag'))
		@endforeach
		{!! $tags->links() !!}
	@else
		<div class="panel panel-default">
			<div class="panel-body">
				No tags yet.
				@if (($user = \Auth::user()) && $user->isModerator())
					But you can <a href="{{ route('tags.create') }}">define</a> one.
				@endif
			</div>
		</div>
	@endif

@endsection
