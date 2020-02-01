@extends('layouts.app')

@php
	$inputs = [
		[
			'name' => 'url',
			'label' => 'Url catre lege',
		],
		[
			'name' => 'title',
			'label' => 'Titlu lege',
		],
		[
			'name' => 'text',
			'label' => 'Text lege',
		]
	];
@endphp

@section('content')
	<div class="container flex-fill">
		<div class="row bg-white shadow">
			<div class="col-md-6">
				<strong> Adauga o lege </strong>
				@form ([ 'action'=>route('legislation.store') ])
					@foreach ( $inputs as $attrs )
						@formGroup($attrs)
						@endformGroup
					@endforeach
					@formSubmit(['class'=>'btn-primary'])
						Adauga lege
					@endformSubmit
				@endform
			</div>
			
			<div class="col-md-6">
				<strong> Editeaza o lege </strong>
				@foreach ($laws as $law)
				<div class="position-relative">
					@form ([ 'action'=>route('legislation.update', ['legislation'=>$law->id]) ])
						@method('put')
						@foreach ( $inputs as $input )
							@formGroup(array_merge($input, [
								'id' => $input['name'].$law->id,
								'value' => $law[ $input['name'] ]
							]))
							@endformGroup
						@endforeach
						@formSubmit(['class'=>'btn-success'])
							Actualizeaza lege
						@endformSubmit
					@endform
					@form ([ 'action'=>route('legislation.destroy', ['legislation'=>$law->id]) ])
						@method('delete')
						@formSubmit(['class'=>'btn-danger position-absolute right-0 bottom-0'])
							Sterge lege
						@endformSubmit
					@endform
				</div>
				<hr>
				@endforeach
			</div>
		</div>
	</div>
@endsection