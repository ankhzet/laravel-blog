
@section('panel')

		<div class="panel panel-default">
			<div class="panel-heading">
				<h3 class="panel-title">
					@section('panel.title')

					@show
				</h3>
			</div>
			<div class="panel-body">
				@section('panel.content')

				@show
			</div>
		</div>

@endsection
