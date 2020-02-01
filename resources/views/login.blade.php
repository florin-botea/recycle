@extends('layouts.app')

@section('content')
<div class="container flex-fill">
	<div class="row">
		<div class="col-5 mx-auto bg-white">
			<form action="/login" method="post" class="">
				@csrf
				<div class="form-group">
					<label for="username"> Username </label>
					<input name="username" type="text" class="form-control" id="username" required>
				</div>
				<div class="form-group">
					<label for="password"> Password </label>
					<input name="password" type="password" class="form-control" id="password" required>
				</div>
				<div class="form-group">
					<button type="submit" class="btn btn-primary">
						Login
					</button>
				</div>
			</form>
		</div>
	</div>
	
	@if ( $errors->any() )
		<div class="col-5 px-0 mx-auto">
			<div class="alert alert-danger" role="alert">
				{{ $errors->first() }}
			</div>
		</div>
	@endif
</div>
@endsection