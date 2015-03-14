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
				<?xml version="1.0" encoding="utf-8"?><!-- Generator: Adobe Illustrator 18.0.0, SVG Export Plug-In . SVG Version: 6.00 Build 0)  --><!DOCTYPE svg PUBLIC "-//W3C//DTD SVG 1.1//EN" "http://www.w3.org/Graphics/SVG/1.1/DTD/svg11.dtd"><svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 450 200" enable-background="new 0 0 450 200" xml:space="preserve"><g><rect x="90.2" y="93" fill="#555555" width="32.6" height="14"/></g><g><rect x="208.7" y="93" fill="#FF784A" width="32.6" height="14"/></g><g><rect x="328.3" y="93" fill="none" stroke="#2F4FFF" stroke-miterlimit="10" width="32.6" height="14"/></g><g><circle fill="#555555" cx="47.2" cy="100" r="47.2"/></g><g><circle fill="#F6784A" cx="165.7" cy="100" r="47.2"/></g><g><circle fill="#2F4FFF" cx="284.3" cy="100" r="47.2"/></g><g><path fill="#FFFFFF" d="M402.8,145.7c-25.2,0-45.7-20.5-45.7-45.7c0-25.2,20.5-45.7,45.7-45.7c25.2,0,45.7,20.5,45.7,45.7C448.5,125.2,428,145.7,402.8,145.7z"/><path fill="#42CC70" d="M402.8,55.8c24.4,0,44.2,19.8,44.2,44.2s-19.8,44.2-44.2,44.2s-44.2-19.8-44.2-44.2S378.4,55.8,402.8,55.8 M402.8,52.8c-26.1,0-47.2,21.2-47.2,47.2s21.2,47.2,47.2,47.2c26.1,0,47.2-21.2,47.2-47.2S428.8,52.8,402.8,52.8L402.8,52.8z"/></g><g><path fill="#FFFFFF" d="M158.5,103.5c0,1.3-0.2,2.5-0.5,3.5c-0.3,1-0.8,1.9-1.4,2.6c-0.6,0.7-1.4,1.3-2.3,1.7c-0.9,0.4-2,0.6-3.2,0.6c-1.1,0-2.2-0.2-3.3-0.5c0-0.3,0-0.6,0.1-0.9c0-0.3,0.1-0.6,0.1-0.9c0-0.2,0.1-0.3,0.2-0.5c0.1-0.1,0.3-0.2,0.5-0.2c0.2,0,0.5,0,0.8,0.1s0.8,0.1,1.3,0.1c0.7,0,1.4-0.1,1.9-0.3c0.6-0.2,1-0.6,1.4-1c0.4-0.5,0.7-1.1,0.9-1.8c0.2-0.7,0.3-1.6,0.3-2.6V88h3.2V103.5z"/><path fill="#FFFFFF" d="M161.6,88h2.6c0.3,0,0.5,0.1,0.7,0.2c0.2,0.1,0.3,0.3,0.4,0.5l6.7,16.7c0.2,0.4,0.3,0.8,0.4,1.2c0.1,0.4,0.2,0.9,0.4,1.4c0.1-0.5,0.2-0.9,0.3-1.4c0.1-0.4,0.2-0.8,0.4-1.2l6.6-16.7c0.1-0.2,0.2-0.4,0.4-0.5c0.2-0.2,0.4-0.2,0.7-0.2h2.6l-9.6,23.6h-2.9L161.6,88z"/></g><g><path fill="#FFFFFF" d="M273.2,88.2h2.6c0.3,0,0.5,0.1,0.7,0.2c0.2,0.1,0.3,0.3,0.4,0.5l6.7,16.7c0.2,0.4,0.3,0.8,0.4,1.2c0.1,0.4,0.2,0.9,0.4,1.4c0.1-0.5,0.2-0.9,0.3-1.4c0.1-0.4,0.2-0.8,0.4-1.2l6.6-16.7c0.1-0.2,0.2-0.4,0.4-0.5c0.2-0.2,0.4-0.2,0.7-0.2h2.6l-9.6,23.6h-2.9L273.2,88.2z"/></g><g><path fill="#231F20" d="M390.6,111.8h-2.5c-0.3,0-0.5-0.1-0.7-0.2c-0.2-0.1-0.3-0.3-0.4-0.5l-2.2-5.7h-10.6l-2.2,5.7c-0.1,0.2-0.2,0.4-0.4,0.5c-0.2,0.2-0.4,0.2-0.7,0.2h-2.5l9.5-23.6h3.3L390.6,111.8z M375.1,103h8.8l-3.7-9.6c-0.2-0.6-0.5-1.3-0.7-2.2c-0.1,0.5-0.2,0.9-0.4,1.2c-0.1,0.4-0.2,0.7-0.3,1L375.1,103z"/><path fill="#231F20" d="M414.1,100c0,1.8-0.3,3.4-0.8,4.8c-0.6,1.5-1.4,2.7-2.4,3.7c-1,1-2.2,1.8-3.7,2.4c-1.4,0.6-3,0.8-4.8,0.8h-8.8V88.2h8.8c1.7,0,3.3,0.3,4.8,0.8c1.4,0.6,2.7,1.4,3.7,2.4c1,1,1.8,2.3,2.4,3.7C413.8,96.6,414.1,98.2,414.1,100z M410.8,100c0-1.5-0.2-2.7-0.6-3.9c-0.4-1.1-1-2.1-1.7-2.9s-1.6-1.4-2.6-1.8c-1-0.4-2.2-0.6-3.4-0.6h-5.6v18.5h5.6c1.3,0,2.4-0.2,3.4-0.6c1-0.4,1.9-1,2.6-1.8c0.7-0.8,1.3-1.8,1.7-2.9C410.6,102.8,410.8,101.5,410.8,100z"/><path fill="#231F20" d="M414.9,88.2h2.6c0.3,0,0.5,0.1,0.7,0.2c0.2,0.1,0.3,0.3,0.4,0.5l6.7,16.7c0.2,0.4,0.3,0.8,0.4,1.2c0.1,0.4,0.2,0.9,0.4,1.4c0.1-0.5,0.2-0.9,0.3-1.4c0.1-0.4,0.2-0.8,0.4-1.2l6.6-16.7c0.1-0.2,0.2-0.4,0.4-0.5c0.2-0.2,0.4-0.2,0.7-0.2h2.6l-9.6,23.6h-2.9L414.9,88.2z"/></g></svg>

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

				</div>

			</div>

		</div>

		<div class="member-lessons-container" ng-show="lessons" ng-controller="LessonLogController">

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


		<div class="member-kickout-container" ng-show="kickout">

			<p>This is the kickout area</p>

		</div>



	</div>








@stop

