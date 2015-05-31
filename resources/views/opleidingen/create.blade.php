@extends('model')

@section('modelcontent')
<h2>Opleiding aanmaken</h2>
	<form method="POST" action="{{ route('opleidingen.store') }}">
		<input type="hidden" name="_method" value="POST" />
		<input type="hidden" name="_token" id="csrf-token" value="{{ csrf_token() }}" />
		{{-- locations form  --}}
		@include('opleidingen/partials/form')
		<div class="row">
		@include('partials/backnext')
		</div>
	</form>
@endsection