@extends('layouts.app')

@section('content')
<div class="container py-2">
	<div class="row">
		<div class="col bg-white shadow">
			@form ([ 'action'=>route('carousel.store'), 'attrs'=>['enctype'=>'multipart/form-data'] ])	
				@formGallery(['photos'=>$carousel])
				@endformGallery

				@formSubmit(['class'=>'btn-primary'])
					Update
				@endformSubmit
			@endform
		</div>
	</div>
</div>
@endsection