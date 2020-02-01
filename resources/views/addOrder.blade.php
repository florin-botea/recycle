@extends('layouts.app')

@php
	$page = 'Adauga comanda';
	$formFields = [
		'company' => [
			'label' => 'Companie'
		],
		'name' => [
			'label' => 'Nume si prenume'
		],
		'email' => [
			'label' => 'Adresa de mail'
		],
		'phone' => [
			'label' => 'Telefon'
		],
		'adress' => [
			'label' => 'Adresa',
			'attrs' => [ 'placeholder' => 'Tara, judet, localitate, strada, numar...']
		],
		'details' => [
			'label' => 'Detalii deseuri',
			'type' => 'textarea',
			'attrs' => [ 'placeholder' => 'greutate, cantitate, volum...']
		],
		'photos[]' => [
			'label' => 'Poze deseuri',
			'type' => 'file',
			'attrs' => [ 'multiple' => 'multiple']
		],
		'time' => [
			'label' => 'Disponibilitate recoltare',
			'type' => 'datetime-local',
		],
	];
@endphp

@section('content')
	<div class="container flex-fill shadow">
		<div class="row">
			<div class="col-md-6 bg-white">
				<p class="mb-0">Contactati-ne pentru mai multe detalii <a href="tel:{{ $company->phone }}"> {{ $company->phone }} </a></p>
				<div class="text-center">
					<p class="badge badge-success"> sau </p>
				</div>
				<h4 class="mb-0"> Plasati o comanda: </h4>
				<small> completati formularul de mai jos cu toate datele necesare, iar noi ne vom ocupa de restul... </small>
				<br>
				<br>
				<div class="row">
					<div class="col">
						@form ([ 'action'=>route('orders.store'), 'attrs'=>['enctype'=>'multipart/form-data'] ])	
							@foreach ($formFields as $name => $attrs)
								@formGroup([
									'name' => $name,
									'type' => $attrs['type']??'text',
									'value' => old($name),
									'label' => $attrs['label'],
									'invalid' => $errors->first($name),
									'attrs' => $attrs['attrs']??null
								])
								@endformGroup
							@endforeach
							@formSubmit(['class'=>'btn-primary'])
								Trimite comanda
							@endformSubmit
						@endform
					</div>
				</div>
			</div>
			<div class="col-md-6 p-4 bg-white">
				@component('components.services', ['services'=>$company->services, 'rules'=>$company->rules])
					@gallery(['photos'=>$company['services_photos']])
					@endgallery
				@endcomponent
			</div>
		</div>
	</div>
@endsection