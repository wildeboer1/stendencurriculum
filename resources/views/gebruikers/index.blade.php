@extends('model')

@section('modelcontent')
<h2>Gebruikers overzicht <a style="margin-right:10px"class="pull-right btn btn-success" href="{{ route('gebruikers.create')}}">Gebruiker toevoegen <span class="glyphicon glyphicon-plus"></span></a></h2>
<table class="table table-striped">
<thead>
<tr>
<th>Naam</th(>
<th>Email</th>
<th>Docent Code</th>
<th>Wijzigen</th>
<th>Verwijderen</th>
</tr>
</thead>
<tbody>
	@foreach($users as $user)
	<tr>
		<td>{{$user->name}}</td>
		<td>{{$user->email}}</td>
		<td>{{$user->docent_code}}</td>
		<td>
			<a href="{{ route('gebruikers.edit', $user->id) }}"class="btn btn-primary">
				<span class="glyphicon glyphicon-pencil"></span></a>
			</td>
		<td>
			<form method="POST" action="{{ route('gebruikers.destroy', $user->id) }}">
				<input type="hidden" name="_method" value="DELETE" />
				<input type="hidden" name="_token" id="csrf-token" value="{{ csrf_token() }}" />
				<button type="submit" class="btn btn-danger" {{ Auth::user()->id == $user->id ? 'disabled' : ''}}>
					<span class="glyphicon glyphicon-minus"></span>
				</button>
			</form>
		</td>
	</tr>
	@endforeach
</tbody>
</table>
@endsection
