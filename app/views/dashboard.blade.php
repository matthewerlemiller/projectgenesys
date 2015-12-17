@extends('layouts.master')

@section('content')

	<div class="main-wrapper">
		<div class="add-new-button">
			<a href="{{ route('member.create') }}" class="create-new"><i class="fa fa-plus"></i></a>
		</div>

		<div class="spacer"></div>

		<div class="Card results-wrapper" ng-controller="DashboardController">
			<div class="Card-title">Checked In Members <span class="dashboard-counter">@{{ checkInLogs.length }}</span></div>
			<div class="Card-content" ng-cloak>
				<a href="member/@{{ checkInLog.member.id }}" ng-repeat="checkInLog in checkInLogs">
					<div class="result" ng-class="{ 'left-result' : $index % 3 === 0, 'right-result' : ($index + 1) % 3 === 0 }">
						<div class="Flair Flair--orange Flair-top" ng-if="checkInLog.member.leadsJrStaff" ng-cloak>Jr Staff</div>
						<div class="pic" back-img="@{{checkInLog.member.image}}"></div>
						<p class="name">@{{ checkInLog.member.firstName }} @{{ checkInLog.member.lastName }}</p>
					</div>
				</a>
			</div>
		</div>
	</div>

@stop
