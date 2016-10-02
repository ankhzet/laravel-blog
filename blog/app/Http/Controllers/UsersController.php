<?php

namespace Blog\Http\Controllers;

use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Http\Request;

use Blog\Http\Requests\User\GrantRoleRequest;
use Blog\Http\Requests\User\DeleteRequest;
use Blog\User;

class UsersController extends Controller {

	const PER_PAGE = 20;

	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct() {
		$this->middleware(function ($request, $next) {
			$route = $request->route()->getName();
			$action = @explode('.', $route)[1];

			$actions = ['index', 'show', 'edit', 'update', 'destroy', 'grant-rights'];
			$forbidd = [];

			$user = \Auth::user();
			switch (true) {
				case !$user: {
					$forbidd = array_diff($actions, ['show']);
					break;
				}
				case !$user->isModerator(): {
					$forbidd = array_diff($actions, ['show', 'edit', 'update']);
					break;
				}
				default: {
				}
			}

			if (in_array($action, $forbidd)) {
				return $this->forbiddenResponse();
			}

			return $next($request);
		});
	}

	protected function forbiddenResponse($message = 'Forbidden') {
		return response($message, 403);
	}

	/**
	 * Shows specified users list page.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index() {
		$users = User::withTrashed()->paginate($this::PER_PAGE);
		return $this->innerView('index', compact('users'));
	}

	/**
	 * Shows specified user.
	 *
	 * @param Blog\User $user
	 * @return \Illuminate\Http\Response
	 */
	public function show(User $user) {
		return $this->innerView('show', compact('user'));
	}

	/**
	 * Shows user edit page.
	 *
	 * @param Blog\User $user
	 * @return \Illuminate\Http\Response
	 */
	public function edit(User $user) {
		if ($user->id != (\Auth::user()->id))
			return $this->forbiddenResponse();

		return $this->innerView('edit', compact('user'));
	}

	/**
	 * Updates user data if validation passed.
	 *
	 * @param Blog\Http\Requests\User\UpdateRequest $request
	 * @return \Illuminate\Http\Response
	 */
	public function update(UpdateRequest $request) {
		if ($user->id != (\Auth::user()->id))
			return $this->forbiddenResponse();

		$user = $request->candidate();
		if ($user->update($request->data()))
			return $this->innerRedirect('show', $user);

		return $this->backRedirect('Failed to update user');
	}

	/**
	 * Deletes specified user.
	 *
	 * @param Blog\Http\Requests\User\DeleteRequest $request
	 * @return \Illuminate\Http\Response
	 */
	public function destroy(DeleteRequest $request) {
		$user = $request->candidate();

		if ($user->id == (\Auth::user()->id))
			return $this->backRedirect('Can\'t delete yourself.');

		$ok = false;
		if ($user->deleted_at)
			$ok = $user->restore();
		else
			$ok = $user->delete();

		return $ok
			? $this->innerRedirect('index')
			: $this->backRedirect('Failed to toggle user');
	}

	public function grantRights(GrantRoleRequest $request) {
		$roles = $request->roles();
		$users = User::withTrashed()->whereIn('id', array_keys($roles));
		foreach ($users->get() as $user) {
			$user->is_moderator = $roles[$user->id];
			$user->save();
		}

		return $this->backRedirect();
	}

}
