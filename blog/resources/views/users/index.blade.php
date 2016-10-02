@extends('layout')

@section('title', 'Blog users')

@section('content')

	{{ Form::open(['route' => 'users.grant-rights']) }}

		<div class="panel panel-default">
			<div class="panel-heading">
				<h3 class="panel-title">
					Users
				</h3>
			</div>

			<ul class="list-group">
					<li class="list-group-item">
						<div class="user row h5">
							<div class="col-sm-3 col-sm-offset-1">Name</div>
							<div class="col-sm-5">Email</div>
							<div class="col-sm-3 text-center">Moderator</div>
						</div>
					</li>
				@foreach ($users as $user)
					<li class="list-group-item">
						@include('users.item', compact('user'))
					</li>
				@endforeach
			</ul>

			<div class="panel-footer">
				<div class="row">
					<div class="col-sm-12">
						{{ Form::submit('Update user roles', array('class' => 'btn btn-primary pull-right')) }}
					</div>
				</div>
			</div>
		</div>

	{{ Form::close() }}

	{!! $users->links() !!}

@endsection
