
<div class="offscreen-nav">
	<div class="links-container">
		<a href="{{ route('dashboard') }}">Home</a>
		<a href="{{ route('shift.index') }}">Shift</a>
		<a class="logout" href="{{ route('logout') }}">Log Out</a>
		@if(Auth::user()->admin)
		<a href="{{ route('admin.index') }}">Admin</a>
		@endif
	</div>
</div>

<input type="checkbox" id="nav-trigger" class="nav-trigger" />
<label for="nav-trigger">
	<div class="hamburger">
		<div class="patty"></div>
		<div class="patty"></div>
		<div class="patty"></div>
	</div>
</label>

<!--
	entire site wrapper so content can be moved to the right when opening menu
	ends before script tags in master.blade.php
 -->
<div class="site-wrap">

	<div class="header-container" ng-controller="SearchController">

			<div class="nav-container">

				<a href="{{ route('home') }}"><img class="logo" src="{{ asset('img/yv-logo.png') }}"></a>
				
				<div class="search-field-container">
					
					<input id="member-search-input" ng-keyup="searchForMember()" ng-model="query" class="search-field" type="search" autofocus ng-model="query" off-click="blurSearch()">
					<i class="fa fa-search search-field-icon"></i>
				</div>
				
					
			</div>

			<div class="results-pane" ng-show="showResults" ng-cloak>

					<div class="main-wrapper">

							<!-- Display this if no results -->

							<div class="no-result-block result-block" ng-if="!results.length">
									<h4 class="no-result-heading">No Results Were Returned</h4>
									<p class="no-result-message">Please try another search term or add a new member</p>
							</div>

							<!--  End of no results -->

							<div class="result-block" ng-repeat="member in results">

									<a href="/member/@{{ member.id }}"><div class="result-image" style="background-image:url(@{{ member.image }})"></div></a>
									<div class="result-block-content">
										<a href="/member/@{{ member.id }}"><p class="result-name">@{{ member.firstName }} @{{ member.lastName }}</p></a>
										<status-tag member="member" loaded="showResults"></status-tag>	
									</div>
									
									<div class="result-checkin" ng-class="{'result-checkin-green' : member.checkedIn }" ng-click="checkIn(member.id, $index)">@{{ member.checkedIn ? 'Checked In!' : 'Check In' }}</div>

									<div class="clear"></div>

							</div>
					</div>
					<div class="rule"></div>
			</div>

	</div>


