
	<div class="post">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h3 class="panel-title">
					<div class="row">
						<div class="col-xs-9">
							@if ($detailed ?? false)
								{{ $post->title }}
							@else
								<a href="{{ route('posts.show', $post) }}">
									{{ $post->title }}
									<span class="glyphicon glyphicon-search"></span>
								</a>
							@endif
						</div>
						<div class="col-xs-3 text-muted text-right">
							<small>{{ $post->created_at->format('d/m/Y H:i') }}</small>
						</div>
					</div>
				</h3>
			</div>

			<div class="panel-body">
				@if (($length = strlen($text = $post->content)) && (!($detailed ?? false)) && ($length != strlen($trimmed = trim_text($text, 300, ''))))
					<p class="content">{!! preprocess_text($trimmed) !!}</p>
					<p><a href="{{ route('posts.show', $post) }}">Read more</a></p>
				@else
					<p class="content">{!! preprocess_text($text) !!}</p>
				@endif
			</div>

			<div class="panel-footer">
				<div class="row">

					{{-- 'By: User' footer row --}}
					<div class="col-sm-8 col-xs-7">
						<span class="glyphicon glyphicon-user"></span>
						&nbsp; By:
						<a href="{{ route('users.show', $post->user) }}">
							{{ $post->user->name }}
						</a>
					</div>

					{{-- Moderator links in the same row as 'By:' --}}
					@if ($post->mutableBy(\Auth::user()))
						<div class="col-sm-4 col-xs-5">
							<div class="pull-right">
							<a href="{{ route('posts.edit', $post) }}">
								<span class="glyphicon glyphicon-edit"></span>
								Edit
							</a>
							<a class="text-danger" href="{{ route('posts.destroy', $post) }}">
								<span class="glyphicon glyphicon-remove"></span>
								Delete
							</a>
							</div>
						</div>
					@endif

				</div> {{-- .row --}}

				{{-- 'Comments: number' row if any comments present --}}
				@if (!($detailed ?? false))
					@if ($comments = $post->comments->count())
						<div class="row">
							<div class="col-sm-12">
								<span class="glyphicon glyphicon-comment"></span>
								&nbsp; Comments:
								<a href="{{ route('comments.index', $post) }}">
									{{ $comments }}
								</a>
							</div>
						</div>
					@endif
				@endif

			</div> {{-- .panel-footer --}}
		</div> {{-- .panel --}}
	</div> {{-- .post --}}
