@extends('layout')

@section('entity.title')
	@if ($tag->exists)
		{{ trim($tag->name) }}
	@else
		tag
	@endif
@endsection

@section('form.content')

		@errorable($errors, 'name')
			@labeled('name', 'Tag')
				{{ Form::text('name', $tag->name ?? '', ['placeholder' =>  'Tag name', 'class' => 'form-control']) }}
			@endlabeled
		@enderrorable

		@errorable($errors, 'annotation')
			@labeled('annotation', 'Description')
				{{ Form::textarea('annotation', $tag->annotation ?? '', ['placeholder' =>  'Tag description', 'class' => 'form-control']) }}
			@endlabeled
		@enderrorable

		@group()
			@labeled
				{{ Form::submit('Save', array('class' => 'btn btn-primary')) }}
			@endlabeled
		@endgroup

@endsection

@include('entity.edit', ['entity' => $tag, 'route' => 'tags'])

@section('content')
	@section('form')
		@parent
	@show
@endsection

