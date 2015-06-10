@extends('Layouts.layout')
@section('pagestylesheet')
  <style type="text/css">

     .post_header { background: #fff;margin: 0px;padding: 0px}

     .facilities_continer {margin-top: 5px;clear: both;}

    .facilities_icon {margin-right: 5px;}

    .singleSessionPriceContainer {padding: 0px;margin:0px;}

    .singleSessionPrice {clear: both;}

    .filter_page {width:100%;padding:0% 1% 0% 1% }

    @media screen and (min-width: 992px){ .filter_page {padding:0% 5%;}}

    @media screen and (min-width: 768px){ .batchDetailsMiddlePart {margin-top: -5px;}}

    #related_data_container  {  border-top: 1px solid lightgrey;padding: 20px 5%;width: 100%;}

  	#related_data_container h4 {font-size: 18px;color: #202e54;font-weight: bold;margin:0px 0px 5px 0px;}

  	.related_item {margin-bottom: 15px;}

  	.related_item a {color:#5C5C5C;}

  	.filter_option_loading {position: absolute;margin:18.5% 20% 0 10%;display: none}

  	.filter_option_loading img{width: 100%;height: 100%}
  	
   </style>
@stop

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
<div class="container membership_message" style="background:#3396D1">
	<div class="alert">
		<div style="color:white;position:absolute;right:40px;">
			Call: +919100 946 081
		</div>
		<button type="button" onclick="hideMembershipMessage()" class="close" data-dismiss="alert" aria-hidden="true">x</button>
		<h3><a href="/Membership"><u>{{$homeLang['home_membership_title']}}</u></a></h3>
		<strong>{{$homeLang['home_membership_tagline']}}</strong>
	</div>
</div>
<div class="container filter_page" >	
	<div class="row">		
		<div class="col-md-12 col-xs-12 col-sm-12">					
			<div class="">
				<!--Start of filter division -->
				<div class="col-md-3 col-xs-12 col-sm-3" style="margin:15px 0px 25px 0px;padding:0px 1% 0px 0px;">
					<!--<span id='filter-tittle-name'>Filter By</span>-->
					<div id="browse-filter" class="filter-option-1 filterOption">	
						<div class="filterTitle">Sub Categories</div>
						<div class="filterOptionsList">
							<div class="filter_option_loading"><img src="/assets/images/loading.gif"></div>
							<ul class="list-unstyled filters" valuelimit="" keepcollapsed="" displaytype="" nofilter="" id="filter-sub"> 	
								@foreach ($subcategoriesForCategory as $subcategoryData)
									<?php
										$subcategoryName = $subcategoryData->subcategory;
										$sub_id = $subcategoryData->id;
									?>				
									<li subcategory="{{$sub_id}}" >								
									 	 <label class="sub"><input autocomplete="off" value="{{$sub_id}}" type="checkbox" id="subcategory_filter" class="SubCheckbox filterCheckBox" @if(isset($subcategory_id)) @if($subcategory_id == $sub_id) checked="checked" @endif @endif /><span class="checkbox_data">{{' '.$subcategoryName}}</span></label>
									</li>
								 @endforeach
							 </ul>
							 
						</div>
					</div>			
					<div id="browse-filter" class="filter-option-2 filterOption">	
						<div class="filterTitle">Locality</div> 
						<div class="filterOptionsList">
							<div class="filter_option_loading"><img src="/assets/images/loading.gif"></div>
							<ul class="list-unstyled filters" valuelimit="" keepcollapsed="" displaytype="" nofilter="" id="filter-sub"> 
								@foreach ($localitiesForLocation as $localityData)
									<?php 
										$localityName = $localityData->locality;
										$loc_id = $localityData->id;
									?>
									<li subcategory="{{$loc_id}}" >								
									 	 <label class="sub"><input autocomplete="off" style="" value="{{$loc_id}}" type="checkbox" id="locality_filter" class="LocCheckbox filterCheckBox" @if(isset($locality_id)) @if($locality_id == $loc_id) checked="checked" @endif @endif /><span class="checkbox_data">{{' '.$localityName}}</span></label>
									</li> 
								@endforeach
							 </ul>							 
						</div>
					</div>				
				</div>
				<div class="col-md-9 col-xs-12 col-sm-9 results-container" style="margin:30px 0px 25px 0px;padding:0px 1% 0px 0px;" >
					<ul class="list-unstyled" valuelimit="" style="" keepcollapsed="" displaytype="" nofilter="" id="filter_data"> 
					</ul>
					<div id="loadMore" class='resultsMessage'><img height="30px" width="30px" src="/assets/images/filter_loading.gif">Loading Results</div>
					<div id="noResults" class='resultsMessage' >No results to display.</div>
				</div><!--end of results info -->
			</div>
		</div>
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
@section('pagejquery')
	<script type="text/javascript">
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
		//navActive('NavItem'+categoryId);
		if(result.length==0)	
		{
			$('#loadMore').css('display','none');
			$('#noResults').css('display','block');
		}
		function addFacilities (batchID,facilitesAvailable) 
		{
			var linksContainer = $('#facilities_continer_'+batchID),baseUrl;
			//var linksContainerStatus = linksContainer.html().trim();
			//alert(linksContainerStatus);
			if(linksContainer.is(':empty'))
			{				
				var facilitiesName = ["Air Conditioning","Cafe","Changing Room","Locker","Shower Room","Steam"];				
				var index = 0;
				for (index=0;index<facilitesAvailable.length;index++) 
				{
	  				if(facilitesAvailable[index]==1)
	  				{
	  					$("<span></span>")
	  					.attr("class","facilities_icon")
	  					.append
	  					(
	  						$("<img>")
	  						.attr("src","/assets/images/Facilities/"+facilitiesName[index]+".png")
	  						.attr("width","30px")
	  						.attr("height","30px")
	  						.attr("title",facilitiesName[index])
	  						.attr("alt",facilitiesName[index])
	  					)
	  					.appendTo(linksContainer)
	  						
	  				}
				}
			}
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
			$(".filterOptionsList").css('pointer-events','none');	
			resultRange = result.length;
			if(sub_select.length==0)
				sub_select=0;
			if(loc_select.length==0)
				loc_select=0;
			//alert("sub = "+sub_select+"loc = "+loc_select+"trial = "+trial_select);
			$.get("/filter/"+sub_select+"/"+loc_select+"/"+categoryId+"/"+locationId+"/"+chunk,function(response)
			{
				chunk++;
				loadFilters = true;	
				// alert(response);
				if(response == "")
				{
					$('#loadMore').hide();
					$('#noResults').show();
				}
				else
				{
					//alert(response.length);
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
				setTimeout("$('.filterOptionsList').css('pointer-events','all');$('.filter_option_loading').hide();$('.filters').css('opacity','1');", 1000);					
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
				var locality = results[index]['locality'];
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
				if ( $( "#batch"+batchID ).length == 0 ) 
				{		
					$("<li style='display:none'></li>")
					.attr("subcategory",subcategoryID)
					.attr("locality",localityID)
					.attr("class","batchInfo batch"+index)
					.attr("id","batch"+batchID)
					.append
					(
						$("<div></div>")
						.attr("class","col-md-12 col-xs-12 col-sm-12 post_header")
						.append
						(	
							$("<div></div>")
							.attr("class","col-md-8 col-xs-12 col-sm-7")
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
								.text(subcategory+", "+locality)
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
							.append
							(
								$("<div></div>")
								.attr("class","col-md-12 col-xs-12 col-sm-12 batchDetailsAndPrice")
								.append
								(
									$("<div></div>")
									.attr("class","col-md-4 col-xs-12 col-sm-6")															
									.append
									(
										$("<div></div>")
										.attr("class","row")								
										.append
										(
											$("<div></div>")
											.attr("id","inst_type")
											.attr("title",locality+", "+landmark+", "+address)	
											.attr("class","col-md-9 col-xs-12 col-sm-9 text_over_flow_hide")								
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
									.attr("class","col-md-5 col-xs-12 col-sm-6 batchDetailsMiddlePart")
									.attr("id","")	
									.append
									(
										$("<div></div>")
										.attr("class","col-md-5 col-xs-12 col-sm-6 ")
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
											.text(" +91"+contact)									
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
										.attr("class","col-md-5 col-xs-12 col-sm-6 ")
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
										.attr("class","col-md-12 col-sm-12 facilities_continer hidden-xs")
										.attr("id","facilities_continer_"+batchID)									
									)																											
								)
								.append
								(
									$("<div></div>")
									.attr("class","col-md-3 col-xs-12 col-sm-12 singleSessionPriceContainer ")
									.append
									(	
										$("<div></div>")						
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
											.attr("class","btn btn-primary booknowButton")
											.attr("id","booknowButton")	
											.attr("href","/batches/show/"+batchID)							
											.text("Book Now")
										)
									)
								)																			
							)
						)
					)
					.appendTo(linksContainer);
					var facilitesAvailable = new Array();
					var facilities = ["air_conditioning","cafe","locker","locker","shower_room","steam"];
					for (facilitesIndex=0;facilitesIndex<facilities.length;facilitesIndex++) 
					{
						facilitesAvailable[facilitesIndex] = results[index][facilities[facilitesIndex]];
					}				
					addFacilities(batchID,facilitesAvailable);
				}				
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
								if(response == "")
								{
									$('#loadMore').css('display','none');
									$('#noResults').css('display','block');
								}
								else
								{
									//alert(response.length);
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
							LoadFilterResults(sub_select,loc_select,resultRange);
						}
					}
					else
					{	
						LoadResult(range,range+10);	
					}
				}
			}
			$("#filter-sub input").click(function(e)
			{		
				if($(this).attr('id')=="subcategory_filter")
				{
					$('.filter-option-1 .filters').css('opacity','.5');
					$('.filter-option-1 .filter_option_loading').show();
				}
				else
				{
					$('.filter-option-2 .filters').css('opacity','.5');
					$('.filter-option-2 .filter_option_loading').show();
				}
				filterStatus = true;
				$('#loadMore').show();
				$('#noResults').hide();
				result = [];				
				filter_select = $('.filterCheckBox:checked').map(function(){return this.value;}).get();							
				if(filter_select.length>0)
				{					
					sub_select = $('.SubCheckbox:checked').map(function(){return this.value;}).get();
					loc_select = $('.LocCheckbox:checked').map(function(){return this.value;}).get();
					chunk = 0;
					if(sub_select.length == 1 && loc_select.length ==0)
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
					window.location.href = "/filter/categories/"+categoryId+"/locations";					
				}				
			});			
		});
	</script>
@stop