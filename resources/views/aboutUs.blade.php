@extends('layouts.app')

@php
	$page = 'Despre noi';
@endphp

@section('content')
	<div class="container shadow" style="flex: 1 1 0%;">
		<div class="row mb-4 position-relative">
			@admin
			<a class="d-block w-100 py-0 btn btn-light border border-secondary rounded" href="{{route('company.create')}}" style="top:0;right:0">
				Editeaza <i class="fas fa-edit"></i>
			</a>
			@endadmin
			<div class="col-md-8 text-justify py-2 bg-white">
				{!! $company['about'] !!}
				<div class="pdf py-2">
					<iframe class="w-100" style="height:600px" src="/storage/autorizatie-mediu.pdf">
						<!--autorizatie mediu pdf-->
					</iframe>
				</div>
			</div>
			<div class="col-md-4 bg-white" id="gallery">
				@foreach($company['photos'] as $photo)
				<div class="float-left square-1/3">
					<div role="image" class="bg-center thumbnail stretched" style="background: url({{ asset('storage/'.$photo->name) }})"></div>
					<img role="src-for-viewer-lib" src="{{ asset('storage/'.$photo->name) }}" class="stretched opacity-0 w-100 h-100">
				</div>
				@endforeach
			</div>
		</div>
	</div>
@endsection