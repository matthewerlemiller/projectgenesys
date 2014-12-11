<!doctype html>
<html>
<head>
	<title>Genesys - Login</title>
	<link rel="stylesheet" type="text/css" href="/css/main.css">
</head>
<body class="login">
	<div class="login-container">
		<div class="yv-logo"></div>
		<form method="post">
			<select name="Select-A-Center" required >
				<option disabled>Select a Center</option>
				<option value="n-el-cajon">North El Cajon</option>
			  <option value="s-el-cajon">South El Cajon</option>
			  <option value="lakeside">Lakeside</option>
			  <option value="santee">Santee</option>
			</select>
			<div class="input-container">
				<input class="email" name="email" type="text" placeholder="Email">
				<input class="password" name="password" type="password" placeholder="Password">
				<input class="log-in-button" type="submit" value="Log In">
			</div>
		</form>
	</div>

	<script type="text/javascript" src="/js/jquery.js"></script>
	<script type="text/javascript" src="/js/main.js"></script>

</body>
</html>
