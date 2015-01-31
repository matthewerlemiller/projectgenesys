@extends ('layouts.master')

@section ('content')

<p> {{{ $member->NameFirst . ' ' . $member->NameLast }}} </p>

{{ Form::model($member, ['route' => array('member.update', $member->Id), 'files' => true, 'method' => 'PATCH']) }}
	<p>{{ Form::text('NameFirst') }}</p>
	<p>{{ Form::text('NameLast') }}</p>
	<p>{{ Form::text('Gender','Gender',['placeholder' => 'Gender']) }}</p>

	<div class="profile-image" style="background-image:url({{ asset($member->ImagePath) }})"></div>

	<p> {{ Form::file('ImagePath') }} </p>
	<p>{{ Form::text('NumberPhone') }}</p>
	<p>{{ Form::email('AddressEmail') }}</p>
	<p>{{ Form::text('AddressHome') }}</p>
	<!-- <p>{{ Form::text('city', '', ['placeholder' => 'City']) }}</p> -->
	<p>{{ Form::text('Parent1NameFirst') }}</p>
	<p>{{ Form::text('Parent2NameFirst') }}</p>
	<p>{{ Form::text('Parent1Phone1') }}</p>
	<p>{{ Form::text('Parent1Phone2') }}</p>
	<p>{{ Form::text('Parent2Phone1') }}</p>
	<p>{{ Form::text('Parent2Phone2') }}</p>
	<p>{{ Form::text('EmergNameFirst') }}</p>
	<p>{{ Form::text('EmergNameLast') }}</p>
	<p>{{ Form::text('EmergPhone1') }}</p>
	<p>{{ Form::text('EmergPhone2') }}</p>

	<p>{{ Form::checkbox('PermissionSlip') }} {{ Form::label('PermissionSlip', 'Permission Slip?') }}</p>
	<p>{{ Form::checkbox('Baptized') }} {{ Form::label('Baptized', 'Baptized?') }}</p>
	<p>{{ Form::text('BaptizedDate') }}</p>
	<p>{{ Form::checkbox('Saved') }} {{ Form::label('Saved', 'Saved?') }}</p>
	<p>{{ Form::checkbox('Skatepark') }} {{ Form::label('Skatepark', 'SkatePark?') }}</p>
	<p>{{ Form::text('School') }}</p>

	<h2>Ministry Info</h2>

	<p>{{ Form::checkbox('M_HsGroup') }} {{ Form::label('M_HsGroup', 'Attends The Mission') }}</p>
	<p>{{ Form::checkbox('M_HsSmGroup') }} {{ Form::label('M_HsSmGroup', 'Attends High School Small Group') }}</p>
	<p>{{ Form::checkbox('M_JrGroup') }} {{ Form::label('M_JrGroup', 'Attends The Underground') }}</p>
	<p>{{ Form::checkbox('M_HigherGround') }} {{ Form::label('M_HigherGround', 'Attends Hgher Ground') }}</p>
	<p>{{ Form::checkbox('M_BusMinistry') }} {{ Form::label('M_BusMinistry', 'Involved in Bus Ministry') }}</p>
	<p>{{ Form::checkbox('M_WorshipLead') }} {{ Form::label('M_WorshipLead', 'Worship Leader') }}</p>
	<p>{{ Form::checkbox('M_KidsMinistry') }} {{ Form::label('M_KidsMinistry', 'Serves in Kids Ministry') }}</p>
	<p>{{ Form::checkbox('M_SmGroupLead') }} {{ Form::label('M_SmGroupLead', 'Small Group Leader') }}</p>
	<p>{{ Form::checkbox('M_LeaderCore') }} {{ Form::label('M_LeaderCore', 'Attends The Core') }}</p>

	<h2>Event Attendance</h2>

	<p>{{ Form::checkbox('E_SummerCamp') }} {{ Form::label('E_SummerCamp', 'Summer Camp') }}</p>
	<p>{{ Form::checkbox('E_WinterCamp') }} {{ Form::label('E_WinterCamp', 'Winter Camp') }}</p>
	<p>{{ Form::checkbox('E_FutureQuest') }} {{ Form::label('E_FutureQuest', 'FutureQuest') }}</p>


	{{ Form::submit('SAVE')}}
{{ Form::close() }}




@stop