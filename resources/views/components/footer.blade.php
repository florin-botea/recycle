<footer class="row position-relative w-100 py-3 px-2 m-0 bg-dark text-light" style="bottom:0px;">
	<div class="col-md mb-2">
		<div class="d-flex">
			<div class="flex-grow-1">
				<img class="w-100" src="/logo/logo.jpg">
			</div>
			<ul class="navbar-nav px-2">
				<strong> Meniu </strong>
				@foreach ($navItems as $navItem)
				<li class="nav-item">
					<a class="m-0 p-0 nav-link {{isActiveNavItem($navItem['url'])}}" href="{{$navItem['url']}}"> {{$navItem['name']}} </a>
				</li>
				@endforeach
			</ul>
		</div>
	</div>
	<div class="col-md mb-2">
		<ul class="navbar-nav">
			<strong> Ultimele stiri: </strong>
			@foreach($news as $news_item)
				@if($loop->index >= 3)
					@break
				@endif
				<li class="nav-item">
					<a class="text-light" href="{{$news_item['url']}}"> {{ $news_item['title'] }} </a>
				</li>
			@endforeach
		</ul>
	</div>
	<div class="col-md mb-2">
		<ul class="list-unstyled">
			<strong> Program: </strong>
			@foreach( explode(' / ', $company->program) as $rule )
				<li>
					{{$rule}}
				</li>
			@endforeach
		</ul>
	</div>
	<div class="col-md mb-2">
		<strong> Adresa: </strong>
		<br>
		{{$company->real_adress ?? $company->adress}}
	</div>
</footer>