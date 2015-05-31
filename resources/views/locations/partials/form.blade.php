<div class="row">
<div class="form-group col-md-6">
    <label for="name">Naam</label>
    <input type="text" name="name" value="{{ $location->name }}" class="form-control" id="name" required>
</div>
</div>
<div class="row">
<div class="col-md-6">
	<h4>Module(s)</h4>
		@foreach($educations as $education)
			<div class="checkbox">
			    <label>
			      <input name="educations[]" value="{{ $education->id }}" type="checkbox" {{ $location->educations->contains($education->id) ? 'checked' : ''}}> {{$education->name}}
			    </label>
			</div>
		@endforeach
	</div>
</div>