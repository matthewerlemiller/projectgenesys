@extends ('layouts.master')

@section ('content')

<div class="member-page-container" ng-controller="MemberPageController">

	<div class="member-header-container">

		<div class="member-header-info">

			<div class="member-profile-image" style="background-image:url({{$member->image}})">
				@if ($memberCheckedIn)
					<div class="member-checkedin-status">
						Checked In
					</div>
				@endif
			</div>

			<h1 class="member-profile-name">{{{ $member->firstName . ' ' . $member->lastName }}}<status-tag member="member" loaded="loaded" block="true" class="member-info-status-tag"></status-tag></h1>
			
			<rank-tube member="member" loaded="loaded"></rank-tube>

			<ul class="member-section-navigation">

				<li ng-click="changePage('details')" ng-class="{'member-section-selected' : details}"><i class="fa fa-list"></i>Details</li>
				<li ng-click="changePage('lessons')" ng-class="{'member-section-selected' : lessons}"><i class="fa fa-star"></i>Lessons</li>
				<li ng-click="changePage('kickout')" ng-class="{'member-section-selected' : kickout}"><i class="fa fa-thumbs-down"></i>Kickout</li>
				<li ng-click="changePage('edit')" ng-class="{'member-section-selected' : edit}"><i class="fa fa-pencil"></i>Edit</li>
			</ul>

			<div class="clear"></div>

		</div>

	</div>

	<div class="member-details-container" ng-show="details">

		<div class="member-details-section">

			<table style="table-layout:fixed;">
				<tr>
					<td><p class="text-data"><span class="label">Status</span> : <status-tag member="member" loaded="loaded" block="false"></status-tag> </p></td>
					<td><p class="text-data"><span class="label">Gender</span> : {{{ $member->gender or '---' }}} </p></td>
					<td><p class="text-data"><span class="label">School</span> : {{{ $member->school->name or '---' }}} </p></td>
				</tr>
				<tr>
					<td><p class="text-data"><span class="label">Phone</span> : {{{ $member->phone or '---'}}} </p></td>
					<td colspan="2"><p class="text-data"><span class="label">Address</span> : {{{ $member->address or '---' }}} </p></td>
				</tr>
				<tr>
					<td colspan="2"><p class="text-data"><span class="label">Email</span> : {{{ $member->email or '---' }}} </p></td>
					<td><p class="text-data"><span class="label">Birthdate</span> : {{{ $member->birthDate or '---' }}} </p></td>
				</tr>
			</table>
			
		</div>

		<div class="member-details-section">

			<h2 class="section-title">Involvement</h2>

			<div class="column">

				<div class="group">

					<h3 class="subsection-title">Life Events</h3>

					<p class="boolean-data"><span class="label">Saved</span> : {{{ null != $member->saved ? 'yes' : 'no' }}} </p>
					<p class="boolean-data"><span class="label">Baptized</span> : {{{ null != $member->baptized ? 'yes' : 'no' }}} </p>
					<p class="text-data"><span class="label">Baptized Date</span> : {{{ null != $member->baptizedDate or '---' }}} </p>
					<div class="spacer"></div>
					<div class="spacer"></div>

				</div>

				<div class="group">

					<h3 class="subsection-title">Ministry Info </h3>

					<p class="boolean-data"><span class="label">Attends High School Group</span> : {{{ null != $member->attendsHighSchoolGroup ? 'yes' : 'no' }}}</p>
					<p class="boolean-data"><span class="label">Attends High School Small Group</span> : {{{ null != $member->attendsHighSchoolSmallGroup ? 'yes' : 'no' }}}</p>
					<p class="boolean-data"><span class="label">Attends Jr High Group</span> : {{{ null != $member->attendsJrHighGroup ? 'yes' : 'no' }}}</p>
					<p class="boolean-data"><span class="label">Attends Higher Ground</span> : {{{ null != $member->attendsHigherGround ? 'yes' : 'no' }}}</p>
					<p class="boolean-data"><span class="label">In Leadership Core</span> : {{{ null != $member->attendsLeadershipCore ? 'yes' : 'no' }}} </p>
					<div class="spacer"></div>

				</div>

			</div>

			<div class="column">

				<div class="group">

					<h3 class="subsection-title">Leadership Info</h3>

					<p class="boolean-data"><span class="label">Serves in Bus Ministry</span> : {{{ null != $member->leadsBusMinistry ? 'yes' : 'no' }}}</p>
					<p class="boolean-data"><span class="label">Worship Leader</span> : {{{ null != $member->leadsWorship ? 'yes' : 'no' }}} </p>
					<p class="boolean-data"><span class="label">Serves in Kids Ministry</span> : {{{ null != $member->leadsKidsMinistry ? 'yes' : 'no' }}} </p>
					<p class="boolean-data"><span class="label">High School Small Group Leader</span> : {{{ null != $member->leadsHighSchoolSmallGroup ? 'yes' : 'no' }}} </p>
					<p class="boolean-data"><span class="label">Jr High Group Leader</span> : {{{ null != $member->leadsJrHighGroup ? 'yes' : 'no' }}} </p>
					<p class="boolean-data"><span class="label">HigherGround Leader</span> : {{{ null != $member->leadsHigherGround ? 'yes' : 'no' }}} </p>
					<div class="spacer"></div>

				</div>

				<div class="group">

					<h3 class="subsection-title">Event Attendance</h3>

					<p class="boolean-data"><span class="label">Summer Camp</span> : {{{ null != $member->attendsSummerCamp ? 'yes' : 'no' }}} </p>
					<p class="boolean-data"><span class="label">Winter Camp</span> : {{{ null != $member->attendsWinterCamp ? 'yes' : 'no' }}} </p>
					<p class="boolean-data"><span class="label">Future Quest</span> : {{{ null != $member->attendsFutureQuest ? 'yes' : 'no' }}} </p>
					<div class="spacer"></div>

				</div>

			</div>

		</div>
		
		<div class="member-details-section">

			<h2 class="section-title">Emergency Info</h2>

			<table>
				<tr>
					<td><p class="text-data"><span class="label">Parent</span> : {{{ $member->parent1Name or '---' }}} </p></td>
					<td><p class="text-data"><span class="label">Phone</span>: {{{ $member->parent1Phone or '---' }}} </p></td>
					{{-- <td><p class="text-data"><span class="label">Alternate Phone</span>: {{{ $member->p or '---' }}} </p></td> --}}
				</tr>
				<tr>
					<td><p class="text-data"><span class="label">Parent</span> : {{{ $member->parent2Name or '---' }}} </p></td>
					<td><p class="text-data"><span class="label">Phone</span>: {{{ $member->parent2Phone or '---' }}} </p></td>
					{{-- <td><p class="text-data"><span class="label">Alternate Phone</span>: {{{ $member->Parent2Phone2 or '---' }}} </p></td> --}}
				</tr>
				<tr>
					<td><p class="text-data"><span class="label">Emergency Contact</span> : {{{ null != $member->emergencyContactName ? $member->emergencyContactName : '---' }}} </p></td>
					<td><p class="text-data"><span class="label">Phone</span> : {{{ $member->emergencyContactPhone or '---' }}} </p></td>
					{{-- <td><p class="text-data"><span class="label">Alternate Phone</span> : {{{ $member->emergencyContactPhone or '---' }}} </p></td> --}}
				</tr>
				<tr>
					<td><p class="boolean-data"><span class="label">Permission Slip</span> : {{{ null != $member->permissionSlip ? 'yes' : 'no' }}} </p></td>
					<td><p class="boolean-data"><span class="label">Skatepark</span> : {{{ null != $member->skatepark ? 'yes' : 'no' }}} </p></td>
				</tr>
			</table>

		</div>

	</div>

	<div class="member-lessons-container" ng-show="lessons" ng-init="memberId = {{ $member->id }}; getSessions({{ $member->id }})">
		<div class="table-container">
			<table class="member-lessons-table">

				<tr>
					<th>Leader</th>
					<th>Date</th>
					<th>Lesson</th>
					<th>Notes</th>
				</tr>

				<tr ng-repeat="session in sessions">
					<td>@{{ session.leader.firstName + ' ' + session.leader.lastName }}</td>
					<td>@{{ session.date }}</td>
					<td>@{{ session.lesson.name }}</td>
					<td>@{{ session.comments }}</td>
				</tr>

			</table>
		</div>

		<div class="add-lesson-container">

			<div class="title-wrap"><h1 class="section-title-white">Add Lesson</h1></div>

			<div class="rule"></div>

			<div class="member-lesson-form">

				<form>

					<p><label for="leader-query">Leaders, select your name.</label></p>
					
					<p>	<select ng-options="leader.id as leader.firstName + ' ' + leader.lastName for leader in leaders" ng-model="leaderId"></select> </p>

					<p><label for="lesson">Choose Lesson</label></p>

					<p><select name="lesson" ng-model="lessonId">
						<option ng-repeat="lesson in lessonsArray" value="@{{lesson.id}}">@{{ lesson.name }}</option>
					</select></p>

					<p><label value="Type lesson notes here." for="notes">Notes</label></p>
					<p><textarea name="notes" ng-model="sessionNotes"></textarea></p>
					<div class="submit" ng-click="saveSession()">Submit</div>

				</form>

			</div>
		</div>

	</div>


	<div class="member-kickout-container" ng-show="kickout">

		<div class="member-kickout-form">

			<div class="member-kickout-form-select">
				<label for="kickout-form-shift">Shift</label>
				<select name="kickout-form-shift" id="kickout-form-shift" ng-options="shift.id as shift.day + ' ' + shift.time for shift in shifts" ng-model="kickoutForm.shiftId" required></select>				
			</div>
			
			<div class="member-kickout-form-select">
				<label>Leader</label>
				<select name="kickout-form-leader" id="kickout-form-leader" ng-options="leader.id as leader.firstName + ' ' + leader.lastName for leader in leaders" ng-model="kickoutForm.leaderId" required></select>
			</div>

			

			<div class="clear"></div>

			<label for="kickout-form-comments">Comments</label>
			<textarea name="kickout-form-comments" id="kickout-form-comments" ng-model="kickoutForm.comments" required></textarea>

			<div class="button submit" ng-click="createKickout()">Submit</div>

		</div>

	</div>

	<div class="member-edit-container Form" ng-show="edit">
	
		<table>
			<tr>
				<td><label>Gender</label></td>
				<td><input type="radio" ng-model="member.gender" value="Male"> Male</td>
				<td><input type="radio" ng-model="member.gender" value="Female"> Female</td>
			</tr>
			<tr>
				<td><label>B-day</label></td>
				<td colspan="2"><input type="date" ng-model="member.birthDate"></td>
			</tr>
			<tr>
				<td><label>School</label></td>
				<td colspan="2"><select ng-options="school.id as school.name for school in schools" ng-model="member.schoolId"></td>
			</tr>
			<tr>
				<td><label>Address</label></td>
				<td colspan="2"><input type="text" ng-model="member.address"></td>
			</tr>	
			<tr>
				<td><label>Saved?</label></td>
				<td><input type="radio" ng-model="member.saved" ng-value="true"> Yes</td>
				<td><input type="radio" ng-model="member.saved" ng-value="false"> No</td>
			</tr>
			<tr>
				<td><label>Baptized?</label></td>
				<td><input type="radio" ng-model="member.baptized" ng-value="true"> Yes</td>
				<td><input type="radio" ng-model="member.baptized" ng-value="false"> No</td>
			</tr>
			<tr>
				<td><label>Attends High School Group?</label></td>
				<td><input type="radio" ng-model="member.attendsHighSchoolGroup" ng-value="true"> Yes</td>
				<td><input type="radio" ng-model="member.attendsHighSchoolGroup" ng-value="false"> No</td>
			</tr>
			<tr>
				<td><label>Attends High School Small Group?</label></td>
				<td><input type="radio" ng-model="member.attendsHighSchoolSmallGroup" ng-value="true"> Yes</td>
				<td><input type="radio" ng-model="member.attendsHighSchoolSmallGroup" ng-value="false"> No</td>
			</tr>
			<tr>
				<td><label>Attends Jr High Group?</label></td>
				<td><input type="radio" ng-model="member.attendsJrHighGroup" ng-value="true"> Yes</td>
				<td><input type="radio" ng-model="member.attendsJrHighGroup" ng-value="false"> No</td>
			</tr>
			<tr>
				<td><label>Attends Higher Ground?</label></td>
				<td><input type="radio" ng-model="member.attendsHigherGround" ng-value="true"> Yes</td>
				<td><input type="radio" ng-model="member.attendsHigherGround" ng-value="false"> No</td>
			</tr>
			<tr>
				<td><label>Attends Leadership Core?</label></td>
				<td><input type="radio" ng-model="member.attendsLeadershipCore" ng-value="true"> Yes</td>
				<td><input type="radio" ng-model="member.attendsLeadershipCore" ng-value="false"> No</td>
			</tr>
			<tr>
				<td><label>Serves in Bus Ministry?</label></td>
				<td><input type="radio" ng-model="member.leadsBusMinistry" ng-value="true"> Yes</td>
				<td><input type="radio" ng-model="member.leadsBusMinistry" ng-value="false"> No</td>
			</tr>
			<tr>
				<td><label>Serves in Kids Ministry?</label></td>
				<td><input type="radio" ng-model="member.leadsKidsMinistry" ng-value="true"> Yes</td>
				<td><input type="radio" ng-model="member.leadsKidsMinistry" ng-value="false"> No</td>
			</tr>
			<tr>
				<td><label>Is High School Small Group Leader?</label></td>
				<td><input type="radio" ng-model="member.leadsHighSchoolSmallGroup" ng-value="true"> Yes</td>
				<td><input type="radio" ng-model="member.leadsHighSchoolSmallGroup" ng-value="false"> No</td>
			</tr>
			<tr>
				<td><label>Is Jr. High Group Leader?</label></td>
				<td><input type="radio" ng-model="member.leadsJrHighGroup" ng-value="true"> Yes</td>
				<td><input type="radio" ng-model="member.leadsJrHighGroup" ng-value="false"> No</td>
			</tr>
			<tr>
				<td><label>Is Higher Ground Leader?</label></td>
				<td><input type="radio" ng-model="member.leadsHighSchoolSmallGroup" ng-value="true"> Yes</td>
				<td><input type="radio" ng-model="member.leadsHighSchoolSmallGroup" ng-value="false"> No</td>
			</tr>
			<tr>
				<td><label>Leads Worship?</label></td>
				<td><input type="radio" ng-model="member.leadsWorship" ng-value="true"> Yes</td>
				<td><input type="radio" ng-model="member.leadsWorship" ng-value="false"> No</td>
			</tr>
			<tr>
				<td><label>Attended Summer Camp?</label></td>
				<td><input type="radio" ng-model="member.attendsSummerCamp" ng-value="true"> Yes</td>
				<td><input type="radio" ng-model="member.attendsSummerCamp" ng-value="false"> No</td>
			</tr>
			<tr>
				<td><label>Attended Winter Camp?</label></td>
				<td><input type="radio" ng-model="member.attendsWinterCamp" ng-value="true"> Yes</td>
				<td><input type="radio" ng-model="member.attendsWinterCamp" ng-value="false"> No</td>
			</tr>
			<tr>
				<td><label>Attended Future Quest?</label></td>
				<td><input type="radio" ng-model="member.attendsFutureQuest" ng-value="true"> Yes</td>
				<td><input type="radio" ng-model="member.attendsFutureQuest" ng-value="false"> No</td>
			</tr>
			<tr>
				<td><label>Permission Slip?</label></td>
				<td><input type="radio" ng-model="member.permissionSlip" ng-value="true"> Yes</td>
				<td><input type="radio" ng-model="member.permissionSlip" ng-value="false"> No</td>
			</tr>
			<tr>
				<td><label>Allowed in Skatepark?</label></td>
				<td><input type="radio" ng-model="member.skatepark" ng-value="true"> Yes</td>
				<td><input type="radio" ng-model="member.skatepark" ng-value="false"> No</td>
			</tr>
			<tr>
				<td><label>Parent Name</label></td>
				<td colspan="2"><input type="text" ng-model="member.parent1Name"></td>
			</tr>
			<tr>
				<td><label>Parent Phone</label></td>
				<td colspan="2"><input type="text" ng-model="member.parent1Phone"></td>
			</tr>
			<tr>
				<td><label>Parent Name</label></td>
				<td colspan="2"><input type="text" ng-model="member.parent2Name"></td>
			</tr>
			<tr>
				<td><label>Parent Phone</label></td>
				<td colspan="2"><input type="text" ng-model="member.parent2Phone"></td>
			</tr>
			<tr>
				<td><label>Emergency Contact</label></td>
				<td colspan="2"><input type="text" ng-model="member.emergencyContactName"></td>
			</tr>
			<tr>
				<td><label>Emergency Contact Phone</label></td>
				<td colspan="2"><input type="text" ng-model="member.emergencyContactPhone"></td>
			</tr>

		</table>

		<div class="button submit Form-submit" ng-click="updateMember()">Update</div>		

	</div>

</div>








@stop

