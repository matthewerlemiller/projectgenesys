@extends ('layouts.master')

@section ('content')

	<div class="member-page-container" ng-controller="MemberPageController">

		<div class="member-header-container">

			<div class="member-header-info">

				<h1 class="member-profile-name">{{{ $member->NameFirst . ' ' . $member->NameLast }}}</h1>
				<div class="member-profile-image" style="background-image:url({{$member->ImagePath}})">
					@if ($memberCheckedIn)
					<div class="member-checkedin-status">
						Checked In
					</div>
					@endif
				</div>

			</div>

			<ul class="member-section-navigation">

				<li ng-click="changePage('details')" ng-class="{'member-section-selected' : details}">Details</li>
				<li ng-click="changePage('lessons')" ng-class="{'member-section-selected' : lessons}">Lessons</li>
				<li ng-click="changePage('kickout')" ng-class="{'member-section-selected' : kickout}">Kickout</li>
				<a href="{{ route('member.edit', $member->Id) }}"><li>Edit</li></a>
			</ul>

			<!-- TODO: access the LessonId field and display relevant ranking this student currently holds -->

			<div class="rank-container">

			</div>

			<div class="clear"></div>

		</div>



		<div class="member-details-container" ng-show="details">

		<div class="rule"></div>

			<h2 class="section-title">Basic Info</h2>

			<p class="text-data">Status : {{{ $member->Status or "Good" }}} </p>
			<p class="text-data">Gender : {{{ $member->Gender or 'n/a' }}} </p>
			<p class="text-data">Birthdate : {{{ $member->DateBirth or 'n/a' }}} </p>

			<div class="clear"></div>

			<p class="text-data">Phone Number : {{{ $member->NumberPhone or 'n/a'}}} </p>
			<p class="text-data">Address : {{{ $member->AddressHome or 'n/a' }}} </p>
			<p class="text-data">Email : {{{ $member->AddressEmail or 'n/a' }}} </p>

			<div class="rule"></div>

			<h2 class="section-title">Emergency Info</h2>

			<p class="text-data">Parent 1 : {{{ $member->Parent1NameFirst or 'n/a' }}} </p>
			<p class="text-data">Parent 1 Phone Number 1: {{{ $member->Parent1Phone1 or 'n/a' }}} </p>
			<p class="text-data">Parent 1 Phone Number 2: {{{ $member->Parent1Phone2 or 'n/a' }}} </p>

			<div class="clear"></div>

			<p class="text-data">Parent 2 : {{{ $member->Parent2NameFirst or 'n/a' }}} </p>
			<p class="text-data">Parent 2 Phone Number 1: {{{ $member->Parent2Phone1 or 'n/a' }}} </p>
			<p class="text-data">Parent 2 Phone Number 2: {{{ $member->Parent2Phone2 or 'n/a' }}} </p>

			<div class="clear"></div>

			<p class="text-data">Emergency Contact Name : {{{ null != $member->EmergNameFirst ? $member->EmergNameFirst . ' ' . $member->EmergNameLast : 'n/a' }}} </p>
			<p class="text-data">Emergency Contact Phone 1 : {{{ $member->EmergPhone1 or 'n/a' }}} </p>
			<p class="text-data">Emergency Contact Phone 2 : {{{ $member->EmergPhone2 or 'n/a' }}} </p>

			<div class="clear"></div>

			<p class="boolean-data">Permission Slip : {{{ null != $member->PermissionSlip ? 'yes' : 'no' }}} </p>
			<p class="boolean-data">Skatepark : {{{ null != $member->Skatepark ? 'yes' : 'no' }}} </p>

			<div class="rule"></div>

			<h2 class="section-title">Involvement</h2>

			<div class="column">

				<div class="group">

					<h3 class="subsection-title">Life Events</h3>

					<p class="boolean-data">Saved : {{{ null != $member->Saved ? 'yes' : 'no' }}} </p>
					<p class="boolean-data">Baptized : {{{ null != $member->Baptized ? 'yes' : 'no' }}} </p>
					<p class="text-data">Baptized Date : {{{ null != $member->BaptizedDate or 'n/a' }}} </p>
					<p class="text-data data-empty">School : {{{ $member->School or 'n/a' }}} </p>
					<div class="spacer"></div>

				</div>

				<div class="group">

					<h3 class="subsection-title">Ministry Info </h3>

					<p class="boolean-data">Attends High School Group : {{{ null != $member->M_HsGroup ? 'yes' : 'no' }}}</p>
					<p class="boolean-data">Attends High School Small Group : {{{ null != $member->M_HsSmGroup ? 'yes' : 'no' }}}</p>
					<p class="boolean-data">Attends Jr High Group : {{{ null != $member->M_JrGroup ? 'yes' : 'no' }}}</p>
					<p class="boolean-data">Attends Higher Ground : {{{ null != $member->M_HighGround ? 'yes' : 'no' }}}</p>
					<p class="boolean-data">In Leadership Core : {{{ null != $member->M_LeaderCore ? 'yes' : 'no' }}} </p>
					<div class="spacer"></div>

				</div>

			</div>

			<div class="column">

				<div class="group">

					<h3 class="subsection-title">Leadership Info</h3>

					<p class="boolean-data">Serves in Bus Ministry : {{{ null != $member->L_BusMinistry ? 'yes' : 'no' }}}</p>
					<p class="boolean-data">Worship Leader : {{{ null != $member->L_WorshipLead ? 'yes' : 'no' }}} </p>
					<p class="boolean-data">Serves in Kids Ministry : {{{ null != $member->L_KidsMinistry ? 'yes' : 'no' }}} </p>
					<p class="boolean-data">High School Small Group Leader : {{{ null != $member->L_HsSmGroup ? 'yes' : 'no' }}} </p>
					<p class="boolean-data">Jr High Group Leader : {{{ null != $member->L_JrGroup ? 'yes' : 'no' }}} </p>
					<p class="boolean-data">HigherGround Leader : {{{ null != $member->L_HigherGround ? 'yes' : 'no' }}} </p>
					<div class="spacer"></div>

				</div>

				<div class="group">

					<h3 class="subsection-title">Event Attendance</h3>

					<p class="boolean-data">Summer Camp : {{{ null != $member->E_SummerCamp ? 'yes' : 'no' }}} </p>
					<p class="boolean-data">Winter Camp : {{{ null != $member->E_WinterCamp ? 'yes' : 'no' }}} </p>
					<p class="boolean-data">Future Quest : {{{ null != $member->E_FutureQuest ? 'yes' : 'no' }}} </p>
					<div class="spacer"></div>

				<div/>

			<div/>

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

