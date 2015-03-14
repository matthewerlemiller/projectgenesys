@extends ('layouts.master')

@section ('content')

	<div class="edit-member-wrap">

		<a class="back-to" href="/member/{{ $member->Id }}">Back to Profile</a>

		<p class="member-name"> {{{ $member->NameFirst . ' ' . $member->NameLast }}} </p>
		<a href="/member/{{ $member->Id }}">
			<div class="profile-image" style="background-image:url({{ asset($member->ImagePath) }})"></div>
		</a>

		<div class="rank-container">

		<?xml version="1.0" encoding="utf-8"?>
<!-- Generator: Adobe Illustrator 18.0.0, SVG Export Plug-In . SVG Version: 6.00 Build 0)  -->
<!DOCTYPE svg PUBLIC "-//W3C//DTD SVG 1.1//EN" "http://www.w3.org/Graphics/SVG/1.1/DTD/svg11.dtd">
<svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
	 viewBox="0 0 450 200" enable-background="new 0 0 450 200" xml:space="preserve">
<g>
	<rect x="90.2" y="93" fill="#555555" width="32.6" height="14"/>
</g>
<g>
	<rect x="208.7" y="93" fill="#FF784A" width="32.6" height="14"/>
</g>
<g>
	<rect x="328.3" y="93" fill="none" stroke="#2F4FFF" stroke-miterlimit="10" width="32.6" height="14"/>
</g>
<g>
	<circle fill="#555555" cx="47.2" cy="100" r="47.2"/>
</g>
<g>
	<circle fill="#F6784A" cx="165.7" cy="100" r="47.2"/>
</g>
<g>
	<circle fill="#2F4FFF" cx="284.3" cy="100" r="47.2"/>
</g>
<g>
	<path fill="#FFFFFF" d="M402.8,145.7c-25.2,0-45.7-20.5-45.7-45.7s20.5-45.7,45.7-45.7s45.7,20.5,45.7,45.7S428,145.7,402.8,145.7z
		"/>
	<path fill="#42CC70" d="M402.8,55.8c24.4,0,44.2,19.8,44.2,44.2s-19.8,44.2-44.2,44.2s-44.2-19.8-44.2-44.2S378.4,55.8,402.8,55.8
		 M402.8,52.8c-26.1,0-47.2,21.2-47.2,47.2s21.2,47.2,47.2,47.2c26.1,0,47.2-21.2,47.2-47.2S428.8,52.8,402.8,52.8L402.8,52.8z"/>
</g>
<g>
	<path fill="#555555" d="M414.9,112.8H412c-0.3,0-0.6-0.1-0.8-0.2c-0.2-0.2-0.4-0.4-0.5-0.6l-2.3-6H397l-2.3,6
		c-0.1,0.2-0.2,0.4-0.4,0.6c-0.2,0.2-0.5,0.3-0.8,0.3h-2.9l10.2-25.6h3.7L414.9,112.8z M398.1,103.3h9.3l-3.9-10.1
		c-0.1-0.3-0.3-0.7-0.4-1.1s-0.3-0.9-0.4-1.4c-0.1,0.5-0.3,1-0.4,1.4s-0.3,0.8-0.4,1.1L398.1,103.3z"/>
</g>
<g>
	<path fill="#FFFFFF" d="M272.2,87.2h2.9c0.3,0,0.6,0.1,0.8,0.2s0.4,0.4,0.5,0.6l7,17.6c0.2,0.4,0.3,0.9,0.5,1.4
		c0.1,0.5,0.3,1,0.4,1.6c0.1-0.5,0.2-1.1,0.4-1.6c0.1-0.5,0.3-1,0.5-1.4l7-17.6c0.1-0.2,0.2-0.4,0.4-0.6s0.5-0.3,0.8-0.3h3
		L286,112.8h-3.3L272.2,87.2z"/>
</g>
<g>
	<path fill="#FFFFFF" d="M158,103.8c0,1.4-0.2,2.7-0.5,3.8c-0.4,1.1-0.9,2.1-1.6,2.9c-0.7,0.8-1.5,1.4-2.5,1.8s-2.2,0.6-3.5,0.6
		c-1.2,0-2.4-0.2-3.7-0.5l0.2-2.2c0-0.2,0.1-0.4,0.2-0.5c0.1-0.1,0.3-0.2,0.6-0.2c0.2,0,0.5,0.1,0.8,0.2c0.4,0.1,0.8,0.2,1.4,0.2
		c0.8,0,1.4-0.1,2-0.3c0.6-0.2,1.1-0.6,1.5-1.1s0.7-1.1,0.9-1.9s0.3-1.7,0.3-2.7V87.1h3.7v16.7H158z"/>
	<path fill="#FFFFFF" d="M161,87.1h2.9c0.3,0,0.6,0.1,0.8,0.2c0.2,0.2,0.4,0.4,0.5,0.6l7,17.6c0.2,0.4,0.3,0.9,0.5,1.4
		c0.1,0.5,0.3,1,0.4,1.6c0.1-0.5,0.2-1.1,0.4-1.6c0.1-0.5,0.3-1,0.5-1.4l7-17.6c0.1-0.2,0.2-0.4,0.4-0.6s0.5-0.3,0.8-0.3h3
		l-10.4,25.6h-3.3L161,87.1z"/>
