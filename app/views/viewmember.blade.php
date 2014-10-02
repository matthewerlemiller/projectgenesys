@extends ('layouts.master')

@section ('content')

	<h1 class="member-name">{{{ $member->NameFirst . ' ' . $member->NameLast }}}</h1>
	<div class="profile-image" style="background-image:url({{{ asset($member->ImagePath) }}})"></div>
	<p>Gender : {{{ $member->Gender or 'n/a' }}} </p>
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
	<p>School : {{{ $member->School or 'n/a' }}} </p>

	<h2>Ministry Info</h2>

	<p>Attends High School Group : {{{ null != $member->M_HsGroup ? 'yes' : 'no' }}}</p>
	<p>Attends High School Small Group : {{{ null != $member->M_HsSmGroup ? 'yes' : 'no' }}}</p>
	<p>Attends Jr High Group : {{{ null != $member->M_JrGroup ? 'yes' : 'no' }}}</p>
	<p>Attends High School Group : {{{ null != $member->M_HsGroup ? 'yes' : 'no' }}}</p>
	<p>Attends Higher Ground : {{{ null != $member->M_HighGround ? 'yes' : 'no' }}}</p>
	<p>Serves in Bus Ministry : {{{ null != $member->M_BusMinistry ? 'yes' : 'no' }}}</p>
	<p>Worship Leader : {{{ null != $member->M_WorshipLead ? 'yes' : 'no' }}} </p>
	<p>Serves in Kids Ministry : {{{ null != $member->M_KidsMinistry ? 'yes' : 'no' }}} </p>
	<p>Small Group Leader : {{{ null != $member->M_SmGroupLead ? 'yes' : 'no' }}} </p>
	<p>In Leadership Core : {{{ null != $member->M_LeaderCore? 'yes' : 'no' }}} </p>

	<h2>Event Attendance</h2>

	<p>Summer Camp : {{{ null != $member->E_SummerCamp ? 'yes' : 'no' }}} </p>
	<p>Winter Camp : {{{ null != $member->E_WinterCamp ? 'yes' : 'no' }}} </p>
	<p>Future Quest : {{{ null != $member->E_FutureQuest ? 'yes' : 'no' }}} </p>





	<a href="{{ route('getEditMember', ['id' => $member->id])}}">EDIT</a>





@stop

