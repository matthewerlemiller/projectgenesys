@extends('layouts.master')

@section('content')
	
<div class="login-container">

	<div class="yv-logo"></div>
	
	{{ Form::open(['route' => 'login.post']) }}

		{{ Form::select('location', $locationsSelect) }}

		{{ var_dump($locationsSelect) }}

		<div class="input-container">

			{{ Form::password('password', ['class' => 'password', 'placeholder' => 'Password']) }}
			{{ Form::submit('Log In', ['class' => 'log-in-button']) }}

		</div>

	{{ Form::close() }}
	
</div>

@stop