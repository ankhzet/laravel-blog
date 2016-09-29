<?php

namespace Blog\Http\Controllers;

use Blog\Http\Requests\Comment\UpdateRequest;
use Blog\Http\Requests\Comment\DeleteRequest;
use Blog\Comment;

class CommentsController extends Controller {

	/**
	 * Store new comment record in db.
	 *
	 * @param Blog\Http\Requests\UpdateRequest $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(UpdateRequest $request) {
		$comment = $request->candidate();
		if ($comment->save())
			return $this->innerRedirect('show', [$request->post(), $comment]);

		return $this->backRedirect('Failed to save comment');
	}

	/**
	 * Deletes specific comment.
	 *
	 * @param Blog\Http\Requests\DeleteRequest $request
	 * @return \Illuminate\Http\Response
	 */
	public function destroy(DeleteRequest $request) {
		$comment = $request->candidate();
		return $comment->delete()
			? $this->innerRedirect('index', $comment->post)
			: $this->backRedirect('Failed to delete comment');
	}

}
