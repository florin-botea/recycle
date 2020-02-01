@extends('layouts.app')

@php
	$page = 'Servicii';
@endphp

@section('content')
	<div class="container flex-fill shadow">
		@admin
		<div class="row">
			<a class="d-block w-100 btn btn-light border border-secondary rounded" href="{{ route('services.create') }}" style="z-index:100;">
				Editeaza <i class="fas fa-edit"></i>
			</a>
		</div>
		@endadmin
	
		<div class="row">
			<div class="col-md-8 p-0 position-relative">
				@component('components.services', ['services'=>$company->services, 'rules'=>$company->rules])
				@endcomponent
			</div>
			<div class="col-md-4 p-4 position-relative bg-white" id="gallery">
				@foreach($company['services_photos'] as $photo)
				<div class="position-relative float-left" style="width:33%; padding-top:33%">
					<div role="image" class="bg-center thumbnail stretched" style="background: url({{ asset('storage/'.$photo->name) }})"></div>
					<img role="src-for-viewer-lib" src="{{ asset('storage/'.$photo->name) }}" class="stretched opacity-0 w-100 h-100">
				</div>
				@endforeach
			</div>
		</div>
	</div>
@endsection