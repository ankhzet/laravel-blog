
@section('panel.title', $title ?? 'Login form')
@section('panel.content')

	{!! Form::open(['class' => 'form-horizontal']) !!}

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

		@group
			@labeled
				{{ Form::checkbox('remember', 1, $remember ?? 0) }}
				<label for="remember">Remember me</label>
			@endlabeled
		@endgroup

		{{-- CAPCHA!!! --}}

{{-- 		@group
			@labeled
				<input type="hidden" ... />
				<img src="" />
			@endlabeled
		@endgroup
--}}

		{{-- Reset password!!! --}}
{{-- 		@group
			@labeled
				<a href="{{ route('users.reset') }}">Reset password</a>
			@endlabeled
		@endgroup
--}}
		@group
			@labeled
				{{ Form::submit('Login', array('class' => 'btn btn-primary')) }}
			@endlabeled
		@endgroup

	{!! Form::close() !!}
@endsection

@include('panel')
@section('panel')
@show
