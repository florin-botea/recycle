<button class="btn btn-with-spinner {{ $class }}" type="submit">
	<div class="spinner spinner-border spinner-border-sm text-light" role="status">
	  <span class="sr-only">Loading...</span>
	</div>
	{{ $slot }}
</button>