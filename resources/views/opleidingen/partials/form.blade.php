<div class="row">
	<div class="form-group col-md-6 ">
	    <label for="name">Naam</label>
	    <input type="text" name="name" value="{{ $education->name }}" class="form-control" id="name" required>
	</div>
</div>
<div class="row">
	<div class="col-md-6">
	<h4>Module(s)</h4>
		@foreach($modules as $module)
			<div class="checkbox">
			    <label>
			      <input name="modules[]" value="{{ $module->id }}" type="checkbox" {{ $education->modules->contains($module->id) ? 'checked' : ''}}> {{$module->module_code}}
			    </label>
			</div>
		@endforeach
	</div>
	<div class="col-md-6">
		<h4>Docent(en)</h4>
		@foreach($users as $user)
			<div class="checkbox">
			    <label>
			      <input name="users[]" value="{{ $user->id }}" type="checkbox" {{ $education->users->contains($user->id) ? 'checked' : ''}}> {{ $user->name }}
			    </label>
			</div>
		@endforeach
	</div>
</div>
