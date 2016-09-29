<a name="comment{{ $comment->id }}" class="anchor-offsetted"></a>
<div class="row">
	<div class="col-sm-2">
		<a href="{{ route('users.show', $comment->user) }}">{{ $comment->user->name }}</a>
	</div>
	<div class="col-sm-10 content">{!! join(array_map(function ($line) {
		return "<p>" . htmlspecialchars($line) . "</p>";
	}, explode(PHP_EOL, trim($comment->content)))) !!}</div>
</div>

<div class="row">
	<div class="col-sm-10 col-sm-offset-2">
		<hr />

		<div class="pull-left">
			<span class="glyphicon glyphicon-link"></span>
			<a href="{{ route('comments.show', [$comment->post, $comment]) }}">#{{ $comment->id }}</a>
			<span class="text-muted">{{ $comment->created_at->format('d/m/Y H:i') }}</span>
		</div>
		@if ($comment->mutableBy(\Auth::user()))
			<div class="pull-right">
				<a class="text-danger" href="{{ route('comments.destroy', $comment) }}">
					<span class="glyphicon glyphicon-remove"></span>
					Delete
				</a>
			</div>
		@endif
	</div>
</div>
