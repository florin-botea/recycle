@extends('layouts.app')

@section('content')
	<div class="container flex-fill">
	@if ( !$_news->count() && !$_laws->count() && !$_services->count() && !$_rules->count() )
		<div>
			<h3 class="text-muted"> Niciun rezultat </h3>
			<p> Puteti incerca o noua cautare folosind un alt cuvand cheie </p>
		</div>
	@else
		<div class="col">
		@if( $_laws->count() )
			<div class="p-2 mb-2 bg-white shadow">
				<h3> Legislatie </h3>
				<div class="card p-2">
				@foreach ($_laws as $law)
					<div class="">
						<strong>{{ $law->title }}</strong>
						<p>{{ $law->text }}</p>
					</div>
				@endforeach
				</div>
			</div>
		@endif
		@if( $_news->count() )
			<div class="p-2 mb-2 bg-white shadow">
				<h3> Stiri </h3>
				<div class="card p-2">
				@foreach ($_news as $news_item)
					<div class="">
						<strong>
							<a href="{{ $news_item->url }}">{{ $news_item->title }}</a>
						</strong>
						<p>{{ substr($news_item->text, 0, 200) }}...</p>
					</div>
				@endforeach
				</div>
			</div>
		@endif
		@if( $_services->count() )
			<div class="p-2 mb-2 bg-white shadow">
				<h3> Servicii </h3>
				<div class="card p-2">
				@foreach ($_services as $service)
					<div class="">
						<strong>{{ $service->title }}</strong>
						<p>{{ $service->text }}</p>
					</div>
				@endforeach
				</div>
			</div>
		@endif
		@if( $_rules->count() )
			<div class="p-2 mb-2 bg-white shadow">
				<h3> Modalitati reciclare </h3>
				<div class="card p-2">
				@foreach ($_rules as $rule)
					<div class="">
						<strong>{{ $rule->title }}</strong>
						<p>{{ $rule->text }}</p>
					</div>
				@endforeach
				</div>
			</div>
		@endif
		</div>
	@endif
	</div>
@endsection