@extends ('layouts.master')

@section ('content')

	<h1 class="member-name">{{{ $member->NameFirst . ' ' . $member->NameLast }}}</h1>
	<div class="profile-image" style="background-image:url({{{ asset($member->ImagePath) }}})"></div>
	<p>Status : {{{ $member->Status or "Good" }}} </p>
	<p>Birthdate : {{{ $member->DateBirth or 'n/a' }}} </p>
	<p>Phone Number : {{{ $member->NumberPhone or 'n/a'}}} </p>
	<p>Email : {{{ $member->AddressEmail or 'n/a' }}} </p>
	<p>Address : {{{ $member->AddressHome or 'n/a' }}} </p>
	<p>Parent 1 : {{{ $member->Parent1NameFirst or 'n/a' }}} </p>
	<p>Parent 2 : {{{ $member->Parent2NameFirst or 'n/a' }}} </p>
	<p>Parent 1 Phone Number 1: {{{ $member->Parent1Phone1 or 'n/a' }}} </p>
	<p>Parent 1 Phone Number 2: {{{ $member->Parent1Phone2 or 'n/a' }}} </p>
	<p>Parent 2 Phone Number 1: {{{ $member->Parent2Phone1 or 'n/a' }}} </p>
	<p>Parent 2 Phone Number 2: {{{ $member->Parent2Phone2 or 'n/a' }}} </p>
	<p>Emergency Contact Name : {{{ null != $member->EmergNameFirst ? $member->EmergNameFirst . ' ' . $member->EmergNameLast : 'n/a' }}} </p>
	<p>Emergency Contact Phone 1 : {{{ $member->EmergPhone1 or 'n/a' }}} </p>
	<p>Emergency Contact Phone 2 : {{{ $member->EmergPhone2 or 'n/a' }}} </p>
	<p>Permission Slip : {{{ null != $member->PermissionSlip ? 'yes' : 'no' }}} </p>
	<p>Baptized : {{{ null != $member->Baptized ? 'yes' : 'no' }}} </p>
	<p>Baptized Date : {{{ null != $member->BaptizedDate or 'n/a' }}} </p>
	<p>Saved : {{{ null != $member->Saved ? 'yes' : 'no' }}} </p>
	<p>Skatepark : {{{ null != $member->Skatepark ? 'yes' : 'no' }}} </p>


	<a href="{{ route('getEditMember', ['id' => $member->id])}}">EDIT</a>





@stop

