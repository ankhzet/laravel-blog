@section('entity.title')
	comment
@endsection

@section('form.content')

		@errorable($errors, 'content')
			@labeled('content', 'Content')

				{{ Form::textarea('content', $comment->content ?? '', ['placeholder' =>  'Comment', 'class' => 'form-control']) }}
			@endlabeled
		@enderrorable

		@group()
			@labeled
				{{ Form::submit('Post comment', array('class' => 'btn btn-primary')) }}
			@endlabeled
		@endgroup

@endsection

@include('entity.edit', ['entity' => $comment, 'route' => ['posts.comments', $post]])

@section('form')
@show
