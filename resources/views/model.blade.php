
@extends('app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
				@if (Session::has('message'))
					<div class="alert alert-success">
						<div class="">
							<p>{{ Session::get('message') }}</p>
						</div>
					</div>
				@endif
				@if ($errors->any())
						<div class='flash alert-danger'>
							@foreach ( $errors->all() as $error )
								<p>{{ $error }}</p>
							@endforeach
						</div>
				@endif
				@yield('modelcontent')
		</div>
	</div>
</div>
@endsection
