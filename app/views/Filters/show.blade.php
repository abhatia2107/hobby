@extends('Layouts.layout')
@section('content')
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
						 <input type="text" class="form-control" name='msgInputName' id='MsgInputName' placeholder='Enter Your Name' required='required'/>
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
<div class="container">
	<div class="row">
		<div class="col-md-12 col-xs-12 col-sm-12">
			<!--<ul class="breadcrumb" style="background:white;">
				<li>
					<a href="/">Home</a>
				</li>
				<li>					
					@if($category_id==0)
						<a href="javascript:void()">All</a>
					@else
						<a href="javascript:void()">{{$categories[$category_id-1]->category}}</a>
					@endif
				</li>
				<li></li>
			</ul> -->
			<div class="row">
				<!--Start of filter division -->
				<div class="col-md-3 col-xs-12 col-sm-3" style="margin-top:15px">
					<!--<span id='filter-tittle-name'>Filter By</span>-->
					<div id="browse-filter" class="filter-option-1 filterOption">	
						<div class="filterTitle">Sub Categories</div>
						<div class="filterOptionsList">
							<ul class="list-unstyled filters" valuelimit="" keepcollapsed="" displaytype="" nofilter="" id="filter-sub"> 	
								@foreach ($subcategoriesForCategory as $subcategoryData)
									<?php
										$subcategory = $subcategoryData->subcategory;
										$sub_id = $subcategoryData->id;
									?>				
									<li subcategory="{{$sub_id}}" >								
									 	 <label class="sub"><input autocomplete="off" value="{{$sub_id}}" type="checkbox" class="SubCheckbox filterCheckBox" /><span class="checkbox_data">{{' '.$subcategory}}</span></label>
									</li>
								 @endforeach
							 </ul>
						</div>
					</div>			
					<div id="browse-filter" class="filter-option-2 filterOption">	
						<div class="filterTitle">Locality</div> 
						<div class="filterOptionsList">
							<ul class="list-unstyled filters" valuelimit="" keepcollapsed="" displaytype="" nofilter="" id="filter-sub"> 
								@foreach ($localitiesForLocation as $localityData)
									<?php 
										$locality = $localityData->locality;
										$loc_id = $localityData->id;
									?>
									<li subcategory="{{$loc_id}}" >								
									 	 <label class="sub"><input autocomplete="off" style="" value="{{$loc_id}}" type="checkbox" class="LocCheckbox filterCheckBox" /><span class="checkbox_data">{{' '.$locality}}</span></label>
									</li> 
								@endforeach
							 </ul>
							</div>
					</div>				
				</div>
				<div class="col-md-9 col-xs-11 col-sm-9 results-container" style="margin-top:30px;" >
					<ul class="list-unstyled" valuelimit="" style="" keepcollapsed="" displaytype="" nofilter="" id="filter_data"> 
					</ul>
					<div id="loadMore" class='resultsMessage'><img height="30px" width="30px" src="/assets/images/filter_loading.gif"> Loading More Results</div>
					<div id="noResults" class='resultsMessage' >No More results to display.</div>
				</div><!--end of results info -->
			</div>
		</div>
	</div>
</div>
@foreach ($batchesForCategoryLocation as $index => $batchesData)	
		<?php $Schedules[$index] = $batchesData->schedules ?>
