@extends ('layouts.master')

@section ('content')
	
	{{ Form::open(array('url' => 'member/create', 'files' => true)) }}
		<p>{{ Form::text('firstname','',['placeholder' => 'First Name']) }}</p>
		<p>{{ Form::text('lastname','', ['placeholder' => 'Last Name']) }}</p>
		<p> {{ Form::file('image-upload') }} </p>
		<p>{{ Form::text('phone', '', ['placeholder' => 'Phone']) }}</p>
		<p>{{ Form::email('email', '', ['placeholder' => 'Email']) }}</p>
		<p>{{ Form::text('address', '', ['placeholder' => 'Address']) }}</p>
		<!-- <p>{{ Form::text('city', '', ['placeholder' => 'City']) }}</p> -->
		<p>{{ Form::text('parent-name-1', '', ['placeholder' => 'Parent\'s Name']) }}</p>
		<p>{{ Form::text('parent-name-2', '', ['placeholder' => 'Parent\'s Name']) }}</p>
		<p>{{ Form::text('parent-contact', '', ['placeholder' => 'Parent Number']) }}</p>
		{{ Form::submit('SAVE')}}
	{{ Form::close() }}
	
	

@stop