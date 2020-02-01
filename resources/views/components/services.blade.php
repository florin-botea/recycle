<div class="bg-white p-3">
	<h5> Ce reciclam: </h5>
	@foreach ($services as $service)
		<strong class="text-success"> {{$service->title}} </strong>
		<span> - {{$service->text}} </span>
		<br>
	@endforeach
	<br><br>
	<h5> Modalitati de reciclare: </h5>
	@foreach ($rules as $rule)
		<strong class="text-success"> {{$rule->title}} </strong>
		<span> - {{$rule->text}} </span>
		<br>
	@endforeach
	<br>
	{{$slot}}
</div>