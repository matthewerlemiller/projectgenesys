<!DOCTYPE html>
<html>
<head>
    <title>Project Genesys | YV Centers</title>
	<link href='http://fonts.googleapis.com/css?family=Lato:300,400,700' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" type="text/css" href="{{ asset('css/font-awesome.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="{{ asset('js/vendor/angular.js') }}"></script>
</head>

@if(Route::currentRouteName() == 'login.get')
<body class="login">
@else
<body class="home" ng-app="genesys">
@endif

    @if(Auth::check())

    @include('partials.nav')

   	@endif


@yield('content')

<!-- End of site wrap opened in nav.blade.php -->
</div>

<script src="{{ asset('js/jquery.js') }}"></script>
<script src="{{ asset('js/vendor/angular-file-upload-html5-shim.min.js') }}"></script>
<script src="{{ asset('js/vendor/angular-file-upload.min.js') }}"></script>
<script src="{{ asset('bower_components/angular-touch/angular-touch.js') }}"></script>
<script src="{{ asset('bower_components/angular-off-click/offClick.js') }}"></script>
<script src="{{ asset('bower_components/ng-file-upload/angular-file-upload-shim.js') }}"></script>
<script src="{{ asset('bower_components/ng-file-upload/angular-file-upload-all.js') }}"></script>
<script src="{{ asset('js/config.js') }}"></script>
<script src="{{ asset('js/directives.js') }}"></script>
<script src="{{ asset('js/factories.js') }}"></script>
<script src="{{ asset('js/controllers.js') }}"></script>
<script src="{{ asset('js/main.js') }}"></script>
<script src="{{ asset('js/pages/dashboard.js') }}"></script>



</body>

</html>
