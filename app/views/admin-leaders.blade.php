@extends('layouts.master')

@section('content')

<div class="main-wrapper admin-page" ng-controller="AdminLeadersController">
	<div class="Card">
		<div class="Card-title">New Leader</div>
		<div class="Card-content Form">
			<div class="Form-group Form-group--half Form-group--withPadding">
				<label>First Name</label>
				<input type="text" class="Input" placeholder="First Name" ng-model="newLeader.firstName" required>
			</div>
			<div class="Form-group Form-group--half">
				<label>Last Name</label>
				<input type="text" class="Input" placeholder="Last Name" ng-model="newLeader.lastName" required>
			</div>	
			<div class="Form-group">
				<label>Email</label>
				<input type="text" class="Input" placeholder="Email" ng-model="newLeader.email">
			</div>
			<div class="Form-group">
				<label>Select Location(s)</label>
				<span ng-repeat="location in locations" class="margin-right">
					<input type="checkbox" ng-change="changeLocationAssignment($index)" ng-model="location.isChecked">@{{ location.name }}	
				</span>
			</div>
			<div class="Button Button--success" ng-click="createLeader()">Create Leader</div>
			<div class="Button Button--neutral" ng-click="clearLeader()">Clear</div>
		</div>
	</div>
	<div class="Card">
		<div class="Card-title">Leaders</div>
		<table class="Table">
			<tr>
				<th>Name</th>
				<th>Assigned Locations</th>
			</tr>
			<tr ng-repeat="leader in leaders | orderBy: '+firstName'">
				<td>@{{ leader.firstName + ' ' + leader.lastName }}</td>
				<td>
					<div class="ActionTag ActionTag--warning" ng-repeat="location in leader.locations">
						<span class="ActionTag-content">@{{ location.name }}</span>
						<span class="ActionTag-button" ng-click="unassignFromLocation(leader, location.id)"><i class="fa fa-close"></i></span>
					</div>
					<div class="ActionTag ActionTag--success" ng-click="openLocationAssignmentModal(leader)">
						<span class="ActionTag-content">Assign</span>
						<span class="ActionTag-button"><i class="fa fa-plus"></i></span>
					</div>
				</td>
			</tr>
		</table>
	</div>
</div>



@stop