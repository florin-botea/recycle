<div class="col-md-2 p-md-0">
	@admin
	<a class="d-block w-100 py-0 btn btn-light border border-secondary rounded" href="{{route('company.create')}}" style="top:0;right:0">
		Editeaza <i class="fas fa-edit"></i>
	</a>
	@endadmin
	<div class="d-flex flex-md-wrap">
		<img class="w-1/3 md:w-100 align-self-start" src="/logo/logo.jpg">
		<div class="p-1">
			<small>
			<i class="fas fa-phone"></i>
			<strong> {{$company['phone']}} </strong>
			<br>
			<i class="far fa-envelope"></i>
			<strong> {{$company['email']}} </strong>
			<br>
			<i class="fas fa-map-marker-alt"></i>
			<strong> {{$company['adress']}} </strong>
			</small>
		</div>
	</div>
	<div class="p-1 w-100">
		{{$company['motto']}}
	</div>
</div>