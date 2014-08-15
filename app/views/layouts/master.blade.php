<html>
	<head>
		<title>GENESYS</title>
        <link rel="stylesheet" type="text/css" href="{{ asset('dev-envir-austen/css/reset.css') }}">
		<link rel="stylesheet" type="text/css" href="{{ asset('dev-envir-austen/css/style.css')}}">
	</head>
    <body>
        
    	<div id="mast">
            <ul>
                <li><a href="{{ route('logout') }}">Logout</a></li>
                <li><a href="{{ route('listMembers') }}">List</a></li>
                <li><a href="{{ route('createMember') }}">New</a></li>
                <li><a href="{{ route('home') }}">Home</a></li>
            </ul>
    		 
    	</div>

        @yield('content')
        
    </body>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
    <script src="{{ asset('dev-envir-austen/js/main.js')}}"></script>
</html>