<!DOCTYPE html>
<html>
<head>
    <title>Genesys - Home</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}">
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



<script src="{{ asset('js/jquery.js') }}"></script>
<script src="{{ asset('js/vendor/angular-file-upload-html5-shim.min.js') }}"></script>
<script src="{{ asset('js/vendor/angular-file-upload.min.js') }}"></script>
<script src="{{ asset('js/main.js') }}"></script>
<script src="{{ asset('js/pages/home.js') }}"></script>



</body>

</html>