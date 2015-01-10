@extends("Layouts.layout")
@section("pagestylesheet")
<style type="text/css">
	.home_vendor_page
	{
		width: 100%;
		background-image: url(/assets/images/sb.png);
		margin-top: -20px;
		font-family: "Times New Roman", Times, serif;
		padding-top: 10px;
		padding-bottom: 40px;
		color: #333;

	}
	.vendor_institute_details
	{
		 background-color: #ffffff;
		 -moz-box-shadow: 1px 1px 1px 1px rgba(0,0,0,0.5);
		 box-shadow: 1px 1px 1px 1px rgba(0,0,0,0.5);
				-webkit-box-shadow: 1px 1px 1px 1px rgba(0,0,0,0.5); 
				border-radius: 5px;
				padding: 10px 20px 20px 20px;


	}
	.vendor_venue_list
	{
		 background-color: #ffffff;
		 -moz-box-shadow: 1px 1px 1px 1px rgba(0,0,0,0.5);
		 box-shadow: 1px 1px 1px 1px rgba(0,0,0,0.5);
				-webkit-box-shadow: 1px 1px 1px 1px rgba(0,0,0,0.5); 
				border-radius: 5px;
			margin-top: 40px;
	}
	.vendor_institute_details h1
	{
		text-align: left;
		font-size: 35px;
		color: #333;
	}
	.vendor_institute_details .glyphicon
	{
		color:#333;
		font-size: 20px;
		font-weight: bolder;
		margin-right: 10px;
		width: 20px;
		margin-top: 5px;
	}
	#institute_header
	{
		border-bottom:2px dashed;
		
	}
	#institute_details_box
	{
		padding-top: 25px;
	}
	li
	{
		list-style-type: none;
		line-height: 2.5em
	}
	.vendor_institute_batches
	{
		margin-top: 30px;
		background-color: white;
		box-shadow: 1px 1px 1px 1px rgba(0,0,0,0.5);
		-moz-box-shadow: 1px 1px 1px 1px rgba(0,0,0,0.5);
				-webkit-box-shadow: 1px 1px 1px 1px rgba(0,0,0,0.5); 
				border-radius: 5px;
	}
	.vendor_institute_batches .day
	{
		margin-top: 8px;
	}
	.vendor_batches_title
	{
		margin-top: 20px;
		text-align: center;
		font-size: 20px;
		font-weight: bolder;
		border-bottom-color: skyblue;
		border-bottom:2px dashed;
	}
	.weekday
	{
		margin-top: -6px;
	}
	.vendor_batchInfo
	{
		
    }
    .edit_delete_buttons
    {
    	clear: both;
    	margin-top: 0px;
    	float: left;
    	margin-left: 35px;
    }

</style>
@stop
@section("content")

<div class="modal fade" id="sendMessage" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				 <button type="button" id='close_model' class="close" data-dismiss="modal" aria-hidden="true">×</button>				
					<center>Send Message To Institute</center>
			</div>
			<div class="modal-body">
				<form role="form">
					<div class="form-group inner-addon left-addon" >
						 <i class="glyphicon glyphicon-user"></i>
						 <input type="text" class="form-control" style="padding:0px 0px 0px 30px; " name='InputName' id='MsgInputName' placeholder='Enter Your Name' required='required'/>
					</div>
					<div class="form-group inner-addon left-addon">
						<i class="glyphicon glyphicon-envelope"></i>
						 <input type="email" class="form-control" name='InputEmail' id='MsgInputEmail'  placeholder='Enter Your E-Mail Address' required='required'/>
					</div>
					<div class="form-group inner-addon left-addon">
						<i class="glyphicon glyphicon-phone"></i>
						 <input type="phone" class="form-control" name='InputNumber' id='MsgInputPhone'  placeholder='Enter Your Mobile Number' required='required'/>
					</div>
					<div class="form-group">
					  <label for="comment">Message:</label>
					  <textarea class="form-control" rows="3" name='InputMessage' id="comment"></textarea>
					</div>
					<div class="modal-footer">
						 <center><button type="submit" class="btn btn-primary">Send Message</button></center>
					</div>
				</form>
			</div>
		</div>
	</div>				
</div>
<div class="home_vendor_page">
	<div class="container vendor_institute_details">
		<div class="col-md-12 col-xs-12 col-sm-12 column" id="institute_header">
			<div class="col-md-11 col-xs-12 col-sm-8 column">
				<h1>{{" ".$instituteDetails->institute}}</h1>
			</div>
			<div class="col-md-1 col-xs-12 col-sm-4 column">
				<div class="inscore"><span id="rating-value">{{$instituteDetails->institute_rating}}</span></div><br>
				<span style="clear:both;position:relative"class="stars">{{$instituteDetails->institute_rating}}</span>
			</div>

		</div>
		<div class="col-md-12 col-xs-12 col-sm-12 column" id="institute_details_box">
			<div class="col-md-6 col-xs-12 col-sm-6 column">
				<li><span class="glyphicon glyphicon-map-marker"></span>{{$instituteDetails->institute}}</li>
				<li><span class="glyphicon glyphicon-phone"></span></li>
				<li><span class="glyphicon glyphicon-hand-right"></span></li>
				<li><span class="glyphicon glyphicon-hand-right"></span></li>
				
			</div>
			<div class="col-md-6 col-xs-12 col-sm-6 column">
				<li><span class="glyphicon glyphicon-globe"></span><a href="{{$instituteDetails->institute_website}}">{{$instituteDetails->institute_website}}</a></li>
				<li><span class="glyphicon glyphicon-link"></span><a href="{{$instituteDetails->institute_website}}">{{$instituteDetails->institute}}</a></li>
				<li><span class="glyphicon fa fa-fw fa-twitter"></span><a href="{{$instituteDetails->institute_twitter}}">{{$instituteDetails->institute_twitter}}</a></li>
				<li><span class="glyphicon fa fa-w fa-facebook"></span><a href="{{$instituteDetails->institute_fblink}}">{{$instituteDetails->institute_fblink}}</a></li>
			</div>
		</div>
	</div>
</div>
@stop