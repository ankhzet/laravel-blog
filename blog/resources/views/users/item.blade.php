
<div class="user row @if ($user->deleted_at) text-muted @endif">
	<div class="col-sm-1 text-right">
		@if ($user->deleted_at)
			<a href="{{ route('users.destroy', $user) }}"><span class="glyphicon glyphicon-eye-open"></span></a>
		@else
			<a href="{{ route('users.destroy', $user) }}"><span class="glyphicon glyphicon-eye-close text-danger"></span></a>
		@endif
	</div>
	<div class="col-sm-3">
		{{ $user->name }}
	</div>
	<div class="col-sm-5">
		{{ $user->email }}
	</div>
	<div class="col-sm-3 text-center">
		{{ Form::hidden("users[]", $user->id) }}
		{{ Form::checkbox("grant[{$user->id}]", 1, $user->isModerator(), $user->is_admin ? ['disabled'] : []) }}
	</div>
</div>
