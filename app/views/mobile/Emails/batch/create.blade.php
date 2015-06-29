<!doctype html>
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
				<p style=" color:#000;">
					Thanks for adding your batch <strong>{{$batch}}</strong> details. We are currently reviewing your post. We will notify you once your batch gets approved. It may take around 24-48 hours for your post to get live. To view your batches, click on.
				</p>
				<div style="text-align:center;">
					<a href="{{ URL::to('/batches')}}">
						<button type="button" style="color: #fff; background-color: #5cb85c;border-color: #4cae4c;color: #fff;background-color: #449d44;border-color: #398439;background-color: #5cb85c;padding: 10px 16px;font-size: 18px;line-height: 1.33;border-radius: 6px; ">
							<strong>View Batches</strong>
						</button>
					</a>
				</div>
				<p style="font-size:95%; color:#000;">	
				 Thanks for your cooperation. 
				</p>
				<p style="font-size:95%; color:#000;">	
				Customer Services Team
				</p>
				<p style="font-size:85%; color:#444;">
					For any queries, reach out to us at: <a href="mailto:support@hobbyix.com">support@hobbyix.com</a>
				</p>
				<p style="text-align:center; color:#444;">	
					&#169; 2015 Hobbyix.com
				</p>
		        <p style="font-size:85%; text-align:center; color:#444;">
		            <a href="{{url("/users/unsubscribe/$email/$id")}}">Unsubscribe</a> from these notifications
		        </p>
			</div>
		</div>
	</body>
</html>