@extends('layouts.master')

@section('content')

	<div class="main-wrapper">

		<div class="add-new-button">

			<a href="{{ route('member.create') }}" class="create-new">+</a>
		</div>

		<div class="spacer"></div>

		{{-- <div class="results-wrapper" ng-controller="DashboardController">

			<h1 class="title">Checked In Members</h1>
			<div class="title-rule"></div>

			<a href="member/@{{ checkInLog.member.id }}" ng-repeat="checkInLog in checkInLogs">
				
				<div class="result">
					<div class="pic" back-img="@{{checkInLog.member.image}}"></div>
					<p class="name">@{{ checkInLog.member.firstName }} @{{ checkInLog.member.lastName }}</p>
				</div>
			</a>

		</div> --}}

		<div class="Card results-wrapper" ng-controller="DashboardController">

			<div class="Card-title">Checked In Members</div>

			<div class="Card-content">

				<a href="member/@{{ checkInLog.member.id }}" ng-repeat="checkInLog in checkInLogs">
					
					<div class="result">
						<div class="pic" back-img="@{{checkInLog.member.image}}"></div>
						<p class="name">@{{ checkInLog.member.firstName }} @{{ checkInLog.member.lastName }}</p>
					</div>
				</a>

			</div>

		</div>

	</div>


@stop
