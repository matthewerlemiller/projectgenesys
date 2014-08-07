@extends ('layouts.master')

@section ('content')

	<div class="form-container">

		<p><?php if (Auth::check()) { echo "Logged in";} else { echo "Not logged in.";} ;?></p>

		{{ Form::open(array('url' => 'login')) }}
			{{ Form::select('center', array('El Cajon North' => 'elcajonnorth', 'El Cajon South' => 'elcajonsouth', 'Santee' => 'santee', 'Lakeside' => 'lakeside')) }}
			<p>{{ Form::text('username') }}</p>
			<p>{{ Form::password('password') }}</p>
			<p>{{ Form::submit('Log In') }}</p>
		{{ Form::close() }}

	</div>

@stop