@extends('layouts.master')

@section('content')

<div class="main-wrapper admin-page" ng-controller="AdminLocationsController">
    <div class="Card">
        <div class="Card-title">Locations</div>
        <table class="Table">
            <tr>
                <th>Name</th>
                <th>Lesson Goal #</th>
            </tr>
            <tr ng-repeat="location in locations">
                <td>@{{ location.name }}</td>
                <td>@{{ location.goal ? location.goal + ' Lessons' : 'None set' }} <div class="Button Button--neutral" ng-click="openLocationAssignmentModal(location)">Edit</div></td>
            </tr>
        </table>
    </div>
</div>

@stop