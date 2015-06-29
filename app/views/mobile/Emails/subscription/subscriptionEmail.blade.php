<!DOCTYPE html>
<!-- When user subscribed for the email from our website, this is a confirmation email. -->
<html>
	<head>
	</head>
	<body class="body" style="background:#31BCA1">
		<div style="padding-right: 5cm;padding-left: 5cm;padding-top:50px;margin-right: auto;margin-left: auto;">
			<div style="background:#fff;max-width: 100%;  padding: 30px 15px;margin-bottom: 30px;color: inherit;padding-left: 60px;border-radius: 15px;">
				<p style="font-size:150%">	
					Dear User,
				</p>
				<p>
					Thanks a lot for subscribing with us. We will keep you posted about the latest upcoming batches in your city. 

				</p>
				<p>
					Keep exploring your hobbies with<a href="#"> Hobbyix.com </a>.
				</p>
				<p style="font-size:85%">
				This is an auto-generated mail from<a href="#"> Hobbyix.com </a>to<a href="#"> User </a>
				</p>
				<p style="font-size:85%">
				If you have received this email by mistake, please inform by replying to this email.
				</p>
				<p style="text-align:center">
				&#169;Hobbyix.com
				</p>
		        <p style="font-size:85%; text-align:center; color:#444;">
		            <a href="{{url(/subscriptions/unsubscribe/{{$email}}/{{$id}})}}">Unsubscribe</a> from these notifications
		        </p>
		</div>
	</body>
</html>	