@extends('layouts.master')

@section('content')
	
<div class="login-container Card">

	<div class="Card-title">

		<div class="yv-logo"><img src="{{ asset('img/yv-logo-blue.png') }}"></div>

	</div>

	<div class="Card-content">

		{{ Form::open(['route' => 'login.post', 'class' => 'Form']) }}

			<div class="Form-group">

				<label for="location">Choose location</label>
				<div class="Form-select">
					{{ Form::select('location', $locationsSelect, '', ['id' => 'location']) }}
				</div>

			</div>

			<div class="Form-group">

				<label for="password">Password</label>
				{{ Form::password('password', ['class' => 'password', 'placeholder' => 'Password']) }}

			</div>
	
			{{ Form::submit('Log In', ['class' => 'button submit-button']) }}

		{{ Form::close() }}

	</div>
	
</div>

@stop