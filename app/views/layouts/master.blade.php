<!DOCTYPE html>
<html>
<head>
    <title>Project Genesys | YV Centers</title>
	<link href='http://fonts.googleapis.com/css?family=Lato:300,400,700' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" type="text/css" href="{{ asset('css/font-awesome.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="{{ asset('js/vendor/angular.js') }}"></script>
    <script>

    	var CONFIG = {};
    	var MEMBER_ID = null;

    	@if(isset($member))
    	MEMBER_ID = {{ $member->Id }};
    	@endif

    </script>
</head>

@if(Route::currentRouteName() == 'login.get')
<body class="login">
@else
<body class="home" ng-app="genesys">
@endif
    
    <alerter></alerter>

    @if(Auth::check())

    @include('partials.nav')

   	@endif


@yield('content')

<!-- End of site wrap opened in nav.blade.php -->
</div>

<script src="{{ asset('js/production/app.js') }}"></script>



</body>

</html>
