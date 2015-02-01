@extends ('layouts.master')

@section ('content')

	<div class="page-container" ng-controller="MemberPageController">

		<div class="member-header-container">

			<div class="member-header-info">

				<h1 class="member-profile-name">{{{ $member->NameFirst . ' ' . $member->NameLast }}}</h1>
				<div class="member-profile-image" style="background-image:url({{$member->ImagePath}})"></div>
				
				@if ($memberCheckedIn)
				<div class="member-checkedin-status">
					Checked In
				</div>
				@endif
			

			</div>

			<ul class="member-section-navigation">

				<li ng-click="changePage('details')" ng-class="{'member-section-selected' : details}">Details</li>
				<li ng-click="changePage('lessons')" ng-class="{'member-section-selected' : lessons}">Lessons</li>
				<li ng-click="changePage('kickout')" ng-class="{'member-section-selected' : kickout}">Kickout</li>
				<a href="{{ route('member.edit', $member->Id) }}"><li>Edit</li></a>
			</ul>

			<!-- TODO: access the LessonId field and display relevant ranking this student currently holds -->

			<div class="clear"></div>

		</div>

		
		
		<div class="member-details-container" ng-show="details">

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
			<p>Attends Higher Ground : {{{ null != $member->M_HighGround ? 'yes' : 'no' }}}</p>
			<p>In Leadership Core : {{{ null != $member->M_LeaderCore ? 'yes' : 'no' }}} </p>

			<h2>Leadership Info</h2>
			<p>Serves in Bus Ministry : {{{ null != $member->L_BusMinistry ? 'yes' : 'no' }}}</p>
			<p>Worship Leader : {{{ null != $member->L_WorshipLead ? 'yes' : 'no' }}} </p>
			<p>Serves in Kids Ministry : {{{ null != $member->L_KidsMinistry ? 'yes' : 'no' }}} </p>
			<p>High School Small Group Leader : {{{ null != $member->L_HsSmGroup ? 'yes' : 'no' }}} </p>
			<p>Jr High Group Leader : {{{ null != $member->L_JrGroup ? 'yes' : 'no' }}} </p>
			<p>HigherGround Leader : {{{ null != $member->L_HigherGround ? 'yes' : 'no' }}} </p>
			
			<h2>Event Attendance</h2>

			<p>Summer Camp : {{{ null != $member->E_SummerCamp ? 'yes' : 'no' }}} </p>
			<p>Winter Camp : {{{ null != $member->E_WinterCamp ? 'yes' : 'no' }}} </p>
			<p>Future Quest : {{{ null != $member->E_FutureQuest ? 'yes' : 'no' }}} </p>

			<a href="{{ route('member.edit', ['id' => $member->Id])}}">EDIT</a>

		</div>



		<div class="member-lessons-controller" ng-show="lessons">

			<table class="member-lessons-table">

				<tr>
					<th>Leader</th>
					<th>Date</th>
					<th>Lesson</th>
					<th>Notes</th>
				</tr>

				<tr ng-repeat="session in sessions" ng-init="getSessions({{ $member->Id }})">
					<td>@{{ session.leader }}</td>
					<td>@{{ session.date }}</td>
					<td>@{{ session.lesson }}</td>
					<td>@{{ session.notes }}</td>
				</tr>

			</table>

			<div>Add Lesson</div>

			<div class="member-lesson-form">

				<!-- TODO create search feature for leaders to search for themselves when adding a lesson session --> 

				<form>



				</form>

			</div>

		</div>


		<div class="member-kickout-controller" ng-show="kickout">

			<p>This is the kickout area</p>

		</div>



	</div>
	
	
	

	



@stop

