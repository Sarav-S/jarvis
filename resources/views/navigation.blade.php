
<nav class="main-navbar">
	<a href="{!! url('/') !!}" class="brand-name">Jarvis</a>
	@if(count($projects))
	<a href="{!! route('tasks.create') !!}" class="add-task open-modal" data-title="Add New Task" ><i class="fa fa-plus"></i></a>
	@endif
	<div class="container-fluid">
		<div class="navbar-right">
			<a href="{!! route('logout') !!}" class="logout">
				<i class="fa fa-power-off"></i>
			</a>
		</div>
	</div>
	<form action="{!! route('search') !!}" id="search-form" method="GET">
		<input type="text" name="search" id="search" placeholder="Search">
		<button type="submit">
			<i class="fa fa-search"></i>
		</button>
	</form>
</nav>

