<nav class="main-navbar">
	<button type="button" class="toggler">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
    </button>
	<a href="{!! url('/') !!}" class="brand-name">Jarvis</a>
	<div class="container-fluid">
		<div class="navbar-right">
			<a href="{!! route('logout') !!}" class="logout">
				<i class="fa fa-power-off"></i>
			</a>
		</div>
	</div>
	<form action="" id="search-form" method="GET">
		<input type="text" name="search" id="search" placeholder="Search">
		<button type="submit">
			<i class="fa fa-search"></i>
		</button>
	</form>
</nav>

<div id="sidebar">
	<ul class="links">
		<li>
			<a href="{!! route('home') !!}">
				<i class="fa fa-calendar"></i>
				<span class="label">My Calendar</span>
			</a>
		</li>
		<li>
			<a href="{!! route('inbox') !!}">
				<i class="fa fa-inbox"></i>
				<span class="label">Inbox</span>
			</a>
		</li>
	</ul>
	<h4 class="title">
		<a href="{!! url('/projects') !!}" class="project-all">PROJECTS</a>
		<a href="{!! route('projects.create') !!}" class="add-project open-modal" data-title="Add New Project">
			<i class="fa fa-plus"></i>
		</a>
	</h4>
	<ul class="projects">
		<?php $projects = getProjects(); ?>
		@foreach($projects as $project)
		<li>
			<a href="{!! route('tasks.index', ['project_id' => $project->id]) !!}">
				<i class="fa fa-folder"></i>
				{!! $project->name !!}
			</a>
		</li>
		@endforeach
	</ul>
</div>