<!DOCTYPE html>
<!-- When user sign up, this is a verification email. -->
<html lang="en-US">
	<head>
		<meta charset="utf-8">
	</head>
	<body>
		<h2>Congrats {{ $name }}</h2>
		<h4>Admin confirmation mail</h4>

		<div>
			Thank you for registering at <a href="{{URL::to('/')}}">{{URL::to('/')}}</a><br/>
			Now you can add new events and can go to your favorite events.<br/>
			Moreover you can control your events.<br/>
			<br/>
		</div>
        <p style="font-size:85%; text-align:center; color:#444;">
            <a href="{{url("/users/unsubscribe/$email/$id")}}">Unsubscribe</a> from these notifications
        </p>
	</body>
</html>
