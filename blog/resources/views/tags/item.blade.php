
	<div class="tag">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h3 class="panel-title">
					<div class="row">
						<div class="col-xs-9">
							<a href="{{ route('tags.show', $tag) }}">
								{{ $tag->name }}
								<span class="glyphicon glyphicon-search"></span>
							</a>
						</div>
						<div class="col-xs-3 text-muted text-right">
							<small>{{ $tag->created_at->format('d/m/Y H:i') }}</small>
						</div>
					</div>
				</h3>
			</div>

			@if ($tag->annotation)
				<div class="panel-body">
					{!! preprocess_text($tag->annotation) !!}
				</div>
			@endif

			<div class="panel-footer">
				<div class="row">

					<div class="col-sm-8 col-xs-7">
						<span class="glyphicon glyphicon-list"></span>
						&nbsp; Posts:
						<a href="{{ route('tags.show', $tag) }}">
							{{ $tag->posts()->count() }}
						</a>
					</div>

					{{-- Moderator links --}}
					@if (($user = \Auth::user()) && $user->isModerator())
						<div class="col-sm-4 col-xs-5">
							<div class="pull-right">
							<a href="{{ route('tags.edit', $tag) }}">
								<span class="glyphicon glyphicon-edit"></span>
								Edit
							</a>
							<a class="text-danger" href="{{ route('tags.destroy', $tag) }}">
								<span class="glyphicon glyphicon-remove"></span>
								Delete
							</a>
							</div>
						</div>
					@endif

				</div> {{-- .row --}}

			</div> {{-- .panel-footer --}}
		</div> {{-- .panel --}}
	</div> {{-- .tag --}}
