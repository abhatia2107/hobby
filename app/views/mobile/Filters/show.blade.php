@extends('Layouts.layout')
@section('content')
<style type="text/css">
	
	.overflow_x {max-width:100%;overflow-x:hidden}

	.filterTitle { color:white;font-family: 'Open Sans',sans-serif;font-size: 20px;padding: 0px 5px;
		background:#3396d1;height: 30px;
	}

	.filterOptionsList { padding: 5px 2px 0px 5px;border:1px solid;border-top:0px solid;border-color:#3396d1; }	

	.batchInfo {   
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

	.filters  {  overflow: auto; color: #333;padding: 0px;max-height: 130px;min-height: 130px; }

	#browse-filter   {  font-family: 'Open Sans',sans-serif; font-weight: lighter;   }

	#browse-filter label {font-weight: lighter;}

	.filter-option-2  {  margin-top: 10px;  font-weight: normal;   }	

	.filter-option-1   {  font-weight: normal;   }

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

	#results-container {margin-top: 0px;z-index: 1000;}

	.filter_options_popup {display: none;position: fixed;top: 0;left: 0;right: 0;bottom: 0;
		z-index: 1000000;background:white;/*#f0f3f6*/height: 100%;padding: 0px;height: 100%;
	 }

	.filter_options_popup .header {background:#5a5a5a;font-size: 20px;text-align: center;width: 100%;padding: 10px 0px;color: white;}	

	.filter_options_container {padding: 10px 30px;overflow: auto;max-height: 78%;background: white;top:11%;position:fixed;width: 100%; }

	.filter_options_popup .footer {bottom:0;margin:0;position: fixed;text-align: center;color: white;padding: 0; }

	.filter_options_popup .header a {color: white;text-decoration: none;position: absolute;left: 5px;padding-top: 12px;}

	.filter_options_popup .reset_button {background: #5a5a5a;padding: 10px 0px}

	.filter_options_popup .apply_button {background: #3aa54c;padding: 10px 0px}
	

	.filter_options_popup .footer a {color: white;text-decoration: none;font-size: 16px;}

	.filter_options_button { bottom:0;position: fixed;z-index: 100000;width: 100%;background:rgba(0,0,0,0.7);text-align: center; height: 34px;left:0;right:0;}

	.filter_options_button button {border-radius:0px;padding: 5px 15px;font-size: 17px;background:#0099FF;border:0px; }

	.filter_page_container {width: 100%;padding: 0px;}

	.filter_page_container .alert {  margin: 0px;width: 100%;border-radius: 0px;padding: 10px;	}

	.filter_page_container .alert a{  color: green;font-weight: bold;	}

	#related_data_container  {  border-top: 1px solid lightgrey;padding: 20px 5%;width: 100%;}

  	#related_data_container h4 {font-size: 18px;color: #202e54;font-weight: bold;margin:0px 0px 5px 0px;}

  	.related_item {margin-bottom: 15px;}

  	.related_item a {color:#5C5C5C;}

</style>
<div class="container membership_message" style="background:#3396D1">
	<div class="alert">		
		<button type="button" onclick="hideMembershipMessage()" class="close" data-dismiss="alert" aria-hidden="true">x</button>
		<h3><a href="/memberships"><u>{{$homeLang['home_membership_title']}}</u></a></h3>
		<strong>{{$homeLang['home_membership_tagline']}}</strong>
		<div style="color:white;">
			<a href="tel:+919100946081">Call: +919100946081</a>
		</div>
	</div>
</div>
<div class="container" >
	<div class="row">
		<div class="col-xs-12">			
			<div class="row">
				<!--Start of filter division -->
				<div class="col-xs-12 filter_options_popup">
					<!--<span id='filter-tittle-name'>Filter By</span>-->
					<div class="header"><a class="glyphicon glyphicon-arrow-left" id="return"></a> Filter </div>
					<div class="filter_options_container">
						<div id="browse-filter" class="filter-option-1 filterOption" style="max-height:45%">	
							<div class="filterTitle">Sub Categories</div>
							<div class="filterOptionsList">
								<ul class="list-unstyled filters" valuelimit="" keepcollapsed="" displaytype="" nofilter="" id="filter-sub"> 	
									@foreach ($subcategoriesForCategory as $subcategoryData)
										<?php
											$subcategoryName = $subcategoryData->subcategory;
											$sub_id = $subcategoryData->id;
										?>				
										<li subcategory="{{$sub_id}}" >								
										 	 <label class="sub"><input autocomplete="off" value="{{$sub_id}}" type="checkbox" class="SubCheckbox filterCheckBox" @if(isset($subcategory_id)) @if($subcategory_id == $sub_id) checked="checked" @endif @endif /><span class="checkbox_data">{{' '.$subcategoryName}}</span></label>
										</li>
								 	@endforeach
								 </ul>
							</div>
						</div>			
						<div id="browse-filter" class="filter-option-2 filterOption" style="max-height:45%">	
							<div class="filterTitle">Locality</div> 
							<div class="filterOptionsList">
								<ul class="list-unstyled filters" valuelimit="" keepcollapsed="" displaytype="" nofilter="" id="filter-sub"> 
									@foreach ($localitiesForLocation as $localityData)
										<?php 
											$localityName = $localityData->locality;
											$loc_id = $localityData->id;
										?>
										<li subcategory="{{$loc_id}}" >								
										 	 <label class="sub"><input autocomplete="off" style="" value="{{$loc_id}}" type="checkbox" class="LocCheckbox filterCheckBox" @if(isset($locality_id)) @if($locality_id == $loc_id) checked="checked" @endif @endif /><span class="checkbox_data">{{' '.$localityName}}</span></label>
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
				<div class="col-xs-12" id="results-container" style="padding:0px 0px 10px 0px;" >
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
@if(isset($subcategories))
	<div class="container" id="related_data_container">
	 	<div class="row">
	    	<div class="col-md-12 col-sm-12 col-xs-12 related_item">
	    		<?php	    			
		          	$institutesLength = sizeof($subcategories);
		          	$index = 0;
		          	$maxlength = 12;		          
		          	$width = 3;
		          	if ($institutesLength<$maxlength) { $maxlength = $institutesLength; }        		     
		        ?>
		        <h4>Related to {{$instituteName}} activities</h4>       		        		        
				@for(; $index<$maxlength; $index++ )
				  	<div class="col-md-{{$width}} col-sm-{{$width}} col-xs-12 ">				    
				      <li title="{{$subcategories[$index]->subcategory}} classes in {{$locality.', '.$location}}" >
				        <a class="text_over_flow_hide" href="/filter/{{$subcategories[$index]->id}}/{{$locality_id}}">
				          {{$subcategories[$index]->subcategory}} classes in {{$locality.', '.$location}}
				        </a>
				      </li>
				    </div> 
				@endfor		            		                  		             
	      </div>       
	  </div>
	</div>
@endif
@if(isset($localities))
	<div class="container" id="related_data_container">
	 	<div class="row">
	    	<div class="col-md-12 col-sm-12 col-xs-12 related_item">
	    		<?php	    			
		          	$institutesLength = sizeof($localities);
		          	$index = 0;
		          	$maxlength = 12;		          
		          	$width = 3;
		          	if ($institutesLength<$maxlength) { $maxlength = $institutesLength; }        		     
		        ?>
		        <h4>Related to {{$subcategory}} classes in {{$location}}</h4>       		        		        
				@for(; $index<$maxlength; $index++ )
				  	<div class="col-md-{{$width}} col-sm-{{$width}} col-xs-12 ">				    
				      <li title="{{$subcategory}} classes in {{$localities[$index]->locality.', '.$location}}" >
				        <a class="text_over_flow_hide" href="/filter/{{$subcategory_id}}/{{$localities[$index]->id}}">
				          {{$subcategory}} classes in {{$localities[$index]->locality.', '.$location}}
				        </a>
				      </li>
				    </div> 
				@endfor		            		                  		             
	      </div>       
	  </div>
	</div>
@endif
@if(isset($localitySubcategories))
	<div class="container" id="related_data_container">
	 	<div class="row">
	    	<div class="col-md-12 col-sm-12 col-xs-12 related_item">
	    		<?php	    			
		          	$institutesLength = sizeof($localitySubcategories);
		          	$index = 0;
		          	$maxlength = 12;		          
		          	$width = 3;
		          	if ($institutesLength<$maxlength) { $maxlength = $institutesLength; }        		     
		        ?>
		        <h4>Related to {{$categories[$category_id-1]->category}} classes in  {{$locality.', '.$location}}</h4>       		        		        
				@for(; $index<$maxlength; $index++ )
				  	<div class="col-md-{{$width}} col-sm-{{$width}} col-xs-12 ">				    
				      <li title="{{$localitySubcategories[$index]->subcategory}} classes in {{$locality.', '.$location}}" >
				        <a class="text_over_flow_hide" href="/filter/subcategory/{{$localitySubcategories[$index]->id}}">
				          {{$localitySubcategories[$index]->subcategory}} classes in {{$locality.', '.$location}}
				        </a>
				      </li>
				    </div> 
				@endfor		            		                  		             
	      </div>       
	  </div>
	</div>
@endif
@stop
@stop
@section('pagejquery')
	<script type="text/javascript">
		function displayFilterOptions () {
			$('.filter_options_popup').show();	
			$('#results-container').hide();				
			$('html').css('overflow-y','hidden');			
		}
		var result = {{json_encode( $batchesForCategoryLocation ) }};  		
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
		navActive('NavItem'+categoryId);
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
					$(this).fadeIn(100);
				}
				index++;
			});
			range = end;
			if(range>index) range=index;
			return index;
		}
		displayResults(result,0);
		LoadResult(0,20);
		function LoadFilterResults(sub_select,loc_select,start)
		{
			resultRange = result.length;
			if(sub_select.length==0)
				sub_select=0;
			if(loc_select.length==0)
				loc_select=0;			
			//alert("sub = "+sub_select+"loc = "+loc_select+"trial = ");
			$.get("/filter/"+sub_select+"/"+loc_select+"/"+locationId+"/"+chunk,function(response)
			{
				chunk++;
				loadFilters = true;									
				if(response == "")
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
						LoadFilterResults(sub_select,loc_select,0);
					}
				}
				response = [];
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
				var comment =results[index]['batch_comment'];
				var subcategoryID = results[index]['batch_subcategory_id'];
				var localityID = results[index]['venue_locality_id'];
				var email = results[index]['venue_email'];
				var contact = results[index]['venue_contact_no'];
				var trialID = results[index]['batch_trial'];
				var institute_rating = results[index]['institute_rating'];
				var landmark = results[index]['venue_landmark'];
				var address = results[index]['venue_address'];
				var venue_email = results[index]['venue_email'];
				var batchCredit = results[index]['batch_credit'];
				if(batchCredit>1)
					batchCredit += " Credits)";
				else
					batchCredit += " Credit)";
				address = address.replace(/\n/g," ");
				if ( $("#batch"+batchID ).length == 0 ) 
				{			
					$("<li style='display:none;max-width:100%;overflow-x:hidden'></li>")
					.attr("subcategory",subcategoryID)
					.attr("locality",localityID)
					.attr("class","batchInfo batch"+index)
					.attr("id","batch"+batchID)
					.append
					(
						$("<div></div>")
						.attr("class","row overflow_x")
						.append
						(		
							$("<div></div>")
							.attr("class","col-xs-12 overflow_x")
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
										.attr("class"," col-xs-12 ")
										.append
										(
											$("<span></span>")
											.attr("id","batch_name")
											.attr("class","text_over_flow_hide")
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
						.attr("class","row overflow_x")
						.append
						(
							$("<div></div>")
							.attr("class","col-xs-7")
							.append
							(
								$("<div></div>")
								.attr("class","inst_name col-xs-12 text_over_flow_hide")
								.text(subcategory+', '+locality)
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
											.attr("class"," col-xs-12 text_over_flow_hide")								
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
											.attr("class"," col-xs-12 text_over_flow_hide")	
											.attr("title",comment+' '+tagline)							
											.append
											(
												$("<span></span>")
												.attr("id","hand-icon")
												.attr("class","glyphicon glyphicon-time")
											)
											.append
											(
												$("<span></span>")																					
												.text(comment+' '+tagline)
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
								.attr("class","col-xs-12 singleSessionPrice text_over_flow_hide ")								
								.append
								(
									$("<div></div>")								
									.text("₹ "+price+" / Session")
									.append("<br>(or "+batchCredit)									
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
		    }
		  	$('span.stars').stars();
		}	
		var linksContainer = $('#filter_data'),baseUrl;	
		$(document).ready(function() 
		{	
			$('body').css('overflow-x','hidden');	
			$(".filter_options_popup #return").click(function(){
				$('.filter_options_popup').hide();
				$('html').css('overflow-y','auto');
				$('#results-container').show();	
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
								if(response == "")
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
								response = [];	
							});
						}
						if(filterStatus)
						{							
							LoadFilterResults(sub_select,loc_select,resultRange);
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
			$('html').css('overflow-y','auto');
			$('.filter_options_popup').hide();
			$('#results-container').show();	
			filterStatus = true;
			$('#loadMore').show();
			$('#noResults').hide();			
			result = [];				
			filter_select = $('.filterCheckBox:checked').map(function(){return this.value;}).get();	
			//alert(filter_select);
			if(filter_select.length>0)
			{				
				sub_select = $('.SubCheckbox:checked').map(function(){return this.value;}).get();
				loc_select = $('.LocCheckbox:checked').map(function(){return this.value;}).get();				
				chunk = 0;				
				if( sub_select.length == 1 && loc_select.length ==0 )
				{
					window.location.href = "/filter/subcategory/"+sub_select;
				}
				else if(loc_select.length == 1 && sub_select.length ==0)
				{
					window.location.href = "/filter/locality/"+loc_select;
				}				
				else
				{
					$(linksContainer).empty();						
					LoadFilterResults(sub_select,loc_select,0);					
				}				
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