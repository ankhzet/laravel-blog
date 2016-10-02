<?php

namespace Blog\Http\Controllers;

use Illuminate\Http\Request;

use Blog\Http\Requests\Tag\UpdateRequest;
use Blog\Http\Requests\Tag\DeleteRequest;
use Blog\Tag;

class TagsController extends Controller {

	const PER_PAGE = 15;

	/**
	 * Shows specified tags list page.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index() {
		$tags = Tag::paginate($this::PER_PAGE);
		return $this->innerView('index', compact('tags'));
	}

	/**
	 * Shows tag create page.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create() {
		return $this->edit(new Tag());
	}

	/**
	 * Shows tag edit page.
	 *
	 * @param Blog\Tag $tag
	 * @return \Illuminate\Http\Response
	 */
	public function edit(Tag $tag) {
		return $this->innerView('edit', compact('tag'));
	}

	/**
	 * Store new tag record in db.
	 *
	 * @param Blog\Http\Requests\Tag\UpdateRequest $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(UpdateRequest $request) {
		$tag = $request->candidate();
		if ($tag->save())
			return $this->innerRedirect('show', $tag);

		return $this->backRedirect('Failed to save tag');
	}

	/**
	 * Updates tag data if validation passed.
	 *
	 * @param Blog\Http\Requests\Tag\UpdateRequest $request
	 * @return \Illuminate\Http\Response
	 */
	public function update(UpdateRequest $request) {
		$tag = $request->candidate();
		if ($tag->update($request->data()))
			return $this->innerRedirect('show', $tag);

		return $this->backRedirect('Failed to update tag');
	}

	/**
	 * Deletes specified tag.
	 *
	 * @param Blog\Http\Requests\Tag\DeleteRequest $request
	 * @return \Illuminate\Http\Response
	 */
	public function destroy(DeleteRequest $request) {
		$tag = $request->candidate();
		return $tag->delete()
			? $this->innerRedirect('index')
			: $this->backRedirect('Failed to delete tag');
	}

}
