@extends('layouts.master')

@section('content')

<div class="main-wrapper" ng-controller="AdminIndexController">
    <div class="spacer"></div>
    <div class="Card">
        <div class="Card-title">Stats</div>
        <div class="Card-content">
            There <ng-pluralize count="checkins.length" when="{ '0' : 'are', '1' : 'is', 'other' : 'are' }"></ng-pluralize> currently <span class="highlight">@{{ checkins.length }}</span> <ng-pluralize count="checkins.length" when="{ 'one' : 'member', 'other' : 'members' }"></ng-pluralize> checked in across all locations        
        </div>
    </div>
    

</div>

@stop