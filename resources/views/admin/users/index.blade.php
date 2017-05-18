<!doctype html>
<html>
	<head>
		<title> Teste Blade </title>
	</head>
	<body>
		@foreach($users as $user)
			<li> {!! $user['first_name'] !!} {!! $user['last_name'] !!} from {!! $user['location'] !!} </li>
		@endforeach
	</body>
</html>