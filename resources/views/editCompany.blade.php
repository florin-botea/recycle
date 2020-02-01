@extends('layouts.app')

@php
	$col_left_inputs = [
		'name' => [
			'label' => 'Denumire societate',
		],
		'cui' => [
			'label' => 'CUI',
		],
		'nrc' => [
			'label' => 'NRC',
		],
		'motto' => [
			'label' => 'Motto',
		],
		'adress' => [
			'label' => 'Adresa',
		],
		'coord_x' => [
			'label' => 'Coordonata x',
		],
		'coord_y' => [
			'label' => 'Coordonata y',
		],
		'phone' => [
			'label' => 'Telefon',
		],
		'email' => [
			'label' => 'Email',
			'type' => 'email'
		],
		'program' => [
			'label' => 'Program',
			'helpers' => ["Separati cu ' / ' pentru a introduce noi linii in program"]
		],
		'about' => [
			'label' => 'Despre noi',
		],
		'logo' => [
			'label' => 'Logo companie',
			'type' => 'file'
		],
		'authorization' => [
			'label' => 'Autorizatie mediu',
			'type' => 'file'
		]
	];
@endphp

@section('content')
<div class="container flex-1">
	@form ([ 'class'=>'row bg-white py-2', 'action'=>route('company.store'), 'attrs'=>['enctype'=>'multipart/form-data'] ])
		<div class="col-md-6">
			@foreach ($col_left_inputs as $name => $attrs)
				@formGroup ([
					'type' => $attrs['type']??'text',
					'label' => $attrs['label'],
					'name' => $name,
					'value' => $company[$name],
					'helpers' => $attrs['helpers']??null
				])
				@endformGroup
			@endforeach
		</div>
		<div class="col-md-6 position-relative">
			@formGallery (['photos'=>$company->photos])
			@endformGallery
		</div>
		<div class="col-md-6">
			@formSubmit(['class'=>'btn-primary'])
				Update
			@endformSubmit
		</div>
	@endform
</div>
@endsection