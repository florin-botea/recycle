@extends('layouts.app')

@php
	$page = 'Contact';
	$contactForm = [
		'name' => [
			'label' => 'Nume si prenume'
		],
		'phone' => [
			'label'=> 'Numar de telefon'
		],
		'email' => [
			'label'=> 'Adresa de mail'
		],
		'text' => [
			'label' => 'Mesajul dumneavoastra',
			'type' => 'textarea'
		],
	];
@endphp

@section('content')
	<div class="container flex-1">
		@admin
		<div class="row">
			<a class="d-block w-100 py-0 btn btn-light border border-secondary rounded" href="{{route('company.create')}}" style="top:0;right:0">
				Editeaza <i class="fas fa-edit"></i>
			</a>
		</div>
		@endadmin
		
		<div class="row shadow">
			<div class="col-md bg-white">
				<h2> Eco nu stiu cum SRL </h2>
				CUI: <strong> {{ $company['cui'] }} </strong>
				<br>
				Nr. reg. com.: <strong> {{ $company['nrc'] }} </strong>
				<br>
				<br>
				Adresa sediului social:   {{ $company['adress'] }} 
				@isset( $company['real_adress'] )
					<br>
					Adresa punctului de lucru (depozit):   {{ $company['real_adress'] }} 
				@endisset
				<br>
				<br>
				Telefon: <strong> {{ $company['phone'] }} </strong>
				<br>
				Email: <strong> {{ $company['email'] }} </strong>
				<br>
				Program: 
				<br>
				<strong>
					@foreach( explode(' / ', $company['program']) as $program)
						{{$program}}
						<br>
					@endforeach
				</strong>
			</div>
			<div class="col-md bg-white shadow">
				@form ([ 'action'=>route('contact-us.store'), 'method'=>'post' ])
					<h3> Trimite-ne un mesaj </h3>
					@foreach ( $contactForm as $name => $attrs )
						@formGroup([
							'name' => $name,
							'label' => $attrs['label'],
							'value' => old($name),
							'type' => $attrs['type']??'text',
							'invalid' => $errors->first($name)
						])
						@endformGroup
					@endforeach
					@formSubmit(['class'=>'btn-primary'])
						Trimite mesaj
					@endformSubmit
				@endform
			</div>
		</div>

		<div class="row py-2 mt-2">
			<div class="col-md-8 mx-auto bg-white p-1">
				<div id="mapAPI" style="border:1px solid black; position: relative; padding-top:60%; width:100%;" data-x="{{$company['coord_x']}}" data-y="{{$company['coord_y']}}"></div>
			</div>
		</div>		
	</div>
@endsection