@extends("Layouts.layout")
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
			<nav class="navbar navbar-inverse" id="vendorNavBar">
	    <div class="container-fluid">
		    <div class="navbar-header">
			    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#vendorNavbar">
			        <span class="icon-bar"></span>
			        <span class="icon-bar"></span>
			        <span class="icon-bar"></span>                
			    </button>
		    </div>
		    <div class="collapse navbar-collapse" id="vendorNavbar">
				<ul class="nav navbar-nav">
					<li ><a href="/institutes/1" >Institute Profile</a></li>
					<li class="active"><a href="">My Classes</a></li>
					<li><a href="/venues">My Venues</a></li>
				</ul>
		      	<ul class="nav navbar-nav navbar-right">
		        	<li><a href="#"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
		      	</ul>
		    </div>
		</div>
	</nav>
		<?php $days = array("day1" => "M","day2" => "T","day3" => "W", "day4" => "T","day5" => "F","day6" => "S","day7" => "S"); ?>
		<div class="container">
			<div class="col-md-1 col-xs-12 col-sm-12">
			</div>
			<div class="vendor_institute_batches col-md-10 col-xs-12 col-sm-12">
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
		         	<li class='batch{{$index}}' id='mybatch' style='display:none' >
			     		<div class="col-md-9 col-xs-12 col-sm-12 column">
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
		    <br><br>
		</div>
		</li>
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
