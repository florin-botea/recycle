@if ($page)
<nav aria-label="breadcrumb" class="shadow">
	<ol class="breadcrumb mb-0">
		<li class="font-weight-bold">{{ strtoupper($page) }}</li>
		<div role="separator" class="ml-auto"></div>
		<li class="breadcrumb-item"><a href="/">Home</a></li>
		<li class="breadcrumb-item active" aria-current="page">{{ $page }}</li>
	</ol>
</nav>
@endif