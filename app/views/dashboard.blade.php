@extends('layouts.master')

@section('content')

	<div class="main-wrapper">

		<div class="results-wrapper" ng-controller="DisplayCheckedInMembers">
			
			<div class="result result-create-new">
				<a href="{{ route('member.create') }}" class="create-new">
					<div class="text-container">
						<h2 class="plus">+</h2>
						<h2 class="add-new">Add new</h2>	
					</div>
				</a>
			</div>


			<!-- loop to create all the profile pics and such -->
			<?php //for ($i=0; $i<15; $i++) {?>
				<div class="result" ng-repeat="Checklog in Checklogs">
					<div class="dot"></div>
					<form action="">
						<input type="checkbox" id="cb@{{ $index }}">
						<label for="cb@{{ $index }}"></label>
					</form>
					<div class="pic" style="background-image:url(@{{Checklog.member.ImagePath}}) "></div>
					<p class="name">@{{ Checklog.member.NameFirst }} @{{ Checklog.member.NameLast }}</p>
				</div>
			<?php //} ?>
			<!--  -->

		</div>
	</div>


@stop
