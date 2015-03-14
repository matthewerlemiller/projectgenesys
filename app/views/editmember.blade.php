@extends ('layouts.master')

@section ('content')
<div class="edit-member-wrap">

	<a class="back-to" href="/member/{{ $member->Id }}">Back to Profile</a>

	<p class="member-name"> {{{ $member->NameFirst . ' ' . $member->NameLast }}} </p>
	<a href="/member/{{ $member->Id }}">
		<div class="profile-image" style="background-image:url({{ asset($member->ImagePath) }})"></div>
	</a>

	<div class="rank-container">
	<?xml version="1.0" encoding="utf-8"?><!-- Generator: Adobe Illustrator 18.0.0, SVG Export Plug-In . SVG Version: 6.00 Build 0)  --><!DOCTYPE svg PUBLIC "-//W3C//DTD SVG 1.1//EN" "http://www.w3.org/Graphics/SVG/1.1/DTD/svg11.dtd"><svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 450 200" enable-background="new 0 0 450 200" xml:space="preserve"><g><rect x="90.2" y="93" fill="#555555" width="32.6" height="14"/></g><g><rect x="208.7" y="93" fill="#FF784A" width="32.6" height="14"/></g><g><rect x="328.3" y="93" fill="none" stroke="#2F4FFF" stroke-miterlimit="10" width="32.6" height="14"/></g><g><circle fill="#555555" cx="47.2" cy="100" r="47.2"/></g><g><circle fill="#F6784A" cx="165.7" cy="100" r="47.2"/></g><g><circle fill="#2F4FFF" cx="284.3" cy="100" r="47.2"/></g><g><path fill="#FFFFFF" d="M402.8,145.7c-25.2,0-45.7-20.5-45.7-45.7c0-25.2,20.5-45.7,45.7-45.7c25.2,0,45.7,20.5,45.7,45.7C448.5,125.2,428,145.7,402.8,145.7z"/><path fill="#42CC70" d="M402.8,55.8c24.4,0,44.2,19.8,44.2,44.2s-19.8,44.2-44.2,44.2s-44.2-19.8-44.2-44.2S378.4,55.8,402.8,55.8 M402.8,52.8c-26.1,0-47.2,21.2-47.2,47.2s21.2,47.2,47.2,47.2c26.1,0,47.2-21.2,47.2-47.2S428.8,52.8,402.8,52.8L402.8,52.8z"/></g><g><path fill="#FFFFFF" d="M158.5,103.5c0,1.3-0.2,2.5-0.5,3.5c-0.3,1-0.8,1.9-1.4,2.6c-0.6,0.7-1.4,1.3-2.3,1.7c-0.9,0.4-2,0.6-3.2,0.6c-1.1,0-2.2-0.2-3.3-0.5c0-0.3,0-0.6,0.1-0.9c0-0.3,0.1-0.6,0.1-0.9c0-0.2,0.1-0.3,0.2-0.5c0.1-0.1,0.3-0.2,0.5-0.2c0.2,0,0.5,0,0.8,0.1s0.8,0.1,1.3,0.1c0.7,0,1.4-0.1,1.9-0.3c0.6-0.2,1-0.6,1.4-1c0.4-0.5,0.7-1.1,0.9-1.8c0.2-0.7,0.3-1.6,0.3-2.6V88h3.2V103.5z"/><path fill="#FFFFFF" d="M161.6,88h2.6c0.3,0,0.5,0.1,0.7,0.2c0.2,0.1,0.3,0.3,0.4,0.5l6.7,16.7c0.2,0.4,0.3,0.8,0.4,1.2c0.1,0.4,0.2,0.9,0.4,1.4c0.1-0.5,0.2-0.9,0.3-1.4c0.1-0.4,0.2-0.8,0.4-1.2l6.6-16.7c0.1-0.2,0.2-0.4,0.4-0.5c0.2-0.2,0.4-0.2,0.7-0.2h2.6l-9.6,23.6h-2.9L161.6,88z"/></g><g><path fill="#FFFFFF" d="M273.2,88.2h2.6c0.3,0,0.5,0.1,0.7,0.2c0.2,0.1,0.3,0.3,0.4,0.5l6.7,16.7c0.2,0.4,0.3,0.8,0.4,1.2c0.1,0.4,0.2,0.9,0.4,1.4c0.1-0.5,0.2-0.9,0.3-1.4c0.1-0.4,0.2-0.8,0.4-1.2l6.6-16.7c0.1-0.2,0.2-0.4,0.4-0.5c0.2-0.2,0.4-0.2,0.7-0.2h2.6l-9.6,23.6h-2.9L273.2,88.2z"/></g><g><path fill="#231F20" d="M390.6,111.8h-2.5c-0.3,0-0.5-0.1-0.7-0.2c-0.2-0.1-0.3-0.3-0.4-0.5l-2.2-5.7h-10.6l-2.2,5.7c-0.1,0.2-0.2,0.4-0.4,0.5c-0.2,0.2-0.4,0.2-0.7,0.2h-2.5l9.5-23.6h3.3L390.6,111.8z M375.1,103h8.8l-3.7-9.6c-0.2-0.6-0.5-1.3-0.7-2.2c-0.1,0.5-0.2,0.9-0.4,1.2c-0.1,0.4-0.2,0.7-0.3,1L375.1,103z"/><path fill="#231F20" d="M414.1,100c0,1.8-0.3,3.4-0.8,4.8c-0.6,1.5-1.4,2.7-2.4,3.7c-1,1-2.2,1.8-3.7,2.4c-1.4,0.6-3,0.8-4.8,0.8h-8.8V88.2h8.8c1.7,0,3.3,0.3,4.8,0.8c1.4,0.6,2.7,1.4,3.7,2.4c1,1,1.8,2.3,2.4,3.7C413.8,96.6,414.1,98.2,414.1,100z M410.8,100c0-1.5-0.2-2.7-0.6-3.9c-0.4-1.1-1-2.1-1.7-2.9s-1.6-1.4-2.6-1.8c-1-0.4-2.2-0.6-3.4-0.6h-5.6v18.5h5.6c1.3,0,2.4-0.2,3.4-0.6c1-0.4,1.9-1,2.6-1.8c0.7-0.8,1.3-1.8,1.7-2.9C410.6,102.8,410.8,101.5,410.8,100z"/><path fill="#231F20" d="M414.9,88.2h2.6c0.3,0,0.5,0.1,0.7,0.2c0.2,0.1,0.3,0.3,0.4,0.5l6.7,16.7c0.2,0.4,0.3,0.8,0.4,1.2c0.1,0.4,0.2,0.9,0.4,1.4c0.1-0.5,0.2-0.9,0.3-1.4c0.1-0.4,0.2-0.8,0.4-1.2l6.6-16.7c0.1-0.2,0.2-0.4,0.4-0.5c0.2-0.2,0.4-0.2,0.7-0.2h2.6l-9.6,23.6h-2.9L414.9,88.2z"/></g></svg>

