@extends('layouts.master')

@section('content')

<div class="col-md-8">
	<h1>Sign in</h1>

	@include('layouts.formValiErrors')

	<form method="POST" action="/login">
		{{ csrf_field() }}

		<div class="form-group">
			<label for="email">Email:</label>
			<input type="email" class="form-control" name="email" id="email" required></input>
		</div>

		<div class="form-group">
			<label for="password">Password:</label>
			<input type="password" class="form-control" name="password" id="password" required></input>
		</div>

		<div class="form-group">
			<button type="submit" class="btn btn-primary">Sign in</button>
		</div>
	</form>
</div>

@endsection