@extends('layout')

@section('entity.title')
	@if ($post->exists)
		{{ trim($post->title, '.') }}
	@else
		post
	@endif
@endsection

@section('form.content')

		@errorable($errors, 'title')
			@labeled('title', 'Title')
				{{ Form::text('title', $post->title ?? '', ['placeholder' =>  'Post title', 'class' => 'form-control']) }}
			@endlabeled
		@enderrorable

		@errorable($errors, 'content')
			@labeled('content', 'Content')
				{{ Form::textarea('content', $post->content ?? '', ['placeholder' =>  'Post contents', 'class' => 'form-control']) }}
			@endlabeled
		@enderrorable

		@errorable($errors, 'tags')
			@labeled('tags', 'Tags')
				{{ Form::text('tags', join(', ', array_map(function ($tag) {
					return $tag->name;
				}, $post->tags->all())) ?? '', ['placeholder' =>  'Post associated tags', 'class' => 'form-control', 'id' => 'tags-input']) }}
			@endlabeled
		@enderrorable

		@group()
			@labeled
				{{ Form::submit('Save', array('class' => 'btn btn-primary')) }}
			@endlabeled
		@endgroup

@endsection

@include('entity.edit', ['entity' => $post, 'route' => 'posts'])

@section('content')
	@section('form')
		@parent
	@show
@endsection

