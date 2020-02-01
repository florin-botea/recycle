<div class="{{ ($type??'text')==='file' ? 'custom-file mb-4' : 'form-group' }}">
	<label for="{{ $id ?? $name ?? '' }}" class="{{ ($type??'text')==='file' ? 'custom-file-label' : '' }}">{{ $label ?? '' }}</label>
	@if (isset($type) && $type==='textarea')
		<textarea name="{{ $name ?? '' }}" class="form-control" class="form-control {{ $class ?? '' }}" id="{{ $id ?? $name ?? '' }}"
			@foreach( ($attrs??[]) as $attr => $val)
				{{$attr}}="{{$val}}"
			@endforeach
		>{{ $value ?? '' }}</textarea>
		@else
		<input name="{{ $name ?? '' }}" type="{{ $type ?? 'text' }}" value="{{ $value ?? '' }}" class="form-control {{ $class ?? '' }}" id="{{ $id ?? $name ?? '' }}"
			@foreach( ($attrs??[]) as $attr => $val)
				{{$attr}}="{{$val}}"
			@endforeach
		>
	@endif
	@foreach ( ($helpers??[]) as $helper)
		<small>{{ $helper }}</small>
	@endforeach
	@if ( $invalid??false )
		<p class="text-danger font-weight-bold">
			{{ $invalid }}
		</p>
	@endif
</div>