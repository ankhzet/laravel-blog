<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">

		<title>@yield('title')</title>

		{!! asset_link('app.less') !!}

	</head>
	<body>

		@if ($errors->any())
			<div class="alert alert-danger alert-block">
				<strong>Error</strong>
				@if ($message = $errors->first(0, ':message'))
					{{ $message }}
				@else

					@foreach ($errors->all(':message') as $message)
						<p>{{ $message }}</p>
					@endforeach
				@endif

			</div>
		@endif

		@if ($message = Session::get('success'))
			<div class="alert alert-success alert-block">
				<button type="button" class="close" data-dismiss="alert">
					<i class="fa fa-minus-square"></i>
				</button>
				<strong>Success</strong>
				{{ $message }}
			</div>
		@endif

					@section('content')
					@show

		{!! asset_link('jquery.js') !!}
		{!! asset_link('bootstrap.js') !!}
		{!! asset_link('app.js') !!}

	</body>
</html>
