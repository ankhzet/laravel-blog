@extends('layout')

@section('content')


@section('panel.title')
	<div class="row">
		<div class="col-xs-9">
			{{ $user->name }}
		</div>
		<div class="col-xs-3 text-muted text-right">
			<small>{{ $user->created_at->format('d/m/Y H:i') }}</small>
		</div>
	</div>
@endsection

@section('panel.content')

		@errorable($errors, 'email')
			@labeled('email', 'Login')
				<div class="input-group">
					{{ Form::email('email', $email ?? '', ['placeholder' =>  'example@domain.com', 'class' => 'form-control', 'readonly']) }}
					<span class="input-group-btn">
						<a class="btn btn-danger" href="{{ route('users.destroy', $user) }}">
							<span class="glyphicon glyphicon-remove"></span>
							Delete user
						</a>
					</span>
				</div>
			@endlabeled
		@enderrorable

@endsection

@include('panel')
@section('panel')
@show
@endsection
