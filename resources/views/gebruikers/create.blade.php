@extends('model')

@section('modelcontent')
<h2>Gebruiker aanmaken</h2>
	<form method="POST" action="{{ route('gebruikers.store') }}">
		<input type="hidden" name="_method" value="POST" />
		<input type="hidden" name="_token" id="csrf-token" value="{{ csrf_token() }}" />
		@include('gebruikers/partials/form')
		@include('partials/backnext')
	</form>
    
   
@endsection