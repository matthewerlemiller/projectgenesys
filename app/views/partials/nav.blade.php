
<div class="offscreen-nav">
	<div class="links-container">
		<a href="{{ route('dashboard') }}">Home</a>
		<a href="{{ route('shift.index') }}">Shift</a>
		<a class="logout" href="{{ route('logout') }}">Log Out</a>
		@if(Auth::user()->Admin)
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

					<form >
							<input ng-keyup="searchForMember()" ng-model="query" class="member-search" type="search"  placeholder="SEARCH MEMBERS" autofocus ng-model="query">
					</form>

			</div>

			<div class="results-pane" ng-show="showResults" ng-cloak>

					<div class="main-wrapper">

							<!-- Display this if no results -->

							<div class="no-result-block result-block">
									<h4 class="no-result-heading">No Results Were Returned</h4>
									<p class="no-result-message">Please try another search term or add a new member</p>
							</div>

							<!--  End of no results -->

							<div class="result-block" ng-repeat="result in results">

									<a href="/member/@{{ result.Id }}"><div class="result-image" style="background-image:url(@{{ result.ImagePath }})"></div></a>
									<a href="/member/@{{ result.Id }}"><p class="result-name">@{{ result.NameFirst }}<br/>@{{ result.NameLast }}</p></a>
									<div class="result-checkin" ng-class="{'result-checkin-green' : result.CheckedIn }" ng-click="checkIn(result.Id, $index)">@{{ result.CheckedIn ? 'Checked In!' : 'Check In' }}</div>

							</div>
					</div>
					<div class="rule"></div>
			</div>

	</div>


