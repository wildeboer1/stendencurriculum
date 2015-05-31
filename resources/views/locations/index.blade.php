@extends('model')

@section('modelcontent')
<h2>Locaties overzicht <a style="margin-right:10px"class="pull-right btn btn-success" href="{{ route('locaties.create')}}">Locatie toevoegen <span class="glyphicon glyphicon-plus"></span></a></h2>
<table class="table table-striped">
<thead>
<tr>
<th>Naam</th>
<th>Wijzigen</th>
<th>Verwijderen</th>
</tr>
</thead>
<tbody>
	@foreach($locaties as $locatie)
	<tr>
		<td>{{$locatie->name}}</td>
		<td>
			<a href="{{ route('locaties.edit', $locatie->id) }}"class="btn btn-primary">
				<span class="glyphicon glyphicon-pencil"></span></a>
			</td>
		<td>
			<form method="POST" action="{{ route('locaties.destroy', $locatie->id) }}">
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
