<div class="d-flex flex-wrap" id="gallery">
	@foreach(($photos??[]) as $photo)
	<div class="float-left square-1/3">
		<div role="image" class="bg-center thumbnail stretched" style="background: url({{ asset('storage/'.$photo->name) }})"></div>
		<img role="src-for-viewer-lib" src="{{ asset('storage/'.$photo->name) }}" class="stretched opacity-0 w-100 h-100">
	</div>
	@endforeach
</div>