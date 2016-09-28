
@section('title')
	@if ($entity->exists)
		Edit "@yield('entity.title')" - Blog
	@else
		New @yield('entity.title') - Blog
	@endif
@endsection

@section('form')

	@section('panel.title')
		@section('form.title')
			@if ($entity->exists)
				Edit "@yield('entity.title')"
			@else
				New @yield('entity.title')
			@endif
		@show
	@endsection

	@section('panel.content')
		<?php
			if (!is_array($route))
				$route = [$route];

			$route[0] = $route[0] . ($entity->exists ? '.update' : '.store');
			array_push($route, $entity);
		?>
		{!! Form::model($entity, [
			'method' => $entity->exists ? 'PATCH' : 'POST',
			'route' => $route,
			'class' => 'form-horisontal']) !!}

			@section('form.content')

			@show

		{!! Form::close() !!}
	@endsection

	@include('panel')
	@section('panel')
	@show

@endsection
