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
			<div class="table-container">
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
			</div>

			<div class="add-lesson-container">

				<div class="title-wrap"><h1 class="section-title-white">Add Lesson</h1></div>

				<div class="rule"></div>

				<div class="member-lesson-form">


						<p><label for="leader-query">Leaders, search for your name.</label></p>
						<p><input placeholder="Jeremy Miller" name="leader-query" ng-model="leaderQuery" ng-keyup="searchLeaders()"></p>

						{{-- leader query results container --}}
						<div class="leader-search-results">
							{{-- Loop through results --}}
							<div class="leader-search-result" ng-repeat="result in leaderQueryResults">

								<p>@{{ result.LeaderFirstName + ' ' + result.LeaderLastName }}</p>
								<div ng-click="setLeader(result.Id)">Select</div>

							</div>

						</div>

						<p><label for="lesson">Choose Lesson</label></p>
						<p><select name="lesson" ng-model="lessonId">
							<option value='' disabled selected style='display:none;'>Tap to Choose</option>
							<option value="JV1">Junior Varsity 1</option>
							<option value="JV2">Junior Varsity 2</option>
							<option value="JV3">Junior Varsity 3</option>
							<option value="V1">Varsity 1</option>
							<option value="V2">Varsity 2</option>
							<option value="V3">Varsity 3</option>
							<option value="V4">Varsity 4</option>
							<option value="A1">Advanced 1</option>
							<option value="A2">Advanced 2</option>
							<option value="A3">Advanced 3</option>
							<!-- <option ng-repeat="lesson in lessonsArray" value="@{{lesson.Id}}">@{{ lesson.LessonName }}</option> -->
						</select></p>

						<p><label value="Type lesson notes here." for="notes">Notes</label></p>
						<p><textarea name="notes" ng-model="sessionNotes"></textarea></p>
						<div class="submit" ng-click="saveSession()">Submit</div>

					<!-- TODO create search feature for leaders to search for themselves when adding a lesson session -->

					<form>



					</form>

				</div>
			</div>

		</div>


		<div class="member-kickout-container" ng-show="kickout">

			<!-- <p>This is the kickout area</p> -->

		</div>



</div>








@stop

