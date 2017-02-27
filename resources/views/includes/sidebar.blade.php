<nav class="navbar navbar-default sidebar" role="navigation">
	<div class="container-fluid">
		<div class="navbar-header">
		  <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-sidebar-navbar-collapse-1">
		    <span class="sr-only">Toggle navigation</span>
		    <span class="icon-bar"></span>
		    <span class="icon-bar"></span>
		    <span class="icon-bar"></span>
		  </button>
		</div>
		<div class="collapse navbar-collapse" id="bs-sidebar-navbar-collapse-1">

			<ul class="nav navbar-nav">

				<li class="active"><a href="#">Laravel 5<span style="font-size:16px;" class="pull-right hidden-xs showopacity glyphicon glyphicon-home"></span></a></li>
				<li><a href="{{ url('users/profile') }}">@lang('messages.profile') <span style="font-size:16px;" class="pull-right hidden-xs showopacity glyphicon glyphicon-pencil"></span></a></li>
				<li class="dropdown">
			        <a href="#" class="dropdown-toggle" data-toggle="dropdown">@lang('messages.users') <span class="caret"></span><span style="font-size:16px;" class="pull-right hidden-xs showopacity glyphicon glyphicon-user"></span></a>
			        <ul class="dropdown-menu forAnimate" role="menu">
						<li><a href="{{ url('users/all') }}">@lang('messages.list_users')</a></li>
			        </ul>
			    </li>

				<li class="dropdown">
			        <a href="#" class="dropdown-toggle" data-toggle="dropdown">@lang('messages.posts') <span class="caret"></span><span style="font-size:16px;" class="pull-right hidden-xs showopacity glyphicon glyphicon-tasks"></span></a>
			        <ul class="dropdown-menu forAnimate" role="menu">
						<li><a href="{{ url('posts/all') }}">@lang('messages.list_posts')</a></li>
			            <li><a href="{{ url('posts/create') }}">@lang('messages.create_post')</a></li>
			        </ul>
			    </li>

				<li class="dropdown">
			        <a href="#" class="dropdown-toggle" data-toggle="dropdown">@choice('messages.courses', 10) <span class="caret"></span><span style="font-size:16px;" class="pull-right hidden-xs showopacity glyphicon glyphicon-book"></span></a>
			        <ul class="dropdown-menu forAnimate" role="menu">
						<li><a href="{{ url('cursos/all') }}">@lang('messages.list_cursos')</a></li>
			            <li><a href="{{ url('cursos/create') }}">@lang('messages.create_curso')</a></li>
						<li><a href="{{ url('cursos/notsubscribed') }}">@lang('messages.add_user')</a></li>
			        </ul>
			    </li>

			</ul>
		</div>
	</div>
</nav>
