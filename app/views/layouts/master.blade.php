<!DOCTYPE html>
<html>
<head>
    <title>Genesys - Home</title>
	<link href='http://fonts.googleapis.com/css?family=Lato:300,400,700' rel='stylesheet' type='text/css'>
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

   	<div class="spacer"></div>


@yield('content')



<script src="{{ asset('js/jquery.js') }}"></script>
<script src="{{ asset('js/vendor/angular-file-upload-html5-shim.min.js') }}"></script>
<script src="{{ asset('js/vendor/angular-file-upload.min.js') }}"></script>
<script src="{{ asset('js/config.js') }}"></script>
<script src="{{ asset('js/directives.js') }}"></script>
<script src="{{ asset('js/factories.js') }}"></script>
<script src="{{ asset('js/controllers.js') }}"></script>
<script src="{{ asset('js/main.js') }}"></script>
<script src="{{ asset('js/pages/home.js') }}"></script>



</body>

</html>
