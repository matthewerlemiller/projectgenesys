@extends('layouts.master')

@section('content')

<div class="main-wrapper admin-page" ng-controller="AdminLeadersController">

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