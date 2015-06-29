<!DOCTYPE html>
<html>
	<head>
	</head>
	<body class="body" style="background:#eef0f1;">
		<div style="padding:25px ;margin-right: auto;margin-left: auto;">
			<div style="background:#fff; color:#000; max-width: 100%;  padding: 20px 0px 20px 25px;border-radius: 15px;">
				<div  style="text-align:center;">
					<h1 style="color:#000;  margin-right : 25px;">	
						HOBBYIX
					</h1>
				</div>
				<h1 style="font-size:150%; color:#000;">	
					Dear {{ $name}},
				</h1>
				<p style="font-size:120%; color:#000;">
					You've successfully signed up for <a href="{{url('/')}}">hobbyix.com</a>. 
					@if(isset($user_wallet))
						We've credited Rs.{{$user_wallet}}/- in your hobbyix wallet.
					@elseif(isset($user_free_credits_left))
						We've credited {{$user_free_credits_left}} free credits in your account.
					@endif
				</p>
				<p style="font-size:120%; color:#000;">
					Try booking some classes with us. <a href="{{url('/memberships')}}">Click here</a> to explore our membership or check out {{url('/memberships')}}.
				</p>
				<p style="font-size:85%; color:#444;">
					For any queries, reach out to us at: <a href="mailto:support@hobbyix.com">support@hobbyix.com</a>
				</p>
				<p style="font-size:85%; text-align:center; color:#444;">
					&#169; 2015 Hobbyix.com
				</p>
		        <p> 
		            <a href="/users/unsubscribe/{{$email}}/{{$id}}">Unsubscribe</a> from these notifications
		        </p>
			</div>
		</div>
	</body>
</html>