<nav class="navbar navbar-expand-lg navbar-dark" style="background:#003300;">
	<a class="navbar-brand" href="/"> 
		<strong>{{ $company->name }}</strong>
	</a>
	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
		<span class="navbar-toggler-icon"></span>
	</button>

	<div class="collapse navbar-collapse" id="navbarTogglerDemo02">
		<ul class="navbar-nav mr-auto mt-2 mt-lg-0">
			@foreach ($navItems as $navItem)
			<li class="nav-item {{$navItem['url']}} {{ isActiveNavItem($navItem['url']) }}">
				<a class="nav-link" href="{{ $navItem['url'] }}"> {{ $navItem['name'] }} </a>
			</li>
			@endforeach
		</ul>
		<form class="form-inline my-2 my-lg-0" action="/search" method="get">
			<input name="string" class="form-control mr-sm-2" type="search" placeholder="Search" required>
			<button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
		</form>
	</div>
</nav>