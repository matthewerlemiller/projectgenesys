@extends('layouts.master')

@section('content')

<div class="main-wrapper" ng-controller="ShiftController">
    <div class="module-container">
        <div class="Card">
            <div class="Card-title">Current Kickouts</div>
            <div class="Card-content">
                <div class="Grid Grid--medium">
                    <div class="Grid-item" ng-repeat="kickout in kickouts">
                        <div class="Grid-item-photo Grid-item-photo--negative" square style="background-image:url(@{{ kickout.member.image }})"></div>
                        <div class="Grid-item-info">
                            <p>@{{ kickout.member.firstName + ' ' + kickout.member.lastName }}</p>
                            <p class="u-smaller">When : @{{ kickout.shift.day + ' ' + kickout.shift.time }}</p>
                            <p class="u-smaller">Why : @{{ kickout.comments }}</p>
                            <p class="u-smaller">By : @{{ kickout.leader.firstName + ' ' + kickout.leader.lastName }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>  
    </div>
    <div class="module-container">
        <div class="Card">
            <div class="Card-title">Communications</div>
            <div class="Card-content">Coming soon..</div>
        </div>  
    </div>
</div>

@stop