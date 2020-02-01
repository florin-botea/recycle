@extends('layouts.app')

@php
	$page = 'Legislatie';
@endphp

@section('content')
	<div class="container flex-fill shadow">
		@admin
		<div class="row">
			<a class="d-block w-100 btn btn-light border border-secondary rounded" href="{{ route('legislation.create') }}" style="z-index:100;">
				Editeaza <i class="fas fa-edit"></i>
			</a>
		</div>
		@endadmin
		
		<div class="row">
			<div class="col-md-7 bg-white">
				<div class="bg-white">
					@foreach ($laws as $law)
					<div class="p-3">
						<h6><a href="{{ $law->url }}" class="text-success font-weight-bold">{{ $law->title }}</a></h6>
						<span>{{ $law->text }}</span>
					</div>
					<hr>
					@endforeach
				</div>
			</div>
			
			<div class="col-md-5 bg-white p-4">
				@gallery(['photos'=>$photos])
				@endgallery
			</div>
		</div>
	</div>
@endsection