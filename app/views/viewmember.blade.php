@extends ('layouts.master')

@section ('content')

	<h1 class="member-name">{{{ $member->NameFirst . ' ' . $member->NameLast }}}</h1>

	<p>Birthdate : {{{ $member->DateBirth or 'n/a' }}} </p>
	<p>Phone Number : {{{ $member->NumberPhone or 'n/a'}}} </p>
	<p>Email : {{{ $member->AddressEmail or 'n/a' }}} </p>
	<p>Address : {{{ $member->AddressHome or 'n/a' }}} </p>
		
	<p>Parent 1 : {{{ $member->Parent1NameFirst or 'n/a' }}} </p>
	<p>Parent 2 : {{{ $member->Parent2NameFirst or 'n/a' }}} </p>




@stop