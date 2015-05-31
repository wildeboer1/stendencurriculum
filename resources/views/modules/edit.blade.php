@extends('model')

@section('modelcontent')
<h2>Module Wijzigen</h2>
	<form method="POST" action="{{ route('modules.update', $module->id) }}">
		<input type="hidden" name="_method" value="PUT" />
		<input type="hidden" name="_token" id="csrf-token" value="{{ csrf_token() }}" />
		@include('modules/partials/form')
		@include('partials/backnext')
	</form>
    
   
@endsection