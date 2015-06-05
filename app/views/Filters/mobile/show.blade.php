@extends('Layouts.mobile.layout')
@section('content')
<style type="text/css">

	.filterOption { box-shadow: 0px 0px 2px rgba(0,0,0,0.5);-moz-box-shadow: 0px 0px 2px rgba(0,0,0,0.5);
		-webkit-box-shadow: 0px 0px 2px rgba(0,0,0,0.5);background: white;
	}

	.filterTitle { color:white;font-family: 'Open Sans',sans-serif;font-size: 20px;padding: 0px 5px;
		background:#3396d1;height: 30px;
	}

	.filterOptionsList { padding: 5px 2px 0px 5px;border:1px solid;border-top:0px solid;border-color:#3396d1; }	

	#batchInfo {   
	  background: white;border:0px solid;margin-bottom:  5px;border-color: skyblue;-webkit-box-shadow: 0px 3px 0px -2px #0099FF;
	  box-shadow: 0px 3px 0px -2px #0099FF;color: #333;font-family: 'Open Sans',sans-serif; font-size: 15px;font-weight: 100;
	}

	#filter_data {  box-shadow: 0px 0px 4px #3366CC;-moz-box-shadow: 0px 0px 4px #3366CC;-webkit-box-shadow: 0px 0px 4px #3366CC;
	  margin-bottom: 20px; padding: 0px 5px 0px 5px;color: #333; font-family: 'Open Sans',sans-serif;font-size: 15px;
	}

	#batch_name { font-size: 16px; font-weight: bold; color: #0033CC;  float: left;   }

	#batch_name a {   text-decoration: none;  }

	#inst_tagline { font-size: 12px;  font-weight: normal; color: #333; }

	.facilities_title {color: #333;font-size: 14px;}

	.inst_name  {  font-size: 14px; font-weight: normal; color: #333; clear: both; float: left; }

	.filters  {  max-height: 130px;min-height: 130px; overflow: auto; color: #333;padding: 0px; }

	#browse-filter   {  font-family: 'Open Sans',sans-serif; font-weight: lighter;   }

	#browse-filter label {font-weight: lighter;}

	.filter-option-2  {  margin-top: 20px;  font-weight: normal;   }	

	.filter-option-1   {  margin-top: 15px; font-weight: normal;   }

	.sub {  cursor: pointer; }

	#fiter-text { font-weight: lighter;  margin-top: -17px; margin-left: 16px;  }

	.resultsMessage { font-size:20px;  background: lightgray;  height: 40px;  padding:5px; text-align: center;  }

	#noResults {  display: none;  }

	.location-icon  { width:12px;height: 17px;margin-top: -4px;margin-right: 5px; }

	#inst_contact { 
	  border: 1px solid;padding:3px 3px 3px 3px;border-color: #0099FF;border-radius: 4px;float:left;text-align: center;
	  margin-right:3px;margin-top: 7px;font-size: 13px;height: 26px;min-width: 105px;max-width: 105px;
	}

	.batchDetailsAndPrice { margin-bottom: 10px;font-size: 13px; }

	#inst_session_price { 
	  border: 1px solid;padding:3px 3px 3px 3px;border-color: #0099FF;height: 26px;border-radius: 4px;float: left;text-align: center;
	  margin-right:5px;margin-top: 2px;font-size: 0.85em;max-width:94px;min-width: 94px;background-color:  #E0FFD6;font-weight: bold;
	}

	#inst_contact:hover { background: #E8E8E8; cursor: pointer; }
	
	#rating-schedule { margin-top: 5px;}

	#ratingCircle { margin-left: 6%}

	.rating_starts  { clear:both;color: #FF8000;margin-top:0px;  }

	#rating { margin-top: -6px; margin-left: 42px;  }

	#rating-tittle, .singleSessionPrice  { text-align: center; float:left; margin: 0px;font-size: 14px;padding: 0px; }

	.singleSessionPrice .btn-primary {height: 22px;margin-top: 2px;padding: 1px 7px;border-radius: 0px;background: #0099FF;border:0px;}

	#inst_type  { margin-top: 5px;display:inline-block;white-space:nowrap;overflow:hidden !important;text-overflow: ellipsis;}

	#inst_price { margin-top: 2px; }

	#tag-icon { float:left; font-weight: bolder;font-size: 18px;text-align: right;margin-top: 10px;}

	#tag-icon .glyphicon  { color: #0099FF; font-size: 18px;  margin-right: 9px;  }

	#hand-icon  { color: #0099FF; margin-right: 5px;  }

	#cell-icon  { color: #0099FF; font-size: 0.9em; }

	#msg-icon { color: #0099FF; font-size: 0.9em; }
	
	#contact  { display: none;  }
	
	#inst_details { margin-top: 7px;margin-bottom: 10px;  }

	#batch-schedule { margin-top: -2px;text-align: center;  }

	#batch-schedule-title {text-align: left;margin-top: 7px;}

	#starsValue { clear:both;position:relative;}

	.price_for_single_class {margin-top: 12px !important;}

	#price_schedule_container {
	    border-top: 0px dotted;border-bottom: 0px solid;margin-bottom: 7px;margin-top: 3px;padding-bottom: 5px;
	}

	#schedulePrice,#scheduleWeekDays { margin-top: 4px }

	#close_model:hover { color: black }

	#filter-tittle-name { font-family: 'Open Sans',sans-serif; font-size: 18px; color: gray; margin-left: 10%}

	.breadcrumb { background: white; font-family: 'Open Sans',sans-serif;margin: 0px; }

	#results-container {margin-top: 0px;}

	.fileter_options_popup {display: none;margin:0px;position: fixed;top: 0;left: 0;right: 0;bottom 0;
		z-index: 10000000;background:white;/*#f0f3f6*/height: 100%;padding: 0px;
	 }

	.fileter_options_popup .header {background:#5a5a5a;font-size: 20px;text-align: center;width: 100%;padding: 10px;color: white; }

	.fileter_options_popup .header a {color: white;text-decoration: none;position: absolute;left: 5px;top:15px;}

	.fileter_options_popup .footer {bottom:0;position: absolute;text-align: center;color: white;padding: 0px 0px;}

	.fileter_options_popup .reset_button {background: #5a5a5a;padding: 10px 0px}

	.fileter_options_popup .apply_button {background: #3aa54c;padding: 10px 0px}

	.fileter_options_container {padding: 0px 30px;}

	.fileter_options_popup .footer a {color: white;text-decoration: none;font-size: 16px;}

	.filter_options_button { bottom:0;position: fixed;z-index: 1000000;width: 100%;background:rgba(0,0,0,0.7);text-align: center; height: 34px;left:0;right:0;}

	.filter_options_button button {border-radius:0px;padding: 5px 15px;font-size: 17px;background:#0099FF;border:0px; }

	.filter_page_container {width: 100%;padding: 0px;}

	.filter_page_container .alert {
	  margin: 0px;width: 100%;border-radius: 0px;padding: 10px;
	}

	.filter_page_container .alert a{
	  color: green;font-weight: bold;
	}

</style>
<div class="container filter_page_container">
	<div class="alert alert-success alert-dismissable">
		 <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
		<h4><a href="/Membership">Hobbyix Membership</a></h4>
		<strong>Buy Membership and get access to all the</strong>
	</div>
</div>
<div class="container">
	<div class="row">
		<div class="col-xs-12">			
			<div class="row">
				<!--Start of filter division -->
				<div class="col-xs-12 fileter_options_popup">
					<!--<span id='filter-tittle-name'>Filter By</span>-->
					<div class="header"><a class="glyphicon glyphicon-arrow-left" id="return"></a> Filter </div>
					<div class="fileter_options_container">
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
					<div class="footer col-xs-12">
						<a class="col-xs-6 reset_button" href="javascript:resetFilter()">Reset</a>
						<a class="col-xs-6 apply_button" href="javascript:filterApply()">Apply</a>
					</div>			
				</div>
				<div class="col-xs-12" id="results-container" style="padding:0px 0px;">
					<ul class="list-unstyled" id="filter_data"> 
					</ul>
					<div id="loadMore" class='resultsMessage'><img height="30px" width="30px" src="/assets/images/filter_loading.gif"> Loading More Results</div>
					<div id="noResults" class='resultsMessage' >No More results to display.</div>
				</div><!--end of results info -->
			</div>
		</div>
		<div class="filter_options_button"><button onclick="displayFilterOptions();" class="btn btn-primary">Filter</button></div>
	</div>	
</div>
@foreach ($batchesForCategoryLocation as $index => $batchesData)	
		<?php $Schedules[$index] = $batchesData->schedules ?>
@endforeach
@stop
@section('pagejquery')
	<script type="text/javascript">
		function displayFilterOptions () {
			var displayValue = $('.fileter_options_popup').css('display');
			if(displayValue == "none")		
				$('.fileter_options_popup').show();							   	
			else
				$('.fileter_options_popup').hide();
			// body...
		}
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
		function addFacilities (batchID) 
		{
			var linksContainer = $('#facilities_continer_'+batchID),baseUrl;
			var facilities = ["ac","cafe","changing room","locker room","shower","steam"];
			var facilitesAvailabe = [1,1,1,1,1,1];
			var index = 0;
			for (index=0;index<6;index++) 
			{
  				if(facilitesAvailabe[index]==1)
  				{
  					$("<span></span>")
  					.attr("class","facilities_icon")
  					.append
  					(
  						$("<img>")
  						.attr("src","/assets/images/Facilities/"+facilities[index]+".png")
  						.attr("width","30px")
  						.attr("height","30px")
  					)
  					.appendTo(linksContainer)
  						
  				}
			}
		}
		if(result.length==0)	
		{
			$('#loadMore').css('display','none');
			$('#noResults').css('display','block');
		}	
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
					.attr("class","row clearfix")
					.append
					(		
						$("<div></div>")
						.attr("class","col-xs-12")
						.append
						(
							$("<div></div>")
							.attr("class","row")
							.append
							(
								$("<div></div>")
								.attr("class"," col-xs-12")
								.append
								(
									$("<div></div>")
									.attr("class"," col-xs-12  ")
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
								)																					
							)
						)
					)
				)
				.append
				(
					$("<div></div>")
					.attr("class","row")
					.append
					(
						$("<div></div>")
						.attr("class","col-xs-7")
						.append
						(
							$("<div></div>")
							.attr("class","inst_name col-xs-12")
							.text(batch)
						)						
						.append
						(
							$("<div></div>")
							.attr("class","col-xs-12  batchDetailsAndPrice")
							.append
							(								
									$("<div style='clear:both'></div>")
									.attr("class","row")									
									.append
									(
										$("<div></div>")
										.attr("id","inst_type")
										.attr("title",locality+", "+landmark+", "+address)	
										.attr("class"," col-xs-12 ")								
										.append
										(
											$("<span></span>")
											.attr("id","hand-icon")
											.attr("class","glyphicon glyphicon-map-marker")
										)
										.append
										(
											$("<span></span>")																					
											.text(locality+", "+landmark)
										)
									)
									.append
									(
										$("<div></div>")
										.attr("id","inst_price")									
										.attr("class"," col-xs-12 ")								
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
					)
					.append
					(
						$("<div></div>")
						.attr("class","col-xs-5")
						.append
						(
							$("<div></div>")
							.attr("class","col-xs-12 singleSessionPrice")								
							.append
							(
								$("<div></div>")								
								.text("₹ "+price+" / Session")									
							)
							.append
							(
								$("<a></a>")
								.attr("class","btn btn-primary")
								.attr("id","booknowButton")	
								.attr("href","/batches/show/"+batchID)							
								.text("Book Now")
							)
							.append
							(
								$("<div style='display:none'></div>")
								.attr("class"," col-xs-12 ")
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
						)			
					)
				)			
				.appendTo(linksContainer);				
		    }
		  	$('span.stars').stars();
		}	
		var linksContainer = $('#filter_data'),baseUrl;	
		$(document).ready(function() 
		{	
			$(".fileter_options_popup #return").click(function(){
				$('.fileter_options_popup').hide();
			})

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
		});
		function filterApply() 
		{
			$('.fileter_options_popup').hide();
			filterStatus = true;
			$('#loadMore').show();
			$('#noResults').hide();			
			result = [];				
			filter_select = $('.filterCheckBox:checked').map(function(){return this.value;}).get();	
			//alert(filter_select);
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
				location.reload(true);					
			}						
		}
		function resetFilter () {
			$('.filterCheckBox:checked').map(function () {
				$(this).removeAttr('checked');
			});
		}
	</script>
@stop