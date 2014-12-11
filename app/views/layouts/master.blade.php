<!DOCTYPE html>
<html>
<head>
    <title>Genesys - Home</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('dev-envir-alex/css/main.css') }}">
</head>
<body class="home">
    <div class="search-container">
        <a class="log-out" href="#">Log Out</a>
        <input class="member-search" type="search"  placeholder="SEARCH MEMBERS" autofocus>
    </div>  



@yield('content')



<script src="{{ asset('dev-envir-alex/js/jquery.js')}}"></script>
<script src="{{ asset('dev-envir-alex/js/pages/home.js')}}"></script>


</body>

</html>