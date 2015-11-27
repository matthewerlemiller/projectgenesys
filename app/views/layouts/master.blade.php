<!DOCTYPE html>
<html>
<head>
    <title>Visit | YV Centers</title>
	<link href='http://fonts.googleapis.com/css?family=Lato:300,400,700' rel='stylesheet' type='text/css'>
    <link rel="apple-touch-icon" sizes="57x57" href="{{ asset('favicons/apple-touch-icon-57x57.png') }}">
    <link rel="apple-touch-icon" sizes="60x60" href="{{ asset('favicons/apple-touch-icon-60x60.png') }}">
    <link rel="apple-touch-icon" sizes="72x72" href="{{ asset('favicons/apple-touch-icon-72x72.png') }}">
    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('favicons/apple-touch-icon-76x76.png') }}">
    <link rel="apple-touch-icon" sizes="114x114" href="{{ asset('favicons/apple-touch-icon-114x114.png') }}">
    <link rel="apple-touch-icon" sizes="120x120" href="{{ asset('favicons/apple-touch-icon-120x120.png') }}">
    <link rel="apple-touch-icon" sizes="144x144" href="{{ asset('favicons/apple-touch-icon-144x144.png') }}">
    <link rel="apple-touch-icon" sizes="152x152" href="{{ asset('favicons/apple-touch-icon-152x152.png') }}">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('favicons/apple-touch-icon-180x180.png') }}">
    <link rel="icon" type="image/png" href="{{ asset('favicons/favicon-32x32.png') }}" sizes="32x32">
    <link rel="icon" type="image/png" href="{{ asset('favicons/android-chrome-192x192.png') }}" sizes="192x192">
    <link rel="icon" type="image/png" href="{{ asset('favicons/favicon-96x96.png') }}" sizes="96x96">
    <link rel="icon" type="image/png" href="{{ asset('favicons/favicon-16x16.png') }}" sizes="16x16">
    <link rel="manifest" href="{{ asset('favicons/manifest.json') }}">
    <link rel="mask-icon" href="{{ asset('/safari-pinned-tab.svg') }}" color="#5bbad5">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="msapplication-TileImage" content="{{ asset('/mstile-144x144.png') }}">
    <meta name="theme-color" content="#ffffff">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap-theme.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('css/font-awesome.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/production/app.css') }}">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--<script src="{{ asset('js/vendor/angular.js') }}"></script>-->
    <script src="{{ asset('bower_components/angular/angular.js') }}"></script>

    <script src="{{ asset('js/vendor/ui-bootstrap-custom-0.14.3.min.js') }}"></script>
    <script src="{{ asset('js/vendor/ui-bootstrap-custom-tpls-0.14.3.min.js') }}"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/d3/3.5.5/d3.min.js"></script>
    <script>

    	var CONFIG = {};
    	var MEMBER_ID = null;
        var LOCATION_ID = {{ Auth::id() ? Auth::id() : 'null' }};

    	@if(isset($member))
    	MEMBER_ID = {{ $member->id }};
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
