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

			<h1 class="member-profile-name"><a href="{{ route('member.show', ['id' => $member->id]) }}">@{{ member.firstName + ' ' + member.lastName }}</a><status-tag member="member" loaded="loaded" block="true" class="member-info-status-tag"></status-tag></h1>
			
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


		
		<div class="Card member-details-section">

			<div class="Card-title">Info</div>

			<div class="Card-content">

				<table style="table-layout:fixed;">
					<tr>
						<td><p class="text-data"><span class="label">Status</span> : <status-tag member="member" loaded="loaded" block="false"></status-tag> </p></td>
						<td><p class="text-data"><span class="label">Gender</span> : @{{ member.gender }} </p></td>
						<td><p class="text-data"><span class="label">School</span> : @{{ member.school.name }} </p></td>
					</tr>
					<tr>
						<td><p class="text-data"><span class="label">Phone</span> : @{{ member.phone }} </p></td>
						<td colspan="2"><p class="text-data"><span class="label">Address</span> : @{{ member.address }} </p></td>
					</tr>
					<tr>
						<td colspan="2"><p class="text-data"><span class="label">Email</span> : @{{ member.email }} </p></td>
						<td><p class="text-data"><span class="label">Birthdate</span> : @{{ member.birthDate }} </p></td>
					</tr>
				</table>

			</div>
	
		</div>

		<div class="Card member-details-section">

			<div class="Card-title">Involvement</div>

			<div class="Card-content">

				<div class="column">

					<div class="group">

						<h3 class="subsection-title">Life Events</h3>

						<p class="boolean-data"><span class="label">Saved</span> : @{{ member.saved | yesno }} </p>
						<p class="boolean-data"><span class="label">Baptized</span> : @{{ member.baptized | yesno }} </p>
						<p class="text-data"><span class="label">Baptized Date</span> : @{{ member.baptizedDate }} </p>
						<div class="spacer"></div>
						<div class="spacer"></div>

					</div>

					<div class="group">

						<h3 class="subsection-title">Ministry</h3>

						<p class="boolean-data"><span class="label">Attends High School Group</span> : @{{ member.attendsHighSchoolGroup | yesno }}</p>
						<p class="boolean-data"><span class="label">Attends High School Small Group</span> : @{{ member.attendsHighSchoolSmallGroup | yesno }}</p>
						<p class="boolean-data"><span class="label">Attends Jr High Group</span> : @{{ member.attendsJrHighGroup | yesno }}</p>
						<p class="boolean-data"><span class="label">Attends Higher Ground</span> : @{{ member.attendsHigherGround | yesno }}</p>
						<p class="boolean-data"><span class="label">In Leadership Core</span> : @{{ member.attendsLeadershipCore | yesno }} </p>
						<div class="spacer"></div>

					</div>

				</div>

				<div class="column">

					<div class="group">

						<h3 class="subsection-title">Leadership</h3>

						<p class="boolean-data"><span class="label">Serves in Bus Ministry</span> : @{{ member.leadsBusMinistry | yesno }}</p>
						<p class="boolean-data"><span class="label">Worship Leader</span> : @{{ member.leadsWorship | yesno }} </p>
						<p class="boolean-data"><span class="label">Serves in Kids Ministry</span> : @{{ member.leadsKidsMinistry | yesno }} </p>
						<p class="boolean-data"><span class="label">High School Small Group Leader</span> : @{{ member.leadsHighSchoolSmallGroup | yesno }} </p>
						<p class="boolean-data"><span class="label">Jr High Group Leader</span> : @{{ member.leadsJrHighGroup | yesno }} </p>
						<p class="boolean-data"><span class="label">HigherGround Leader</span> : @{{ member.leadsHigherGround | yesno }} </p>
						<div class="spacer"></div>

					</div>

					<div class="group">

						<h3 class="subsection-title">Event Attendance</h3>

						<p class="boolean-data"><span class="label">Summer Camp</span> : @{{ member.attendsSummerCamp | yesno }} </p>
						<p class="boolean-data"><span class="label">Winter Camp</span> : @{{ member.attendsWinterCamp | yesno }} </p>
						<p class="boolean-data"><span class="label">Future Quest</span> : @{{ member.attendsFutureQuest | yesno }} </p>
						<div class="spacer"></div>

					</div>

				</div>

			</div>

		</div>


		<div class="Card member-details-section">

			<div class="Card-title">Emergency</div>

			<div class="Card-content">
				<table>
					<tr>
						<td><p class="text-data"><span class="label">Parent</span> : @{{ member.parent1Name }} </p></td>
						<td><p class="text-data"><span class="label">Phone</span>: @{{ member.parent1Phone }} </p></td>
						{{-- <td><p class="text-data"><span class="label">Alternate Phone</span>: {{{ $member->p or '---' }}} </p></td> --}}
					</tr>
					<tr>
						<td><p class="text-data"><span class="label">Parent</span> : @{{ member.parent2Name }} </p></td>
						<td><p class="text-data"><span class="label">Phone</span>: @{{ member.parent2Phone }} </p></td>
						{{-- <td><p class="text-data"><span class="label">Alternate Phone</span>: {{{ $member->Parent2Phone2 or '---' }}} </p></td> --}}
					</tr>
					<tr>
						<td><p class="text-data"><span class="label">Emergency Contact</span> : @{{ member.emergencyContactName }} </p></td>
						<td><p class="text-data"><span class="label">Phone</span> : @{{ member.emergencyContactPhone }} </p></td>
						{{-- <td><p class="text-data"><span class="label">Alternate Phone</span> : {{{ $member->emergencyContactPhone or '---' }}} </p></td> --}}
					</tr>
					<tr>
						<td><p class="boolean-data"><span class="label">Permission Slip</span> : @{{ member.permissionSlip | yesno }} </p></td>
						<td><p class="boolean-data"><span class="label">Skatepark</span> : @{{ member.skatepark | yesno}} </p></td>
					</tr>
				</table>

			</div>

		</div>

	</div>

	<div class="member-lessons-container" ng-show="lessons" ng-init="memberId = {{ $member->id }}; getSessions({{ $member->id }})">
		<div class="table-container">
			<table class="Table">

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

			<div class="title-wrap">
				<h1>Add Lesson</h1>
			</div>

	

			<div class="member-lesson-form">

				<form class="Form">

					<div class="Form-group">
						<label for="leader-query">Leaders, select your name.</label>				

						<div class="Form-select">
							<select ng-options="leader.id as leader.firstName + ' ' + leader.lastName for leader in leaders" ng-model="leaderId">
								<option value="">Find your name...</option>
							</select> 
						</div>	
					</div>

					<div class="Form-group">

						<label for="lesson">Choose Lesson</label>

						<div class="Form-select">

							<select name="lesson" ng-model="lessonId" ng-options="lesson.id as lesson.name for lesson in lessonsArray">
								<option value="">Choose lesson...</option>
							</select>

						</div>

					</div>						

					<div class="Form-group">

						<label value="Type lesson notes here." for="notes">Notes</label>
						<textarea name="notes" ng-model="sessionNotes" placeholder="Write a note..."></textarea>

					</div>
						
					
					
					<div class="submit-button" ng-click="saveSession()">Submit</div>

				</form>

			</div>
		</div>

	</div>


	<div class="member-kickout-container" ng-show="kickout">


		<div class="Card member-kickout-form">

			<div class="Card-title">Kickout Form</div>

			<div class="Card-content Form">

				<div class="member-kickout-form-select">

					<label for="kickout-form-shift">Shift</label>

					<div class="Form-select">

						<select name="kickout-form-shift" id="kickout-form-shift" ng-options="shift.id as shift.day + ' ' + shift.time for shift in shifts" ng-model="kickoutForm.shiftId" required>
							<option value="">Choose One...</option>
						</select>				

					</div>

					
				</div>
				
				<div class="member-kickout-form-select">
					<label>Leader</label>

					<div class="Form-select">

						<select name="kickout-form-leader" id="kickout-form-leader" ng-options="leader.id as leader.firstName + ' ' + leader.lastName for leader in leaders" ng-model="kickoutForm.leaderId" required>
							<option value="">Choose One...</option>
						</select>

					</div>

					
				</div>

				

				<div class="clear"></div>

				<label for="kickout-form-comments">Comments</label>
				<textarea name="kickout-form-comments" id="kickout-form-comments" ng-model="kickoutForm.comments" required></textarea>

				<div class="button submit-button" ng-click="createKickout()">Submit</div>

			</div>

		</div>

	</div>

	<div class="member-edit-container Form" ng-show="edit">
	
		<table class="Table">

			<tr>
				<th>Item</th>
				<th colspan="2">Edit Here</th>
			</tr>
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
				<td colspan="2">
					<div class="Form-select">
						<select ng-options="school.id as school.name for school in schools" ng-model="member.schoolId">
					</div>
				</td>
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

		<div class="button submit-button Form-submit" ng-click="updateMember()">Update</div>		

	</div>

</div>








@stop

