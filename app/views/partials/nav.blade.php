<nav class="offscreen-nav" off-click="navClose()" off-click-filter="'#trigger-proxy'">
    <ul class="links-container">
        <a href="{{ route('home') }}"><li class="isFirst">Dashboard</li></a>
        @if(Auth::user()->admin)
        <a href=""><li>Members</li></a>
        <a href="{{ route('admin.leaders') }}"><li>Leaders</li></a>
        <a href="{{ route('admin.locations') }}"><li>Locations</li></a>
        <a href=""><li>Suspensions</li></a>
        <a href=""><li>Metrics</li></a>
        @endif
        @if(!Auth::user()->admin)
        <a href="{{ route('member.create') }}"><li>Add Member</li></a>
        <a href="{{ route('shift.index') }}"><li>Shift</li></a>
        @endif
        <a class="logout" href="{{ route('logout') }}"><li>Sign out</li></a>
        
    </ul>
</nav>

<!-- <input type="checkbox" id="nav-trigger" class="nav-trigger" ng-model="navOpen"/> -->


<!--
    entire site wrapper so content can be moved to the right when opening menu
    ends before script tags in master.blade.php
 -->
<div class="site-wrap" ng-class="{'site-wrap-triggered' : navOpen }">
    <div class="header-container" ng-controller="SearchController">
            <div class="nav-container">
                <a href="{{ route('home') }}"><img class="logo" src="{{ asset('img/yv-logo.png') }}"></a>
                <div class="trigger-proxy" id="trigger-proxy" ng-click="toggleOpen();" ng-class="{'label-triggered' : navOpen }">
                    <div class="hamburger">
                        <div class="patty"></div>
                        <div class="patty"></div>
                        <div class="patty"></div>
                    </div>
                </div>
                <div class="search-field-container">                
                    <input id="member-search-input" class="search-field" type="search" ng-model="query" off-click="blurSearch()" ng-change="searchForMember()" ng-model-options="{ debounce: 300 }">
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
                        <a href="/member/@{{ member.id }}">
                            <div class="result-image" style="background-image:url(@{{ member.image }})">
                                <div class="Flair Flair-top Flair--orange Flair--small" ng-if="member.leadsJrStaff" ng-cloak>Jr Staff</div>                                
                            </div>
                        </a>
                        <div class="result-block-content">
                            <a href="/member/@{{ member.id }}"><p class="result-name">@{{ member.firstName }} @{{ member.lastName }}</p></a>
                            <status-tag member="member" loaded="showResults" style="vertical-align:super;"></status-tag> 
                            <div class="Indicator Indicator--negative Indicator--small" style="vertical-align:bottom;" ng-show="!member.permissionSlip">
                                <i class="Indicator-icon fa fa-file-text"></i>
                            </div>
                        </div>                          
                        <div class="result-checkin" ng-class="{'result-checkin-green' : member.checkedIn }" ng-click="checkIn(member.id, $index)">@{{ member.checkedIn ? 'Checked In!' : 'Check In' }}</div>
                        <div class="clear"></div>
                    </div>
                </div>
                <div class="rule"></div>
            </div>

    </div>


