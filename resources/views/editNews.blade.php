@extends('layouts.app')

@php
	$inputs = [
		'url' => [
			'label' => 'Url stire',
		],
		'title' => [
			'label' => 'Titlu stire',
		],
		'text' => [
			'label' => 'Text stire',
		],
		'photo' => [
			'label' => 'Poza stire',
			'type' => 'file'
		],
	];
@endphp

@section('content')
<div class="container flex-1">
	<div class="row bg-white">
		<div class="col-md-6">
			<strong> Adauga o stire </strong>
			@form ([ 'action'=>route('news.store'), 'attrs'=>['enctype'=>'multipart/form-data'] ])
				@foreach ( $inputs as $name => $attrs )
					@formGroup([
						'name' => $name,
						'type' => $attrs['type']??'text',
						'label' => $attrs['label'],
					])
					@endformGroup
				@endforeach
				@formSubmit(['class'=>'btn-primary'])
					Adauga stire
				@endformSubmit
			@endform
		</div>
		
		<div class="col-md-6">
			<strong>Editeaza o stire</strong>
			@foreach($news as $news_item)
			<div class="position-relative">
				@form ([ 'action'=>route('news.update', ['news'=>$news_item->id]), 'attrs'=>['enctype'=>'multipart/form-data'] ])
					@method('put')
					@foreach ( $inputs as $name => $attrs )
						@formGroup([
							'name' => $name,
							'type' => $attrs['type']??'text',
							'label' => $attrs['label'],
							'id' => $name.$news_item->id,
							'value' => $news_item[$name]
						])
						@endformGroup
					@endforeach
					@formSubmit(['class'=>'btn-success'])
						Actualizeaza stire
					@endformSubmit
				@endform
				@form ([ 'action'=>route('news.destroy', ['news'=>$news_item->id]) ])
					@method('delete')
					@formSubmit(['class'=>'btn-danger position-absolute right-0 bottom-0'])
						Sterge stire
					@endformSubmit
				@endform
			</div>
			<hr>
			@endforeach
		</div>
	</div>
</div>
@endsection