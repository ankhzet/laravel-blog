<?php

namespace Blog\Http\Controllers;

use Illuminate\Http\Request;

use Blog\Http\Requests\Post\UpdateRequest;
use Blog\Http\Requests\Post\DeleteRequest;
use Blog\Post;
use Blog\Tag;

class PostsController extends Controller {

	const PER_PAGE = 5;

	/**
	 * Shows specified posts list page.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index($posts = null) {
		if (!$posts)
			$posts = Post::paginate($this::PER_PAGE);
		else
			$posts = $posts->paginate($this::PER_PAGE);

		return $this->innerView('index', compact('posts'));
	}

	/**
	 * Shows specified post.
	 *
	 * @param Blog\Post $post
	 * @return \Illuminate\Http\Response
	 */
	public function show(Post $post) {
		return $this->innerView('show', compact('post'));
	}

	/**
	 * Shows post create page.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create() {
		return $this->edit(new Post());
	}

	/**
	 * Shows post edit page.
	 *
	 * @param Blog\Post $post
	 * @return \Illuminate\Http\Response
	 */
	public function edit(Post $post) {
		return $this->innerView('edit', compact('post'));
	}

	/**
	 * Store new post record in db.
	 *
	 * @param Blog\Http\Requests\Post\UpdateRequest $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(UpdateRequest $request) {
		$post = $request->candidate();
		if ($post->save())
			return $this->innerRedirect('show', $post);

		return $this->backRedirect('Failed to save post');
	}

	/**
	 * Updates post data if validation passed.
	 *
	 * @param Blog\Http\Requests\Post\UpdateRequest $request
	 * @return \Illuminate\Http\Response
	 */
	public function update(UpdateRequest $request) {
		$post = $request->candidate();
		if ($post->update($request->data()))
			return $this->innerRedirect('show', $post);

		return $this->backRedirect('Failed to update post');
	}

	/**
	 * Deletes specified post.
	 *
	 * @param Blog\Http\Requests\Post\DeleteRequest $request
	 * @return \Illuminate\Http\Response
	 */
	public function destroy(DeleteRequest $request) {
		$post = $request->candidate();
		// as post aren't really physically deleted,
		// we don't delete it's comments either.

		// $post->comments->delete();

		return $post->delete()
			? $this->innerRedirect('index')
			: $this->backRedirect('Failed to delete post');
	}

	public function tagFilter(Tag $tag) {
		return $this->index($tag->posts());
	}

}
