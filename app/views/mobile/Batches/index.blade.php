@extends("Layouts.layout")
@section("content")
<div class="modal fade" id="sendMessage" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" id='close_model' class="close" data-dismiss="modal" aria-hidden="true">×</button>
					Send Message To Institute
			</div>
			<div class="modal-body">
				<form action="/batches/sendMessage" method="post" enctype="multipart/form-data" role="form">
					<input type="hidden" name="csrf_token" value="{{csrf_token()}}">
					<input type="hidden" name="batch">
					<input type="hidden" name="email">
					<input type="hidden" name="institute">

					<div class="form-group inner-addon" >
						 <i class="glyphicon glyphicon-user left-addon"></i>
						 <input type="text" class="form-control" style="padding:0px 0px 0px 30px; " name='msgInputName' id='MsgInputName' placeholder='Enter Your Name' required='required'/>
					</div>
					<div class="form-group inner-addon">
						<i class="glyphicon glyphicon-envelope left-addon"></i>
						 <input type="email" class="form-control" name='msgInputEmail' id='MsgInputEmail'  placeholder='Enter Your E-Mail Address' required='required'/>
					</div>
					<div class="form-group inner-addon">
						<i class="glyphicon glyphicon-phone left-addon"></i>
						 <input type="phone" class="form-control" name='msgInputNumber' id='MsgInputPhone'  placeholder='Enter Your Mobile Number' required='required'/>
					</div>
					<div class="form-group">
					  <label for="comment">Message:</label>
					  <textarea class="form-control" rows="3" name='msgInputMessage' id="comment"></textarea>
					</div>
					<div class="modal-footer">
						 <button type="submit" class="btn btn-primary">Send Message</button>
					</div>
				 </form>
			</div>
		</div>
	</div>				
