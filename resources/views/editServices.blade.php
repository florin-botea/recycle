@extends('layouts.app')

@php
	$inputs = [
		'title' => [
			'label' => 'Titlu',
			'helpers' => ['va aparea evidentiat']
		],
		'text' => [
			'label' => 'Text',
		],
	];
@endphp

@section('content')
<div class="container py-2 flex-fill">	
	<div class="row">
		<div class="col-md-6 bg-white">
			@if (!$company->services->isEmpty())
			<h3> Editeaza un serviciu </h3>
			@endif
			<!-- editeaza serviciile deja existente -->
			@foreach ($company->services as $service)
			<div role="container" class="position-relative bg-white">
				@form ([ 'action'=>route('services.update', ['service'=>$service->id]), 'attrs'=>['enctype'=>'multipart/form-data'] ])
					@method('put')
					@foreach ( $inputs as $name => $attrs )
						@formGroup([
							'name' => $name,
							'type' => $attrs['type']??'text',
							'label' => $attrs['label'],
							'id' => $name.$service->id,
							'value' => $service[$name]
						])
						@endformGroup
					@endforeach
					@formSubmit(['class'=>'btn-success'])
						Actualizeaza stire
					@endformSubmit
				@endform
				@form ([ 'action'=>route('services.destroy', ['service'=>$service->id]) ])
					@method('delete')
					@formSubmit(['class'=>'btn-danger position-absolute right-0 bottom-0'])
						Sterge stire
					@endformSubmit
				@endform
			</div>
			<hr>
			@endforeach
			<!-- adauga un serviciu nou sau sterge poze deja existente -->
			<h3> Adauga un serviciu nou </h3>
			@form ([ 'action'=>route('services.store') ])
				@foreach ( $inputs as $name => $attrs )
					@formGroup([
						'name' => $name,
						'type' => $attrs['type']??'text',
						'label' => $attrs['label'],
					])
					@endformGroup
				@endforeach
				@formSubmit(['class'=>'btn-primary'])
					Adauga serviciu
				@endformSubmit
			@endform
		</div>
		
		<div class="col-md-6 bg-white">
			@if (!$company->rules->isEmpty())
			<h3> Editeaza o regula actuala </h3>
			@endif
			<!-- editeaza serviciile deja existente -->
			@foreach ($company->rules as $rule)
			<div role="container" class="position-relative bg-white">
				@form ([ 'action'=>route('rules.update', ['rule'=>$rule->id]) ])
					@method('put')
					@foreach ( $inputs as $name => $attrs )
						@formGroup(array_merge($attrs, [
							'name' => $name,
							'id' => $name.$rule->id,
							'value' => $rule[$name]
						]))
						@endformGroup
					@endforeach
					@formSubmit(['class'=>'btn-success'])
						Actualizeaza regula
					@endformSubmit
				@endform
				@form ([ 'action'=>route('rules.destroy', ['rule'=>$rule->id]) ])
					@method('delete')
					@formSubmit(['class'=>'btn-danger position-absolute right-0 bottom-0'])
						Sterge regula
					@endformSubmit
				@endform
			</div>
			<hr>
			@endforeach
			<!-- adauga un serviciu nou sau sterge poze deja existente -->
			<h3> Adauga o regula noua </h3>
			@form ([ 'action'=>route('rules.store') ])
				@foreach ( $inputs as $name => $attrs )
					@formGroup(array_merge($attrs, [
						'name' => $name,
					]))
					@endformGroup
				@endforeach
				@formSubmit(['class'=>'btn-primary'])
					Adauga regula
				@endformSubmit
			@endform
		</div>
	</div>
	<hr>
	<div class="row">
		<div class="col bg-white">
			@form ([ 'action'=>'/services-photos/update', 'attrs'=>['enctype'=>'multipart/form-data'] ])
				@formGallery([ 'photos'=>$company['services_photos'] ])
				@endformGallery
				@formSubmit(['class'=>'btn-primary'])
					Update
				@endformSubmit
			@endform
		</div>
	</div>
</div>
@endsection