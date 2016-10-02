@extends('layout')

@section('panel.title', 'Registration form')
@section('panel.content')

	{!! Form::open(['class' => 'form-horizontal']) !!}

		@errorable($errors, 'name')
			@labeled('name', 'User name')
				{{ Form::text('name', $name ?? '', ['placeholder' =>  'Nickname', 'class' => 'form-control']) }}
			@endlabeled
		@enderrorable

		@errorable($errors, 'email')
			@labeled('email', 'Login')
				{{ Form::email('email', $email ?? '', ['placeholder' =>  'example@domain.com', 'class' => 'form-control']) }}
			@endlabeled
		@enderrorable

		@errorable($errors, 'password')
			@labeled('password', 'Password')
				{{ Form::password('password', ['class' => 'form-control']) }}
			@endlabeled
		@enderrorable

		@errorable($errors, 'password_confirmation')
			@labeled('password_confirmation', 'Repeat it')
				{{ Form::password('password_confirmation', ['class' => 'form-control']) }}
			@endlabeled
		@enderrorable

		@group
			@labeled
				{{ Form::submit('Register', array('class' => 'btn btn-primary')) }}
			@endlabeled
		@endgroup

	{!! Form::close() !!}
@endsection

@section('content')
	@include('panel')
	@section('panel')
	@show
@stop
