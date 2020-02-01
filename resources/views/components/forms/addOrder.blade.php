<form action="{{ route('orders.store') }}" method="post" enctype="multipart/form-data" class="needs-validation">
	@csrf
	<div class="form-group">
		<label for="validationTooltip01"> Companie </label>
		<input name="company" type="text" class="form-control" id="validationTooltip01" required>
		<div class="valid-tooltip">
			Looks good!
		</div>
	</div>
	<div class="form-group">
		<label for="validationTooltip01"> Nume si prenume </label>
		<input name="name" type="text" class="form-control" id="validationTooltip01" required>
		<div class="valid-tooltip">
			Looks good!
		</div>
	</div>
	<div class="form-group">
		<label for="validationTooltip01"> Adresa de email </label>
		<input name="email" type="email" class="form-control" id="validationTooltip01" required>
		<div class="valid-tooltip">
			Looks good!
		</div>
	</div>
	<div class="form-group">
		<label for="validationTooltip01"> Numar de telefon </label>
		<input name="phone" type="text" class="form-control" id="validationTooltip01" required>
		<div class="valid-tooltip">
			Looks good!
		</div>
	</div>
	<div class="form-group">
		<label for="validationTooltip01"> Adresa de colectare </label>
		<input name="adress" type="text" class="form-control" id="validationTooltip01" placeholder="Tara, judet, localitate, strada, numar..." required>
		<div class="valid-tooltip">
			Looks good!
		</div>
	</div>
	<div class="form-group">
		<label for="validationTooltip01"> Detalii despre deseuri </label>
		<textarea name="details" class="form-control" id="validationTooltip01" placeholder="greutate, cantitate, volum..." required></textarea>
		<div class="valid-tooltip">
			Looks good!
		</div>
	</div>
	<div class="custom-file mb-2">
		<input name="photos[]" multiple="multiple" type="file" class="custom-file-input" id="validatedCustomFile">
		<label class="custom-file-label" for="validatedCustomFile"> Atasati poze cu deseurile </label>
		<div class="invalid-feedback"> Example invalid custom file feedback </div>
	</div>
	<div class="form-group">
		<label for="validationTooltip01"> Disponibilitate recoltare </label>
		<input name="time" type="datetime-local" class="form-control">
		<div class="valid-tooltip">
			Looks good!
		</div>
	</div>
	
	<button class="btn btn-primary" type="submit"> Submit form </button>
</form>