</div>

<div class="clear"></div>

	<div class="title-wrap"><h1 class="title">Edit Member Details</h1></div>

	<div class="color-wrap">

		{{ Form::model($member, ['route' => array('member.update', $member->Id), 'files' => true, 'method' => 'PATCH']) }}
			<label for="NameFirst">First Name</label>
			<p>{{ Form::text('NameFirst') }}</p>

			<label for="NameLast">Last Name</label>
			<p>{{ Form::text('NameLast') }}</p>

			<label for="Gender">Gender</label>
			<p>{{ Form::text('Gender') }}</p>

			<label for="ImagePath">Choose New Photo</label>
			<p> {{ Form::file('ImagePath') }} </p>
			<label for="NumberPhone">Phone</label>
			<p>{{ Form::text('NumberPhone') }}</p>
			<label for="AddressEmail">Email</label>
			<p>{{ Form::email('AddressEmail') }}</p>
			<label for="Address">Address</label>
			<p>{{ Form::text('AddressHome') }}</p>
			<!-- <p>{{ Form::text('city', '', ['placeholder' => 'City']) }}</p> -->
			<label for="Parent1NameFirst">First Parent Name</label>
			<p>{{ Form::text('Parent1NameFirst') }}</p>
			<label for="Parent2NameFirst">Second Parent Name</label>
			<p>{{ Form::text('Parent2NameFirst') }}</p>
			<label for="Parent1Phone1">First Parent Primary Phone</label>
			<p>{{ Form::text('Parent1Phone1') }}</p>
			<label for="Parent1Phone2">First Parent Secondary Phone</label>
			<p>{{ Form::text('Parent1Phone2') }}</p>
			<label for="Parent2Phone1">Second Parent Primary Phone</label>
			<p>{{ Form::text('Parent2Phone1') }}</p>
			<label for="Parent2Phone2">Second Parent Secondary Phone</label>
			<p>{{ Form::text('Parent2Phone2') }}</p>
			<label for="EmergNameFirst">Emergency Contact First Name</label>
			<p>{{ Form::text('EmergNameFirst') }}</p>
			<label for="EmergNameLast">Emergency Contact Last Name</label>
			<p>{{ Form::text('EmergNameLast') }}</p>
			<label for="EmergPhone1">Emergency Contact Primary Phone</label>
			<p>{{ Form::text('EmergPhone1') }}</p>
			<label for="EmergPhone2">Emergency Contact Secondary Phone</label>
			<p>{{ Form::text('EmergPhone2') }}</p>

			<p>{{ Form::checkbox('PermissionSlip') }} {{ Form::label('PermissionSlip', 'Permission Slip?') }}</p>

			<p>{{ Form::checkbox('Baptized') }} {{ Form::label('Baptized', 'Baptized?') }}</p>
			<label for="Gender">Gender</label>
			<p>{{ Form::text('BaptizedDate') }}</p>

			<p>{{ Form::checkbox('Saved') }} {{ Form::label('Saved', 'Saved?') }}</p>

			<p>{{ Form::checkbox('Skatepark') }} {{ Form::label('Skatepark', 'SkatePark?') }}</p>
			<label for="Gender">Gender</label>
			<p>{{ Form::text('School') }}</p>

			<h2 subl>Ministry Info</h2>


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


			{{ Form::submit('√')}}
		{{ Form::close() }}
	</div>
</div>




@stop
