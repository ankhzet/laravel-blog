@extends('layout')

@section('title', 'Blog posts')

@section('content')

	<div>
		@foreach ($posts as $post)
			@include('posts.item', compact('post'))
		@endforeach
	</div>

@endsection
