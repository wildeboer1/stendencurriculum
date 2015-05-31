<div class="form-group col-md-6">
    <label for="name">Naam</label>
    <input type="text" name="name" value="{{$module->name}}" class="form-control" id="name" required>
</div>
<div class="form-group col-md-6">
    <label for="name">Omschrijving</label>
    <input type="text" name="description"  value="{{$module->description}}" class="form-control" id="name" required>
</div>
<div class="form-group col-md-6">
    <label for="name">School Periode</label>
    <select name="school_period" class="form-control">
	    @for ($i = 1; $i < 5; $i++)
	    	<option {{ $module->school_period == $i ? 'selected' : '' }}>{{$i}}</option>
		@endfor
     </select>
</div>
<div class="form-group col-md-6">
    <label for="name">School Jaar</label>
    <select name="school_year" class="form-control">
	    @for ($i = 1; $i < 5; $i++)
	    	<option {{ $module->school_year == $i ? 'selected' : '' }}>{{$i}}</option>
		@endfor
     </select>
</div>
<div class="form-group col-md-6">
    <label for="name">Module Code</label>
    <input type="text" name="module_code" value="{{$module->module_code}}"  class="form-control" id="name" required>
</div>