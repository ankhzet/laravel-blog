
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
				@if ($detailed ?? false)
					<p class="content">{{ $post->content }}</p>
				@else
					<p class="content">{{ preg_replace('/\.*[^\.?!]*$/', '', substr($post->content, 0, 300)) }}...</p>
					<p><a href="{{ route('posts.show', $post) }}">Read more</a></p>
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

				</div> {{-- .row --}}

			</div> {{-- .panel-footer --}}
		</div> {{-- .panel --}}
	</div> {{-- .post --}}
