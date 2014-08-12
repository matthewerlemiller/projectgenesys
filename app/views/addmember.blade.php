@extends ('layouts.master')

@section ('content')
	{{ Form::open(array('url' => 'addmember')) }}
		<p>{{ Form::text('firstname', 'First Name') }}</p>
		<p>{{ Form::text('lastname', 'Last name') }}</p>
		<p>{{ Form::text('phone', 'Phone Number') }}</p>
		<p>{{ Form::email('email', 'Email Address') }}</p>
		<p>{{ Form::text('address', 'Address') }}</p>
		<p>{{ Form::text('parent-name-1', 'Parent Name') }}</p>
		<p>{{ Form::text('parent-name-2', 'Parent Name') }}</p>
		<p>{{ Form::text('parent-contact', 'Parent Phone') }}</p>
		{{ Form::submit('SAVE')}}
	{{ Form::close() }}

@stop