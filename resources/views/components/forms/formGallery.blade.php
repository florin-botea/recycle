<p> Click pe imagini pentru a fi sterse </p>
<div>
	@foreach(($photos??[]) as $photo)
		<input class="checkbox-image" type="checkbox" name="deleted_photos[]" id="photo_{{$photo->id}}" value="{{$photo->id}}" hidden>
		<label for="photo_{{$photo->id}}" class="square-1/3 float-left">
			<div class="bg-center thumbnail stretched" role="image" style="background: url({{ asset('storage/'.$photo->name) }})"></div>
		</label>
	@endforeach
	<div class="clearfix"></div>
</div>
Sau adaugati noi poze
@formGroup ([
	'type' => 'file',
	'label' => 'Poze firma',
	'name' => 'photos[]',
	'helpers' => null,
	'attrs' => ['multiple'=>'multiple']
])
@endformGroup