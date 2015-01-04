<!DOCTYPE html>
<!-- When user sign up, this is a verification email. -->
<html lang="en-US">
	<head>
		<meta charset="utf-8">
	</head>
	<body>
		<h2>Welcome {{ $name }}</h2>
		<h4>User confirmation mail</h4>

		<div>
			Thank you for registering at <a href="{{URL::to('/')}}">{{URL::to('/')}}</a><br/>
			Now you can add new events and can go to your favorite events.<br/>
			Moreover you can control your events.<br/>
			<br/>
			Don't forget to update your personal details and adding your company.<br/>
			Please click on this <a href="{{ URL::to('/users/registration/verify/'.$userId.'/'.$confirmationcode) }}">link</a>

			Problems clinking the link, copy and paste this URL to the browser.
			{{ URL::to('/users/registration/verify/'.$userId.'/'.$confirmationcode) }}.
		</div>
	</body>
</html>
