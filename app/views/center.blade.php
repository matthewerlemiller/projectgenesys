@extends ('layouts.master')

@section('content')

<div class="main-wrapper" ng-controller="CenterController">
    <!-- Using .shift-module-container for all page modules -->
    <div class="shift-module-container">
        <table class="Table">
            <tr>
                <th>Check-ins Today</th>
                <th>Check-ins This Week</th>
                <th>Check-ins This Month</th>
                <th>Total Check-ins (ever!)</th>
            </tr>
            <tr>
                <td>@{{ totals.day }}</td>
                <td>@{{ totals.week }}</td>
                <td>@{{ totals.month }}</td>
                <td>@{{ totals.all }}</td>
            </tr>
        </table>
    </div>
    <div class="shift-module-container">
        <table class="Table">
            <tr>
                <th>Check-in Heatmap</th>
            </tr>
            <td>
                <heat-map></heat-map>           
            </td>
        </table>
    </div>
</div>

@stop