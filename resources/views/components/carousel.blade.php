<div class="col-md-8">
	@admin
	<a class="d-block w-100 py-0 btn btn-light border border-secondary rounded" href="{{route('carousel.create')}}" style="top:0;right:0">
		Editeaza <i class="fas fa-edit"></i>
	</a>
	@endadmin
	<div id="myCarousel" class="carousel slide w-100" data-ride="carousel" data-interval="4000" style="padding-top:60%;">
		<div class="carousel-inner stretched">
			@foreach($photos as $i => $photo)
				<div class="carousel-item image h-100 bg-center {{$i===0 ? 'active' : ''}}" style="background-image: url({{ asset('storage/'.$photo->name) }});"></div>
			@endforeach
			<div class="square position-absolute" id="recycleButton" style="width: 60px; bottom:15px; right:15px;">
				<div class="recicle-circle-button position-absolute rounded-circle w-100 h-100 font-weight-bold cursor-pointer" style="z-index:1; top: 0px;" onclick="window.location.href='{{ route('orders.create') }}'"></div>
				<div class="recicle-circle position-absolute w-100 h-100 rounded-circle" style="background-image: url('/recycle-circle-button.png'); top: 0px;"></div>
			</div>
			<a href="{{ route('orders.create') }}" id="recycleText" style="position:absolute; right:85px; bottom:18px;"> 
				<h4 class="text-white btn btn-secondary">Recicleaza acum</h4>
			</a>
		</div>
	</div>
</div>