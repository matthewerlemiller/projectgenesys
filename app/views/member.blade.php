@extends ('layouts.master')

@section ('content')

	<div class="member-page-container" ng-controller="MemberPageController">

		<div class="member-header-container">

			<div class="member-header-info">

				<div class="member-profile-image" style="background-image:url({{$member->ImagePath}})">
					@if ($memberCheckedIn)
						<div class="member-checkedin-status">
							Checked In
						</div>
					@endif
				</div>

				<h1 class="member-profile-name">{{{ $member->NameFirst . ' ' . $member->NameLast }}}<span class="status-tag good">Good</span></h1>
				
				<rank-tube member="member" loaded="loaded"></rank-tube>

				<ul class="member-section-navigation">

					<li ng-click="changePage('details')" ng-class="{'member-section-selected' : details}"><i class="fa fa-list"></i>Details</li>
					<li ng-click="changePage('lessons')" ng-class="{'member-section-selected' : lessons}"><i class="fa fa-star"></i>Lessons</li>
					<li ng-click="changePage('kickout')" ng-class="{'member-section-selected' : kickout}"><i class="fa fa-thumbs-down"></i>Kickout</li>
					<li><i class="fa fa-pencil"></i>Edit</li>
				</ul>

				<div class="clear"></div>

			</div>

		</div>



		<div class="member-details-container" ng-show="details">

			<div class="member-details-section">

				<p class="text-data">Status : {{{ $member->Status or "Good" }}} </p>
				<p class="text-data">Gender : {{{ $member->Gender or 'n/a' }}} </p>
				<p class="text-data">Birthdate : {{{ $member->DateBirth or 'n/a' }}} </p>

				<div class="clear"></div>

				<p class="text-data">Phone Number : {{{ $member->NumberPhone or 'n/a'}}} </p>
				<p class="text-data">Address : {{{ $member->AddressHome or 'n/a' }}} </p>
				<p class="text-data">Email : {{{ $member->AddressEmail or 'n/a' }}} </p>

			</div>

			
			<div class="member-details-section">

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

			</div>

			

			<div class="member-details-section">

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

			

		</div>

		<div class="member-lessons-container" ng-show="lessons" ng-init="memberId = {{ $member->Id }}; getSessions({{ $member->Id }})">
			<div class="table-container">
				<table class="member-lessons-table">

					<tr>
						<th>Leader</th>
						<th>Date</th>
						<th>Lesson</th>
						<th>Notes</th>
					</tr>

					<tr ng-repeat="session in sessions">
						<td>@{{ session.leader.LeaderFirstName + ' ' + session.leader.LeaderLastName }}</td>
						<td>@{{ session.date }}</td>
						<td>@{{ session.lesson.LessonName }}</td>
						<td>@{{ session.notes }}</td>
					</tr>

				</table>
			</div>

			<div class="add-lesson-container">

				<div class="title-wrap"><h1 class="section-title-white">Add Lesson</h1></div>

				<div class="rule"></div>

				<div class="member-lesson-form">


						<p><label for="leader-query">Leaders, select your name.</label></p>
					
						<p>	<select ng-options="leader.Id as leader.LeaderFirstName + ' ' + leader.LeaderLastName for leader in leaders" ng-model="leaderId"></select> </p>

						<p><label for="lesson">Choose Lesson</label></p>

						<p><select name="lesson" ng-model="lessonId">
							<option ng-repeat="lesson in lessonsArray" value="@{{lesson.Id}}">@{{ lesson.LessonName }}</option>
						</select></p>

						<p><label value="Type lesson notes here." for="notes">Notes</label></p>
						<p><textarea name="notes" ng-model="sessionNotes"></textarea></p>
						<div class="submit" ng-click="saveSession()">Submit</div>

					<form>


					</form>

				</div>
			</div>

		</div>


		<div class="member-kickout-container" ng-show="kickout">

			<div class="member-kickout-form">

				<label for="kickout-form-shift">Shift</label>
				<select name="kickout-form-shift" id="kickout-form-shift" ng-options="shift.Id as shift.Day + ' ' + shift.Time for shift in shifts" ng-model="kickoutForm.shiftId"></select>				

				<label>Leader</label>
				<select name="kickout-form-leader" id="kickout-form-leader" ng-options="leader.Id as leader.LeaderFirstName + ' ' + leader.LeaderLastName for leader in leaders" ng-model="kickoutForm.leaderId"></select>

				<label for="kickout-form-comments">Comments</label>
				<textarea name="kickout-form-comments" id="kickout-form-comments" ng-model="kickoutForm.comments"></textarea>

				<div class="button">Submit</div>

			</div>

		</div>



</div>








@stop

