@extends('model')

@section('modelcontent')
<h2>Locatie aanmaken</h2>
	<form method="POST" action="{{ route('locaties.store') }}">
		<input type="hidden" name="_method" value="POST" />
		<input type="hidden" name="_token" id="csrf-token" value="{{ csrf_token() }}" />
		{{-- locations form  --}}
		@include('locations/partials/form')
		<div class="row">
		@include('partials/backnext')
		</div>
	</form>
    
   
@endsection