<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">

		<title>Admin login form - Blog</title>

		{!! asset_link('app.less') !!}

	</head>
	<body>

		<div class="container">
			<div class="row">
				<main class="col-sm-8 col-sm-offset-2 col-xs-12" role="main">

					@include('auth.login-form', ['title' => 'Admin login form'])

				</main>
			</div>
		</div>

		{!! asset_link('jquery.js') !!}
		{!! asset_link('bootstrap.js') !!}
		{!! asset_link('app.js') !!}

	</body>
</html>
