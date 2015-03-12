@extends('layouts.master')

@section('content')

	<div class="main-wrapper">

	<div class="add-new-button">

		<a href="{{ route('member.create') }}" class="create-new">+</a>
	</div>

	<div class="spacer"></div>

		<div class="results-wrapper" ng-controller="DisplayCheckedInMembers">

		<h1 class="title">Current Checked In Members</h1>
		<div class="title-rule"></div>

			<a href="member/@{{ Checklog.member.Id }}" ng-repeat="Checklog in Checklogs"><div class="result" >
				<div class="pic" back-img="@{{Checklog.member.ImagePath}}"></div>
				<p class="name">@{{ Checklog.member.NameFirst }} @{{ Checklog.member.NameLast }}</p>
			</div></a>

		</div>
	</div>


@stop
