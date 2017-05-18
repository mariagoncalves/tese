<!doctype html>
<html>
	<head>
		<title> Teste Blade </title>
	</head>
	<body>
		<form method = "POST" action = "/users">
			{!! csrf_field()!!}
			<input type = "text" name = "name">
			<input type = "email" name = "email">
			<input type = "password" name = "password">
			<input type = "submit" value = "Create">
		</form>
	</body>
</html>