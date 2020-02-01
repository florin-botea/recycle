@extends('layouts.app')

@section('content')
	<div class="container">
		<div class="row mt-2">
			@component('components.businessCard', ['class'=>'col-md-2', 'company'=>$company])
			@endcomponent
			
			@component('components.carousel', ['class'=>'col-md-8', 'photos'=>$carousel])
			@endcomponent
		</div>
		<br>
		<br>
		<div class="row">
			@component('components.carouselNews', ['news'=>$news])
			@endcomponent
		</div>
	</div>
@endsection