</div>
<div class="home_vendor_page">
	@include('Templates.navbarVendor')
	<?php $days = array("day1" => "M","day2" => "T","day3" => "W", "day4" => "T","day5" => "F","day6" => "S","day7" => "S"); ?>
	<div class="container" id="vendor_institute_batches">
		<div class="col-md-1 col-xs-12 col-sm-1"></div>
		<div class="vendor_institute_batches col-md-10 col-xs-12 col-sm-11">
			<div class="vendor_batches_title col-md-12 col-xs-12 col-sm-12">					
				<div class="col-md-4 col-sm-2 col-xs-12"></div> 
				<div id="batches_title" class="col-md-4 col-xs-12 col-sm-6">
		   			My Batches
		   		</div>
		   		<div id="addButton" class="col-md-4 col-xs-12 col-sm-4">
		   			<a href="/batches/create"><button class="btn btn-primary">Add a Batch</button></a>
		   		</div>
		   	</div>
		   	<ul class="list-unstyled" id="vendor_batches_list" >
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
	         		$weekDays = array("monday", "tuesday", "wednesday","thursday","friday","saturday","sunday");
	         		$daysResult = array();
	         		$aprovedStatus =  array("Pending ","Approved");
	         		$aprovedValue = $data->batch_approved;
	         	?>
	         	<li class='batch{{$index}}' id='mybatch' style='display:none' >
	         		<div class="row">
	     				<div class="col-md-8 col-xs-12 col-sm-7" id="batch_status">		
	     					<div class="col-md-12 col-xs-12 col-sm-8 col-md-offset-3 col-sm-offset-1">     					
		     				<span id="batch_status_result{{$aprovedValue}}" class="btn" >Batch Status: {{$aprovedStatus[$aprovedValue]}}</span>			     						
		     				</div>
		     			</div>
		     			<div class="col-md-4 col-xs-12 col-sm-5">
								<span id="tag-icon"><span class="glyphicon glyphicon glyphicon-tags"></span><span class="trail_avail">{{$trial[$data->batch_trial]}}</span></span>	
						</div>	
		     		</div>
		     		<div class="col-md-12 col-xs-12 col-sm-12 column">
						<div class="row">
							<div class="col-md-12 col-xs-12 col-sm-12 column">
								<div class="col-md-12 col-xs-12 col-sm-12 column">
									<div class="col-md-8 col-xs-12 col-sm-7 column">
										<span id="batch_name"><a href="/batch/{{$data->id}}">{{$data->batch}} </a></span>
										<span class="inst_name">{{$data->institute}}</span>
									</div>
									<div class="col-md-4 col-xs-12 col-sm-5 edit_delete_buttons">
										<a class="glyphicon glyphicon-edit" title="Edit Details" href="/batches/edit/{{$data->id}}"></a>
										<a class="glyphicon glyphicon-trash"  title="Delete Batch" href="/batches/disable/{{$data->id}}"></a>
									</div>									
								</div>
							</div>
						</div>
						<div class="row clearfix batch">
							<div class="col-md-12 col-xs-12 col-sm-12 column" style="margin-top:20px">
								<div class="col-md-3 col-xs-12 col-sm-12 column">
									<center><img src="{{$institute_photo_path}}" class="institute-profile-pic"></center>
								</div>
								<div class="col-md-9 col-xs-12 col-sm-12 column">
									<div class="col-md-7 col-xs-12 col-sm-9 column">
										<div id="inst_contact"  onClick="show_contact({{$index}})" class="col-md-5 col-xs-12 col-sm-4 column"><div style="display:none;" id="contact{{$index}}"><span id="cell-icon" class="glyphicon glyphicon-phone-alt"></span>{{' '.$data->venue_contact_no}}</div>
											<div id="show_contact{{$index}}"><span id="cell-icon" class="glyphicon glyphicon-phone-alt"></span> View Number</div>
										</div>
										<div href='#sendMessage' data-toggle='modal' data-batch="{{$data->batch}}" data-email="{{$data->venue_email}}" data-institute="{{$data->institute}}" id='inst_message' class='col-md-4 col-xs-12 col-sm-4 column'><i id='msg-icon' class='glyphicon glyphicon-envelope'></i> Send Message</div>
										<div id='inst_session_price' style='padding-top:4px' class='col-md-4 col-xs-12 col-sm-4 column'>{{'₹'.$data->batch_single_price.' / Session'}}</div>
										<div id="inst_details" class="col-xs-12">
											<div id="inst_type" ><span id="hand-icon">☛</span>Type: {{$data->subcategory}}, {{$data->category}}</div>												
											<div id="inst_price"><span id="hand-icon">☛</span>Address: {{$data->locality}}, {{$data->location}}</div>
										</div>
									</div>
									<div class="col-md-5 col-xs-12 col-sm-3 column" id="rating-schedule">
										<div class="col-md-12">
											<div class="inscore col-md-8 col-xs-12 col-sm-3 column">
												<div id="rating-value">{{$data->institute_rating}}</div>
											</div>
											<span id="starsValue" class="stars">{{$data->institute_rating}}</span>
										</div>											
									</div>
									<?php $MyBatchSchedules = $data->schedules;?>
									<div class="row" id="price_schedule_container">
										@foreach($MyBatchSchedules as $scheduleIndex => $Schedule)
										<div class="col-md-12 col-xs-12 col-sm-12 row" @if($scheduleIndex==0) style="margin-top:-10px !important" @endif >								
											<?php
												$Price = $Schedule->schedule_price;
												$sessionMonthCount = $Schedule->schedule_number;
												$indentifySessionMonth = $Schedule->schedule_session_month;
												$seperator = " / ";
												$sessionMonth = " Sessions";
												if($sessionMonthCount==1)
													$sessionMonth = " Session";
												if($indentifySessionMonth==1)
												{
													$sessionMonth = " Months";
													if($sessionMonthCount==1)
														$sessionMonth = " Month";
												}
												if($sessionMonthCount==0)
												{
													$sessionMonth = "";
													$seperator = "";
													$sessionMonthCount = "";
												}
												for($day = 0;$day<7;$day++)
												{
														$dayID = "schedule_class_on_".$weekDays[$day];
														$daysResult[$day] = $Schedule->$dayID;
												}
											?>
											<div class="price_schedule" id="price_schedule{{$scheduleIndex}}">
												<div class="col-md-6 col-xs-12 col-sm-6 column" >
													<div class="col-md-12 col-xs-12 col-sm-12 column" style="margin-top:5px;"id="schedulePrice">
														<span id="hand-icon">☛</span>Price: ₹ {{$Price.$seperator.$sessionMonthCount.$sessionMonth}}
													</div>
												</div>
												<div class="col-md-6 col-xs-12 col-sm-6 column">
													<div style="margin-top:1px;" id="scheduleWeekDays">
														<div class="alldays" style="margin-left:6px;">
														@foreach($days as $key => $day)
															<div id="{{$key}}" class="day">{{$day}}</div>
														@endforeach
														</div>
													</div>
												</div>
											</div>
											<script type="text/javascript">
												var daysResult = <?php echo json_encode( $daysResult ) ?>;
												var index = "<?php echo $index; ?>";
												var scheduleIndex = <?php echo $scheduleIndex; ?>;
												for(day=0;day<7;day++)
												{
													if(daysResult[day]==1)
													{
														$(".batch"+index+" #price_schedule"+scheduleIndex+" #scheduleWeekDays"+" #day"+(day+1)).css('opacity','1');
													}
												}	
											</script>										
										</div>
										@endforeach
									</div>										
									<div class="row" style="margin-top:-10px">
										<div class="col-md-2 col-sm-4 col-xs-0"></div> 
										<div class="col-md-4 col-xs-12 col-sm-5 column" id="rating-schedule">											
								
										</div>
									</div>
								</div>
								
							</div>
						</div>
						<hr>
					</li>
	         @endforeach    
	    	</ul>
	    <div id='loadmorebutton'><button onClick="moreBatches()" type="submit" name="update_results" class="btn btn-primary">More Batches</button></div>
	    
	</div>
</div>
@stop
@section('pagejquery')
<script type="text/javascript">
	var range = 0;
	displayList(0,1);	
	function displayList(start,end)
	{
		var batchCount = $("#vendor_batches_list li").length;
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
		if(range>=batchCount)
		{
			$('#loadmorebutton').css('display','none');

		}

	
		//triggered when modal is about to be shown
		$('#sendMessage').on('show.bs.modal', function(e) {

		    //get data-id attribute of the clicked element
		    var batch = $(e.relatedTarget).data('batch');
		    var email = $(e.relatedTarget).data('email');
		    var institute = $(e.relatedTarget).data('institute');
		    //populate the textbox
		    $(e.currentTarget).find('input[name="batch"]').val(batch);
		    $(e.currentTarget).find('input[name="email"]').val(email);
		    $(e.currentTarget).find('input[name="institute"]').val(institute);
		});
			
	}
	function moreBatches()
	{
		//alert(range);
		displayList(range,range+4);
	}
	$(function() 
   	{
   	  $('span.stars').stars();
   	});
	 navActive('navbar-vendor-batches');
</script>
@stop
