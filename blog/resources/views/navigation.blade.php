
		<nav class="navbar navbar-default navbar-fixed-top" role="navigation">
			<div class="container">
				<!-- Brand and toggle get grouped for better mobile display -->
				<div class="navbar-header">
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
								<span class="sr-only">Toggle navigation</span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</button>
					<a class="navbar-brand" href="{{ route('home') }}">Blog</a>
				</div>

				<!-- Collect the nav links, forms, and other content for toggling -->
				<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
					<ul class="nav navbar-nav">
						<li><a href="{{ route('posts.index') }}">
							<span class="glyphicon glyphicon-list"></span>
							Posts
						</a></li>
						<li><a href="{{ route('tags.index') }}">
							<span class="glyphicon glyphicon-tags"></span>
							Tags
						</a></li>
					</ul>
					<ul class="nav navbar-nav navbar-right">
						@if ($user = Auth::user())
							<li class="dropdown">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
									@ {{ $user->name }} <span class="caret">
								</a>
								<ul class="dropdown-menu">
									<li><a href="{{ route('users.show', $user) }}">
										<span class="glyphicon glyphicon-user"></span>
										Profile
									</a></li>
									<li role="separator" class="divider"></li>
									@if ($user->isModerator())
										<li><a href="{{ route('posts.create') }}">
											<span class="glyphicon glyphicon-plus"></span>
											New post
										</a></li>
										<li><a href="{{ route('users.index') }}">
											<span class="glyphicon glyphicon-cog"></span>
											User access rights
										</a></li>
										<li role="separator" class="divider"></li>
									@endif
									<li><a href="{{ route('users.logout') }}"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
								</ul>
							</li>
						@else
							<li><a href="{{ route('users.login-form') }}"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
							<li><a href="{{ route('users.registration-form') }}">Register</a></li>
						@endif
					</ul>
				</div><!-- /.navbar-collapse -->
			</div><!-- /.container -->
		</nav>
