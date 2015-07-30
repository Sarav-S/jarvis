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
			<a href="">
				<i class="fa fa-calendar"></i>
				<span class="label">My Calendar</span>
			</a>
		</li>
		<li>
			<a href="">
				<i class="fa fa-inbox"></i>
				<span class="label">Inbox</span>
			</a>
		</li>
	</ul>
	<h4 class="title">PROJECTS</h4>
	<ul class="projects">
		<li>
			<a href="">
				<i class="fa fa-folder"></i>
				AROKIYA SHOP
			</a>
		</li>
		<li>
			<a href="">
				<i class="fa fa-folder"></i>
				MONEY APP
			</a>
		</li>
		<li>
			<a href="">
				<i class="fa fa-folder"></i>
				HOME LOAN
			</a>
		</li>
		<li>
			<a href="">
				<i class="fa fa-folder"></i>
				EXPENDITURE
			</a>
		</li>
	</ul>
</div>