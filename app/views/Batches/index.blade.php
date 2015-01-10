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
	<div class="home_vendor_page">
		<?php $days = array("day1" => "M","day2" => "T","day3" => "W", "day4" => "T","day5" => "F","day6" => "S","day7" => "S"); ?>
			<div class="vendor_institute_batches container">
				<div class="vendor_batches_title">
			   		<h1>My Batches</h1>
			   	</div><br><br>
			   	<ul class="list-unstyled container" id="vendor_batches_list" >
		         @foreach($batchDetails as $index => $data)
		         	<?php 
		         		if($data->institute_photo)
		         		{
		         			$instituteID = $data->batch_institute_id;
		         			$institute_photo_path ="/assets/images/institute/".$instituteID.".jpg";
		         		}
		         		else
		         		{
		         			$institute_photo_path = "/assets/images/institute/institute.gif";
		         		}
		         	?>
		         	<li class='batch{{$index}}' id='batchInfo' style='display:none' >
			     		<div class="col-md-12 col-xs-12 col-sm-12 column">
							<div class="row clearfix">
								<div class="col-md-12 col-xs-12 col-sm-12 column">
									<div class="col-md-12 col-xs-12 col-sm-12 column">
										<div class="col-md-8 col-xs-12 col-sm-8 column">
											<span id="batch_name"> <a href="/batches/batchID">{{$data->batch}} </a> </span>
											<span class="inst_name">{{$data->institute}}</span>
										</div>
										<div class="col-md-4 col-xs-12 col-sm-4 column">
											<span id="tag-icon"><span class="glyphicon glyphicon glyphicon-tags"></span>{{$data->batch_trial}}</span>	
										</div>
									</div>
								</div>
							</div>
							<div class="row clearfix batch">
								<div class="col-md-12 col-xs-12 col-sm-12 column" style="margin-top:20px">
									<div class="col-md-3 col-xs-12 col-sm-12 column">
										<center><img src="{{$institute_photo_path}}" class="institute-profile-pic"></center>
									</div>
									<div class="col-md-6 col-xs-12 col-sm-8 column">
										<div id="inst_contact"  onClick="show_contact({{$index}})" class="col-md-5 col-xs-12 col-sm-4 column"><div style="display:none;margin-top:-7px" id="contact{{$index}}"><span id="cell-icon" class="glyphicon glyphicon-phone-alt"></span>{{' '.$data->venue_contact_no}}</div>
											<div style="margin-top:-7px" id="show_contact{{$index}}"><span id="cell-icon" class="glyphicon glyphicon-phone-alt"></span> View Phone Number</div>
										</div>
										<div  href="#sendMessage" data-toggle="modal" id="inst_message" class="col-md-4 col-xs-12 col-sm-4 column"><div style="margin-top:-7px"><div id="msg-icon" style="margin-right:5px;"class="glyphicon glyphicon-envelope"></div>Send Message</div></div>
										<div id="inst_details" class="col-xs-12">
											<div id="inst_type" style="margin-top:1px;"><span id="hand-icon">☛</span>Type: {{$data->subcategory}}, {{$data->category}}</div>
											<div id="inst_price" style="margin-top:0px;"><span id="hand-icon">☛</span>Price:  ₹ {{$data->batch_price}}</div>
											<div id="inst_address" style="margin-top:0px;"><span id="hand-icon">☛</span>Address: {{$data->locality}}, {{$data->location}}</div>
										</div>
									</div>
									<div class="col-md-3 col-xs-12 col-sm-4 column" id="rating-schedule" style="">
										<div id='rating' style="margin-left:50px;">
											<div class="inscore" style="margin-left:18px;"><div style="margin-top:-4px;" id="rating-value">{{$data->institute_rating}}</div></div><br>
											<span style="clear:both;position:relative"class="stars">{{$data->institute_rating}}</span>
										</div>
										<div style="margin-left:43px;margin-top:17px">Batch Schedule</div>
										<div class="alldays" style="margin-left:6px;">
										@foreach($days as $key => $day)
											<div id="{{$key}}" class="day"><div class="weekday">{{$day}}</div></div>
										@endforeach
										</div><br>
										<div class="edit_delete_buttons">
											<button onClick="moreBatches()" type="submit" class="btn btn-primary">Edit</button>
											<button onClick="moreBatches()" type="submit" class="btn btn-primary">Delete</button>
										</div>
									</div>
								</div>
							</div>
							<hr>
						</li>
		         @endforeach    
		    </ul>
		    <center><button onClick="moreBatches()" type="submit" name="update_results" class="btn btn-primary" id='loadmorebutton'>More Batches</button></center>
		</div>
		<div class="vendor_venue_list container">
			<div class="vendor_batches_title">
		   		<h1>My Venues</h1>
		   
		   	</div><br><br>
		   	<div class="col-md-3 col-xs-12 col-sm-12 column">
		   	</div>

		</div>
	</div>
@stop
@section('pagejquery')
<script type="text/javascript">
	var range = 0;
	displayList(0,1);
	var batchedCount = $("#vendor_batches_list li").length;
	function displayList(start,end)
	{
		var index = 0;
		$("#vendor_batches_list li").each(function () 
		{	
			if(index>=start && index<=end)
			{
				var test = $(this).attr('class');
				$('.'+test).fadeIn(1000);
			}
			index++;
		});
		range = end;
		if(range>=batchedCount)
		{
			$('#loadmorebutton').css('display','none');
		}
		
	}
	function moreBatches()
	{
		//alert(range);
		displayList(range,range+4);
	}
</script>
@stop
