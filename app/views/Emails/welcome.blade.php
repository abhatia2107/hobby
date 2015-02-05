<!doctype html>
<html>
	<head>
	</head>
	<body class="body" style="background:#31BCA1">
		<div style="padding-right: 3cm;padding-left: 3cm;padding-top:50px;margin-right: auto;margin-left: auto;">
			<div style="background:#fff;max-width: 100%;  padding: 30px 15px;margin-bottom: 30px;color: inherit;padding-left: 60px;border-radius: 15px;">
				<p style="font-size:150%">	
					Dear {{ $name}},
				</p>
				<p>
					Thanks for signing up at <a href="www.hobbyix.com">Hobbyix.com</a>. We're ready to activate your account. All we need to do is make sure this is your email address.
				</p>
				<p>
					<a href="{{ URL::to('/users/registration/verify/'.$userId.'/'.$confirmationcode) }}">
						<button type="button" style="color: #fff;background-color: #5cb85c;border-color: #4cae4c;color: #fff;background-color: #449d44;border-color: #398439;background-color: #5cb85c;padding: 10px 16px;font-size: 18px;line-height: 1.33;border-radius: 6px;">
							Verify your Email Address
						</button>
					</a>
				</p>
				<p style="font-size:85%">
					If you face any issues with above button then just copy this url to your browser:<a href="#">Link</a>
				</p>
				<p style="font-size:85%">
					If you wish to get help or get in touch with us, email<a href="#">mail</a>
				</p>
				<p>
					Thanks for signing up. We're happy to have you on board.
				</p>
				<p style="text-align:center">
					&#169;Hobbyix.com
				</p>
		</div>
	</body>
</html>