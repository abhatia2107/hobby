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
						 <center><button type="submit" class="btn btn-primary">Send Message</button></center>
					</div>
				 </form>
			</div>
		</div>
	</div>				
</div>
	<div class="home_vendor_page">
		@include('Templates.navbarVendor')
		<?php $days = array("day1" => "M","day2" => "T","day3" => "W", "day4" => "T","day5" => "F","day6" => "S","day7" => "S"); ?>
		<div class="container">
			<div class="col-md-1 col-xs-12 col-sm-1">
			</div>
			<div class="vendor_institute_batches col-md-10 col-xs-12 col-sm-11">
				<div class="vendor_batches_title">
					<button class="btn btn-primary"><a href="/batches/create">Add a Batch</a></button>
			   		<h1>My Batches</h1>
			   	</div><br><br>
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
		         		for($day = 0;$day<7;$day++)
						{
								$dayID = "batch_class_on_".$weekDays[$day];
								$daysResult[$day] = $data->$dayID;
						}
		         	?>
		         	<li class='batch{{$index}}' id='mybatch' style='display:none' >
			     		<div class="col-md-12 col-xs-12 col-sm-12 column">
							<div class="row clearfix">
								<div class="col-md-12 col-xs-12 col-sm-12 column">
									<div class="col-md-12 col-xs-12 col-sm-12 column">
										<div class="col-md-8 col-xs-12 col-sm-8 column">
											<span id="batch_name"> <a href="/batches/batchID">{{$data->batch}} </a> </span>
											<span class="inst_name">{{$data->institute}}</span>
										</div>
										<div class="col-md-4 col-xs-12 col-sm-4 column">
											<span id="tag-icon"><span class="glyphicon glyphicon glyphicon-tags"></span>{{$trial[$data->batch_trial]}}</span>	
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
										<div id="inst_contact"  onClick="show_contact({{$index}})" class="col-md-5 col-xs-12 col-sm-4 column"><div style="display:none;" id="contact{{$index}}"><span id="cell-icon" class="glyphicon glyphicon-phone-alt"></span>{{' '.$data->venue_contact_no}}</div>
											<div id="show_contact{{$index}}"><span id="cell-icon" class="glyphicon glyphicon-phone-alt"></span> View Phone Number</div>
										</div>
										<div href='#sendMessage' data-toggle='modal' data-batch="{{$data->batch}}" data-email="{{$data->venue_email}}" data-institute="{{$data->institute}}" id='inst_message' class='col-md-4 col-xs-12 col-sm-4 column'><i id='msg-icon' class='glyphicon glyphicon-envelope'></i> Send Message</div>
										<div id="inst_details" class="col-xs-12">
											<div id="inst_type" ><span id="hand-icon">☛</span>Type: {{$data->subcategory}}, {{$data->category}}</div>
											<div id="inst_price" ><span id="hand-icon">☛</span>Price:  ₹ {{$data->batch_price}}</div>
											<div id="inst_price"><span id="hand-icon">☛</span>Address: {{$data->locality}}, {{$data->location}}</div>
										</div>
									</div>
									<div class="col-md-3 col-xs-12 col-sm-4 column" id="rating-schedule" style="">
										<div id='rating' style="margin-left:50px;">
											<div class="inscore" style="margin-left:18px;"><div id="rating-value">{{$data->institute_rating}}</div></div><br>
											<span style="clear:both;position:relative"class="stars">{{$data->institute_rating}}</span>
										</div>
										<div style="margin-left:43px;margin-top:17px">Batch Schedule</div>
										<div class="alldays" style="margin-left:6px;">
										@foreach($days as $key => $day)
											<div id="{{$key}}" class="day">{{$day}}</div>
										@endforeach
										</div><br>
										<div class="edit_delete_buttons">
											<a href="/batches/edit/{{$data->id}}"><button onClick="" type="submit" class="btn btn-primary">Edit</button></a>
											<a href="/batches/disable/{{$data->id}}"><button onClick="" type="submit" class="btn btn-primary">Delete</button></a>
										</div>
									</div>
								</div>
							</div>
							<script type="text/javascript">
								var daysResult = <?php echo json_encode( $daysResult ) ?>;
								var index = "<?php echo $index; ?>";
								for(day=0;day<7;day++)
								{
									if(daysResult[day]==1)
									{
										$('.batch'+index+' #day'+(day+1)).css('opacity','1');
									}
								}	
							</script>
							<hr>
						</li>
		         @endforeach    
		    	</ul>
		    <center><button onClick="moreBatches()" type="submit" name="update_results" class="btn btn-primary" id='loadmorebutton'>More Batches</button></center>
		    <br><br>
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
</script>
@stop
