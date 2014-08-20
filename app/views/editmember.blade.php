@extends ('layouts.master')

@section ('content')

<p> {{{ $member->NameFirst . ' ' . $member->NameLast }}} </p>

{{ Form::model($member, ['url' => 'member/' . $member->id . '/edit', 'files' => true, 'method' => 'PUT']) }}
	<p>{{ Form::text('NameFirst') }}</p>
	<p>{{ Form::text('NameLast') }}</p>
	<p> {{ Form::file('ImagePath') }} </p>
	<p>{{ Form::text('NumberPhone') }}</p>
	<p>{{ Form::email('AddressEmail') }}</p>
	<p>{{ Form::text('AddressHome') }}</p>
	<!-- <p>{{ Form::text('city', '', ['placeholder' => 'City']) }}</p> -->
	<p>{{ Form::text('Parent1NameFirst') }}</p>
	<p>{{ Form::text('Parent2NameFirst') }}</p>
	<p>{{ Form::text('Parent1Phone1') }}</p>
	{{ Form::submit('SAVE')}}
{{ Form::close() }}




@stop