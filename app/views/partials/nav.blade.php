<div class="nav-container" ng-controller="SearchController">
    <div class="hamburger">
        <div class="pattie"></div>
        <div class="pattie"></div>
        <div class="pattie"></div>
    </div>
	<div class="links-container">
		<a class="left" href="{{ route('dashboard') }}">Home</a>
    	<a class="logout right" href="{{ route('logout') }}">Log Out</a>
        <a class="right" href="{{ route('shift.index') }}">Shift</a>
        @if(Auth::user()->Admin)
    	<a class="right" href="{{ route('admin.index') }}">Admin</a>
        @endif
	</div>


	<form >
		<input ng-keyup="searchForMember()" ng-model="query" class="member-search" type="search"  placeholder="SEARCH MEMBERS" autofocus ng-model="query">
	</form>

    <div class="results-pane" ng-show="showResults" ng-cloak>

    	<div class="main-wrapper">

    		<div class="result-block" ng-repeat="result in results">

    			<a href="/member/@{{ result.Id }}"><div class="result-image" style="background-image:url(@{{ result.ImagePath }})"></div></a>
    			<a href="/member/@{{ result.Id }}"><p class="result-name">@{{ result.NameFirst }} @{{ result.NameLast }}</p></a>
    			<div class="result-checkin" ng-class="{'result-checkin-green' : result.CheckedIn }" ng-click="checkIn(result.Id, $index)">@{{ result.CheckedIn ? 'Checked In!' : 'Check In' }}</div>

    		</div>
    	</div>
    </div>
</div>