@endforeach
@stop
@section('pagejquery')
	<script type="text/javascript">
		var result = {{json_encode( $batchesForCategoryLocation ) }};  
		var Schedules = {{json_encode( $Schedules ) }};
		var trials = {{json_encode( $trial )}};
		var weekDays = ["monday", "tuesday", "wednesday","thursday","friday","saturday","sunday"];
		var daysResult = new Array();			
		var categoryId = "{{$category_id}}";
		var locationId = "{{$location_id}}";
		var range = 10;
		var filterRestultCount = 0;
		var filterStatus=false;
		var loadFilters = false;
		var chunk = 1;
		var resultCount = 0;
		var sub_select = new Array();
		var loc_select = new Array();
		var filter_select = new Array();
		var trial_select = new Array();
		navActive('NavItem'+categoryId);
		if(result.length==0)	
		{
			$('#loadMore').css('display','none');
			$('#noResults').css('display','block');
		}
		/*function multiScheduleAdder(batchIndex,scheduleIndex,Schedule)
		{
			for(var day = 0;day<7;day++)
			{
				var dayID = "schedule_class_on_"+weekDays[day];
				daysResult[day] = Schedule[dayID];
			}
			var PriceScheduleContainer = $('.batch'+batchIndex+' #price_schedule_container'),baseUrl;
			var DayCode = ["","M", "T", "W","T","F","S","S"];
			var Price = Schedule['schedule_price'];
			var sessionMonthCount = Schedule['schedule_number'];
			var indentifySessionMonth = Schedule['schedule_session_month'];
			var seperator = " / ";
			var sessionMonth = " Sessions";
			if(sessionMonthCount==1)
				sessionMonth = " Session";
			if(indentifySessionMonth==1)
			{
				sessionMonth = " Months";
				if(sessionMonthCount==1)
					sessionMonth = " Month";
			}
			if(sessionMonthCount==0)
			{
				sessionMonth = "";
				seperator = "";
				sessionMonthCount = "";
			}
			var ContainerDistinct = $(".batch"+batchIndex+" #price_schedule"+scheduleIndex);
			ContainerDistinct.remove();
			$("<div></div>")
			.attr("class","col-md-12 col-xs-12 col-sm-12 row")
			.append
			(
				$("<div></div>")
				.attr("id","price_schedule"+scheduleIndex)
				.attr("class","price_schedule")
				.append
				(
					$("<div></div>")
					.attr("class","col-md-6 col-xs-12 col-sm-6 column")
					.append
					(
						$("<div></div>")
						.attr("class","col-md-12 col-xs-12 col-sm-12 column")
						.attr("id","schedulePrice")
					)
				)
				.append
				(
					$("<div></div>")
					.attr("class","col-md-6 col-xs-12 col-sm-6 column")
					.append
					(
						$("<div></div>")
						.attr("id","scheduleWeekDays")		
					)
					
				)
			)
			.appendTo(PriceScheduleContainer);
			var ScheduleContainer = $(".batch"+batchIndex+" #price_schedule"+scheduleIndex+" #scheduleWeekDays");
			var PriceContainer = $(".batch"+batchIndex+" #price_schedule"+scheduleIndex+" #schedulePrice");
			$("<span></span>")
			.attr("id","")
			.append
			(
				$("<span></span>")
				.attr("id","hand-icon")
				.text("☛")
			)
			.append
			(
				$("<span></span>")
				.text("Price: ₹ "+Price+seperator+sessionMonthCount+sessionMonth)
			)
			.appendTo(PriceContainer);
			for(var day=1;day<=7;day++)
			{
				$("<div></div>")
				.attr("id","day"+day)
				.attr("class","day")
				.text(DayCode[day])
				.appendTo(ScheduleContainer);
			}
			$("<div></div>")
			.attr("id","horizontalLine")
			.append("")
			.appendTo(PriceScheduleContainer);
			for(var day=0;day<7;day++)
			{
				if(daysResult[day]==1)
				{
					$(".batch"+batchIndex+" #price_schedule"+scheduleIndex+" #scheduleWeekDays"+" #day"+(day+1)).css('opacity','1');
				}
			}
		}*/
		function LoadResult(start,end)
		{
			var index = 0;
			$("#filter_data li").each(function () 
			{	
				if(index>=start && index<=end)
				{
					var test = $(this).attr('class');
					$('.'+test).fadeIn(100);
				}
				index++;
			});
			range = end;
			if(range>index) range=index;
			return index;
		}
		displayResults(result,0);
		LoadResult(0,20);
		function LoadFilterResults(sub_select,loc_select,trial_select,start)
		{
			resultRange = result.length;
			if(sub_select.length==0)
				sub_select=0;
			if(loc_select.length==0)
				loc_select=0;
			if(trial_select.length==0)
				trial_select =0;
			//alert("sub = "+sub_select+"loc = "+loc_select+"trial = "+trial_select);
			$.get("/filter/"+sub_select+"/"+loc_select+"/"+trial_select+"/"+categoryId+"/"+locationId+"/"+chunk,function(response)
			{
				chunk++;
				loadFilters = true;	
				//alert(response);
				if(response == "Empty")
				{
					$('#loadMore').hide();
					$('#noResults').show();
				}
				else
				{
					for (var index=0; index<response.length; index++)
					{
						result[index+resultRange] = response[index];
					}
					displayResults(result,start);
					var count  = LoadResult(start,start+20);
					if(count<10)
					{
						LoadFilterResults(sub_select,loc_select,trial_select,0);
					}
				}
			});
		}
		function displayResults(results,start)
		{
			var linksContainer = $('#filter_data'),baseUrl;
			for (var index=start; index<results.length; index++)
			{
			   	var institute = results[index]['institute'];
			   	var institute_id =  results[index]['batch_institute_id'];
			   	var institute_photo_path = '/assets/images/institute/institute.gif';
			   	var institute_photo_exists = results[index]['institute_photo'];
			   	if(institute_photo_exists==1)
			   	{ institute_photo_path = "/assets/images/institute/"+institute_id+".jpg";}
				var batch = results[index]['batch'];
				var batchID= results[index]['id'];
				var price = results[index]['batch_single_price'];
				var subcategory = results[index]['subcategory'];
				var category =  results[index]['category'];
				var location_name = results[index]['location'];
				var locality =results[index]['locality'];
				var tagline =results[index]['batch_tagline'];
				var subcategoryID = results[index]['batch_subcategory_id'];
				var localityID = results[index]['venue_locality_id'];
				var email = results[index]['venue_email'];
				var contact = results[index]['venue_contact_no'];
				var trialID = results[index]['batch_trial'];
				var institute_rating = results[index]['institute_rating'];
				var landmark = results[index]['venue_landmark'];
				var address = results[index]['venue_address'];
				var venue_email = results[index]['venue_email'];
				address = address.replace(/\n/g," ");			
				$("<li style='display:none'></li>")
				.attr("subcategory",subcategoryID)
				.attr("locality",localityID)
				.attr("class","batch"+index)
				.attr("id","batchInfo")
				.append
				(
					$("<div></div>")
					.attr("class","row clearfix batch")
					.append
					(		
						$("<div></div>")
						.attr("class","col-md-12 col-xs-12 col-sm-12 column")
						.append
						(
							$("<div></div>")
							.attr("class","row clearfix batch")
							.append
							(
								$("<div></div>")
								.attr("class","col-md-12 col-xs-12 col-sm-12 column")
								.append
								(
									$("<div></div>")
									.attr("class","col-md-8 col-xs-12 col-sm-8 column")
									.append
									(
										$("<span></span>")
										.attr("id","batch_name")
										.append
										(
											$("<a></a>")
											.prop("href","/batches/show/"+batchID)
											.text(institute)
										)									
									)
									.append
									(
										$("<span></span>")
										.attr("class","inst_name")
										.text(batch)
									)	
								)
								.append
								(
									$("<div></div>")
									.attr("class","col-md-4 col-xs-12 col-sm-3 column")
									.append
									(
										$("<div></div>")
										.attr("class","col-md-12 facilities_title")
										.text(" ")
									)
								)
								/*.append
								(
									$("<div></div>")
									.attr("class","col-md-4 col-xs-12 col-sm-3 column")
									.attr("id","rating-schedule")								
									.append
									(
										$("<div></div>")
										.attr("class","col-md-12")
										.attr("id","ratingCircle")		
										.append
										(
											$("<div></div>")
											.attr("class","inscore col-md-8 col-xs-12 col-sm-3 column")									
											.append
											(
												$("<div></div>")										
												.attr("id","rating-value")
											)
											.text(institute_rating)
										)
										.append
										(
											$("<span></span>")
											.attr("class","stars")
											.attr("id","starsValue")
											.text(institute_rating)	
										)
																													
									)
								)*/
								/*.append
								(
									$("<div></div>")
									.attr("class","col-md-4 col-xs-12 col-sm-4 column")
									.append
									(
										$("<span></span>")
										.attr("id","tag-icon")							
										.append
										(
											$("<span></span>")
											.attr("class","glyphicon glyphicon glyphicon-tags")	
										)
										.append
										(
											$("<span></span>")
											.text(trials[trialID])
										)																	
									)
								)*/
							)
						)
					)
				)
				.append
				(
					$("<div></div>")
					.attr("class","row clearfix batch")
					.append
					(
						$("<div style='margin-top:10px'></div>")
						.attr("class","")
						/*.append
						(
							$("<div></div>")
							.attr("class","col-md-3 col-xs-12 col-sm-12 column")
							.append
							(
								$("<center></center>")
								.append
								(
									$("<img/>")
									.prop("src",institute_photo_path)
									.attr("class",'institute-profile-pic')
								)
							)
						)*/
						.append
						(
							$("<div></div>")
							.attr("class","col-md-12 col-xs-12 col-sm-12 batchDetailsAndPrice")
							.append
							(
								$("<div></div>")
								.attr("class","col-md-8 col-xs-12 col-sm-8")
								.append
								(
									$("<div></div>")
									.attr("class","col-md-5 col-xs-12 col-sm-6 column")
									.attr("id","inst_contact")
									.attr("onClick","show_contact("+index+")")
									.append
									(
										$("<span></span>")
										.attr("id","cell-icon")
										.attr("class","glyphicon glyphicon-phone-alt")
									)
									.append
									(
										$("<span style='display:none'></span>")
										.attr("id","contact"+index)
										.attr("value",batchID)
										.text(" "+contact)									
									)
									.append
									(
										$("<span></span>")
										.attr("id","show_contact"+index)
										.text(" View Number")								
									)
								)
								.append
								(
									$("<div></div>")
									.attr("class","col-md-5 col-xs-12 col-sm-6 column")
									.attr("id","inst_message")
									.attr("href","#sendMessage")
									.attr("data-toggle","modal")
									.attr("data-batch",batch)
									.attr("data-email",email)
									.attr("data-institute",institute)
									.append
									(
										$("<span></span>")
										.attr("id","cell-icon")
										.attr("class","glyphicon glyphicon-envelope")
									)
									.append
									(
										$("<span></span>")
										.text(" Send Message")
									)
								)								
								.append
								(
									$("<div></div>")
									.attr("class","row")
									/*.append
									(
										$("<div></div>")
										.attr("id","inst_type")
										.append
										(
											$("<span></span>")
											.attr("id","hand-icon")
											.text("☛")
										)
										.append
										(
											$("<span></span>")											
											.text("Type: "+subcategory+", "+category+".")
										)
									)*/
									.append
									(
										$("<div></div>")
										.attr("id","inst_type")
										.attr("title",locality+", "+landmark+", "+address)	
										.attr("class","col-md-9 col-xs-12 col-sm-9")								
										.append
										(
											$("<span></span>")
											.attr("id","hand-icon")
											.attr("class","glyphicon glyphicon-map-marker")
										)
										.append
										(
											$("<span></span>")																					
											.text(locality+", "+landmark+", "+address)
										)
									)
									.append
									(
										$("<div></div>")
										.attr("id","inst_price")									
										.attr("class","col-md-12 col-xs-12 col-sm-12")								
										.append
										(
											$("<span></span>")
											.attr("id","hand-icon")
											.attr("class","glyphicon glyphicon-time")
										)
										.append
										(
											$("<span></span>")																					
											.text("Mon-Sat: 5am-6pm")
										)
									)
								)
							)
							.append
							(
								$("<div></div>")
								.attr("class","col-md-4 col-xs-12 col-sm-4")
								.attr("class","singleSessionPrice")								
								.append
								(
									$("<div></div>")								
									.text("₹ "+price+" / Session")
									/*.append("<br>(or Members: 1 credit)")*/
								)
								.append
								(
									$("<a></a>")
									.attr("class","btn btn-primary")
									.attr("id","booknowButton")	
									.attr("href","/bookings/create/"+batchID)							
									.text("Book Now")
								)
							)												
							/*.append
							(
								$("<div></div>")
								.attr("class","row")
								.attr("id","price_schedule_container")																												
							)*/
						)
					)
				)
				.appendTo(linksContainer);
				/*for(var I=0; I<Schedules[index].length && I<2; I++)
				{
					
					var Schedule = Schedules[index][I];
					multiScheduleAdder(index,I,Schedule);
				}				
				if(Schedules[index].length>2)						
				{
					var ScheduleContainer = $(".batch"+index+" #price_schedule1 #scheduleWeekDays");
					$("<a></a>")
					.attr("id","moreScheduleButton")
					.attr("class","glyphicon glyphicon-plus")
					.attr("title","More Schedules")
					.prop("href","/batches/show/"+batchID)
					.appendTo(ScheduleContainer);
					//moreScheduleButton();
				}*/
		    }
		  	$('span.stars').stars();
		}
		//triggered when modal is about to be shown
		$('#sendMessage').on('show.bs.modal', function(e) 
		{
		    //get data-id attribute of the clicked element
		    var batch = $(e.relatedTarget).data('batch');
		    var email = $(e.relatedTarget).data('email');
		    var institute = $(e.relatedTarget).data('institute');
		    //populate the textbox
		    $(e.currentTarget).find('input[name="batch"]').val(batch);
		    $(e.currentTarget).find('input[name="email"]').val(email);
		    $(e.currentTarget).find('input[name="institute"]').val(institute);
		});
		$(document).ready(function() 
		{
			$('[data-toggle="popover"]').popover(); 
			var linksContainer = $('#filter_data'),baseUrl;
			window.onscroll = function(ev)
			{
				var height = $(document).height();  
	            if($(window).scrollTop() + $(window).height() > height-250) 
				{
					resultRange = result.length;
					if(range>=resultRange)
					{
						if(!filterStatus)
						{
							$.get("/filter/categories/"+categoryId+"/locations/"+locationId+"/chunk/"+chunk,function(response)
							{
								//alert(response);
								if(response == "Empty")
								{
									$('#loadMore').css('display','none');
									$('#noResults').css('display','block');
								}
								else
								{
									for (var index=0; index<response.length; index++)
									{	
										result[index+resultRange] = response[index];	
									}
									displayResults(result,resultRange);	
									LoadResult(range,range+10);
								}
								chunk++;	
							});
						}
						if(filterStatus)
						{							
							LoadFilterResults(sub_select,loc_select,trial_select,resultRange);
						}
					}
					else
					{	
						LoadResult(range,range+10);	
					}
				}
			}
			$("#filter-sub input").click(function () 
			{		
				filterStatus = true;
				$('#loadMore').show();
				$('#noResults').hide();
				result = [];				
				filter_select = $('.filterCheckBox:checked').map(function(){return this.value;}).get();			
				if(filter_select.length>0)
				{
					$(linksContainer).empty();
					sub_select = $('.SubCheckbox:checked').map(function(){return this.value;}).get();
					loc_select = $('.LocCheckbox:checked').map(function(){return this.value;}).get();
					trial_select =  $('.trialCheckbox:checked').map(function(){return this.value;}).get(); 					
					chunk = 0;
					LoadFilterResults(sub_select,loc_select,trial_select,0);					
				}
				else
				{
					//chunk = 0;
					location.reload(true);
					/*$.get("/filter/categories/"+categoryId+"/locations/"+locationId+"/chunk/"+chunk,function(response)
					{						
						if(response == "Empty")
						{
							$('#loadMore').css('display','none');
							$('#noResults').css('display','block');
						}
						else
						{
							for (var index=0; index<response.length; index++)
							{	
								result[index] = response[index];	
							}
							displayResults(result,0);	
							LoadResult(0,20);
						}
						chunk++;	
					});*/
				}				
			});			
		});
	</script>
@stop