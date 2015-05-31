@extends('model')

@section('modelcontent')
<h2>Gebruiker Wijzigen</h2>
<form action="{{ route('gebruikers.update', $user->id) }}" method="POST">
	<input type="hidden" name="_method" value="PUT" />
	<input type="hidden" name="_token" id="csrf-token" value="{{ csrf_token() }}" />
	<div class="form-group col-md-6">
    <label for="name">Naam</label>
    <input type="text" name="name" value="{{ $user->name }}" class="form-control" id="name" required>
	</div>
	<div class="form-group col-md-6">
	    <label for="email">Email</label>
	    <input type="text" name="email" value="{{ $user->email }}"  class="form-control" id="email" disabled>
	</div>
	<div class="form-group col-md-12">
	    <label for="docent_code">Docent Code</label>
	    <input type="text" name="docent_code" value="{{ $user->docent_code }}" class="form-control" id="docent_code" required>
	</div>
	<div class="form-group col-md-6">
	    <label for="docent_code">Wachtwoord</label>
	    <input type="password" name="password"  class="form-control" id="docent_code" required>
	</div>
	<div class="form-group col-md-6">
	    <label for="docent_code">Wachtwoord opnieuw</label>
	    <input type="password" name="password_confirmation" class="form-control" id="docent_code" required>
	</div>	
	@include('partials/backnext')
</form>
@endsection
