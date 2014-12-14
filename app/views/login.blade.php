@extends('layouts.master')

@section('content')
	
<div class="login-container">
	<div class="yv-logo"></div>
	<form method="post">
		<!-- To be populated server-side with the values from the "locations" table -->
		<select name="Select-A-Center" required>
			<option disabled>Select a Center</option>
			<option value="n-el-cajon">North El Cajon</option>
		  <option value="s-el-cajon">South El Cajon</option>
		  <option value="lakeside">Lakeside</option>
		  <option value="santee">Santee</option>
		</select>
		<div class="input-container">
			<input class="password" name="password" type="password" placeholder="Password">
			<input class="log-in-button" type="submit" value="Log In">
		</div>
	</form>
</div>

@stop