<!DOCTYPE html>
<html>
<head>
    <title>Genesys - Home</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}">
</head>

@if(Route::currentRouteName() == 'login.get')
<body class="login">
@else
<body class="home">
@endif

    @if(Auth::check())
    <div class="search-container">
    	<a class="log-in" href="{{ route('dashboard') }}">Home</a>
        <a class="log-out" href="{{ route('logout') }}">Log Out</a>
        <input class="member-search" type="search"  placeholder="SEARCH MEMBERS" autofocus>
    </div>  
    @endif



@yield('content')



<script src="{{ asset('js/jquery.js') }}"></script>
<script src="{{ asset('js/main.js') }}"></script>
<script src="{{ asset('js/pages/home.js') }}"></script>



</body>

</html>