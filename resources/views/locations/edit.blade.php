@extends('model')

@section('modelcontent')
<h2>Locatie wijzigen</h2>
<form method="POST" action="{{ route('locaties.update', $location->id) }}">
	<input type="hidden" name="_method" value="PUT" />
	<input type="hidden" name="_token" id="csrf-token" value="{{ csrf_token() }}" />
	@include('locations/partials/form')
	<div class="row">
		@include('partials/backnext')
	</div>

</form>
    
   
@endsection