</g>
<g>
	<path fill="#FFFFFF" d="M47.3,105.2c0.1-0.3,0.3-0.7,0.4-1c0.1-0.3,0.3-0.6,0.5-1l8.5-15.5c0.2-0.3,0.3-0.5,0.5-0.5
		c0.2-0.1,0.4-0.1,0.8-0.1h2.7v25.6h-3.2V94.4c0-0.3,0-0.5,0-0.8s0-0.6,0.1-0.9L49,108.4c-0.1,0.3-0.3,0.5-0.5,0.6s-0.5,0.2-0.8,0.2
		H47c-0.6,0-1.1-0.3-1.3-0.8l-8.8-15.8c0,0.3,0,0.6,0.1,0.9c0,0.3,0,0.6,0,0.9v18.4h-3.2V87.2h2.7c0.3,0,0.6,0,0.8,0.1
		s0.4,0.2,0.5,0.5l8.7,15.5C46.7,103.9,47,104.5,47.3,105.2z"/>
</g>
</svg>


	</div>

	<div class="clear"></div>

		<div class="color-wrap">

		<h1 class="title">Edit Member Details</h1>

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


				<p class="check-box">{{ Form::checkbox('PermissionSlip') }} {{ Form::label('PermissionSlip', 'Permission Slip?') }}</p>

				<p class="check-box">{{ Form::checkbox('Baptized') }} {{ Form::label('Baptized', 'Baptized?') }}</p>

				<div class="break"></div>

				<!-- <p>{{ Form::text('BaptizedDate') }}</p> -->

				<p class="check-box">{{ Form::checkbox('Saved') }} {{ Form::label('Saved', 'Saved?') }}</p>

				<p class="check-box">{{ Form::checkbox('Skatepark') }} {{ Form::label('Skatepark', 'SkatePark?') }}</p>

				<p>{{ Form::text('School') }}</p>


				<h2 class="subsection-title">Ministry Info</h2>

				<div class="light-rule"></div>


				<p class="check-box">{{ Form::checkbox('M_HsGroup') }} {{ Form::label('M_HsGroup', 'Attends The Mission') }}</p>

				<p class="check-box">{{ Form::checkbox('M_HsSmGroup') }} {{ Form::label('M_HsSmGroup', 'Attends High School Small Group') }}</p>

				<p class="check-box">{{ Form::checkbox('M_JrGroup') }} {{ Form::label('M_JrGroup', 'Attends The Underground') }}</p>

				<p class="check-box">{{ Form::checkbox('M_HigherGround') }} {{ Form::label('M_HigherGround', 'Attends Hgher Ground') }}</p>

				<p class="check-box">{{ Form::checkbox('M_BusMinistry') }} {{ Form::label('M_BusMinistry', 'Involved in Bus Ministry') }}</p>

				<p class="check-box">{{ Form::checkbox('M_WorshipLead') }} {{ Form::label('M_WorshipLead', 'Worship Leader') }}</p>

				<p class="check-box">{{ Form::checkbox('M_KidsMinistry') }} {{ Form::label('M_KidsMinistry', 'Serves in Kids Ministry') }}</p>

				<p class="check-box">{{ Form::checkbox('M_SmGroupLead') }} {{ Form::label('M_SmGroupLead', 'Small Group Leader') }}</p>

				<p class="check-box">{{ Form::checkbox('M_LeaderCore') }} {{ Form::label('M_LeaderCore', 'Attends The Core') }}</p>

				<h2 class="subsection-title">Event Attendance</h2>

				<div class="light-rule"></div>


				<p class="check-box">{{ Form::checkbox('E_SummerCamp') }} {{ Form::label('E_SummerCamp', 'Summer Camp') }}</p>

				<p class="check-box">{{ Form::checkbox('E_WinterCamp') }} {{ Form::label('E_WinterCamp', 'Winter Camp') }}</p>

				<p class="check-box">{{ Form::checkbox('E_FutureQuest') }} {{ Form::label('E_FutureQuest', 'FutureQuest') }}</p>


				{{ Form::submit('√')}}
			{{ Form::close() }}
		</div>
	</div>




@stop
