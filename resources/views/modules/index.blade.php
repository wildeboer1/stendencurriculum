@extends('model')

@section('modelcontent')
<h2>Module overzicht <a style="margin-right:10px"class="pull-right btn btn-success" href="{{ route('modules.create')}}">Module toevoegen <span class="glyphicon glyphicon-plus"></span></a></h2>
<table class="table table-striped">
<thead>
<tr>
<th>Naam</th>
<th>Omschrijving</th>
<th>Module Code</th>
<th>School Periode</th>
<th>School Jaar</th>
<th>Wijzigen</th>
<th>Verwijderen</th>
</tr>
</thead>
<tbody>
	@foreach($modules as $module)
	<tr>
		<td>{{$module->name}}</td>
		<td>{{$module->description}}</td>
		<td>{{$module->module_code}}</td>
		<td>{{$module->school_period}}</td>
		<td>{{$module->school_year}}</td>
		<td>
			<a href="{{ route('modules.edit', $module->id) }}"class="btn btn-primary">
				<span class="glyphicon glyphicon-pencil"></span></a>
			</td>
		<td>
			<form method="POST" action="{{ route('modules.destroy', $module->id) }}">
				<input type="hidden" name="_method" value="DELETE" />
				<input type="hidden" name="_token" id="csrf-token" value="{{ csrf_token() }}" />
				<button type="submit" class="btn btn-danger">
					<span class="glyphicon glyphicon-minus"></span>
				</button>
			</form>
		</td>
	</tr>
	@endforeach
</tbody>
</table>
@endsection
