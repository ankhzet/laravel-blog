							<span class="glyphicon glyphicon-tags"></span>
							&nbsp;

@if ($tag = $tags->first())

							<span><a href="{{ route('tags.show', $tag) }}">{{ $tag->name }}</a></span>
							@foreach ($tags->slice(1) as $tag)
								<span>, <a href="{{ route('tags.show', $tag) }}">{{ $tag->name }}</a></span>
							@endforeach
@endif

