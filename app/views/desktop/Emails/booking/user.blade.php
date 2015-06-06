<!doctype html>
<html>
	<head>	 	

	</head>
	<body class="body" style="background:#eef0f1;padding:10px 40px 20px 40px;font-family: 'Open Sans',sans-serif;">
		<div style="background:white;border-radius:10px;padding:0px 0px;margin:0px">			
			<div style="text-align:center;width:100%;height:auto;background:#202e54;padding:0;margin-top:0px;border-top:1px;border-top-right-radius:10px;border-top-left-radius:10px;">
				<h1 style="color:#fff;padding:20px;">	
					HOBBYIX
				</h1>
			</div>
			<div style="padding:0px 40px">
				<h1 style="font-size:150%; color:#000;">
					Dear {{$institute}},
				</h1>
				<p style="color:#000;">
					Thank you for your Order on Hobbyix.com.<br>We are pleased to inform you that your transaction on Hobbyix.com is confirmed and the Order number is {{$order_id}}.
					Below are your order details
				</p>
				<div style="background:#FAFDFE;border:2px solid #1E2C4F;display:inline-block;min-width:100%;overflow:hidden;border-radius:10px;">
					<div style="background:#1E2C4F;padding:10px 5px; color:white">
					    <strong>Booking ID: {{$order_id}}</strong>
					</div>
					<div style="max-width:100%;padding:1.6% 2% 5% 2%;">
						<div style="max-width:47%;display:inline-block;float:left;width:100%;border: 2px solid grey;margin:1%;overflow:hidden;border-radius:10px">
								<div style="width:100%;padding:5px 6px;border-bottom: 1px solid grey;">Institute Name : {{$institute}}</div>
								<div style="width:100%;padding:5px 6px;border-bottom: 1px solid grey;"> Subcategory: {{$subcategory}}</div>
								<div style="width:100%;padding:5px 6px;border-bottom: 1px solid grey;">Address:  {{$locality.', '.$location}}</div>
								<div style="width:100%;padding:5px 6px">Mobile Number: {{$venue_contact_no}}</div>
						</div>							
						<div style="max-width:47.5%;display:inline-block;width:100%;border: 2px solid grey;margin:1%;overflow:hidden;border-radius:10px">
							<div style="width:100%;float:left;padding:5px 6px 5px;border-bottom: 1px solid grey;">Class Booked for: {{$date}}</div>
							<div style="width:100%;float:left;padding:5px 6px 5px;border-bottom: 1px solid grey;">Number of Sessions: {{$no_of_sessions}}</div>
							<div style="width:100%;float:left;padding:5px 6px;">Amount Payed: {{$amount}}</div>
						</div>								
					</div>
				</div>	
				<p >	
				 Thanks for your cooperation. 
				</p>
				<p >	
				Customer Services Team
				</p>		
				<!--<div style="text-align:center;">
					<a href="{{ URL::to('/batches')}}">
						<button class="btn btn-primary">
							<strong>View Batches</strong>
						</button>
					</a>
				</div> -->
			</div>
			<div style="padding:1px 30px 1px 30px;background:#17223E;color:white;border-bottom-left-radius:10px;border-bottom-right-radius:10px;margin-top:30px">				
				<p style="margin-bottom:2px">
					For any queries, reach out to us at: <a style="color:white" href="mailto:support@hobbyix.com">support@hobbyix.com</a>
				</p>
				<p style="text-align:center; color:#fff;margin-top:0px">	
					&#169; 2015 Hobbyix.com
				</p>	
			</div>	
		</div>
	</body>
</html>