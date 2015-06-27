@extends('Layouts.layout')
@section('pagestylesheet')
  <style type="text/css">

     .post_header { background: #fff;margin: 0px;padding: 0px}

     .facilities_continer {margin-top: 5px;clear: both;}

    .facilities_icon {margin-right: 5px;}

    .singleSessionPriceContainer {padding: 0px;margin:0px 0px 10px 0px;}

    @media (min-width: 920px){.singleSessionPriceContainer { margin-top: 30px; } }

    .filter_page {width:100%;padding:0% 1% 0% 1% }

    @media screen and (min-width: 992px){ .filter_page {padding:0% 5%;}}

    @media screen and (min-width: 768px){ .batchDetailsMiddlePart {margin-top: -5px;}}

    #related_data_container  {  border-top: 1px solid lightgrey;padding: 20px 5%;width: 100%;}

  	#related_data_container h4 {font-size: 18px;color: #202e54;font-weight: bold;margin:0px 0px 5px 0px;}

  	.related_item {margin-bottom: 15px;}

  	.related_item a {color:#5C5C5C;}

  	.filter_option_loading {position: absolute;margin:18.5% 20% 0 10%;display: none}

  	.filter_option_loading img{width: 100%;height: 100%}


  	/* new style for filter page */  	

  	.maz_pad_z {margin: 0px;padding:0;}

  	a, a:hover {text-decoration: none}

  	#batchesData { box-shadow: 0px 0px 2px #3366CC; -moz-box-shadow: 0px 0px 2px #3366CC;-webkit-box-shadow: 0px 0px 2px #3366CC;
  		color: #333; font-family: 'Open Sans',sans-serif;font-size: 15px;font-weight: normal;
	}

  	.batch { background: white;border-bottom:1px solid skyblue;}

	.batch .header {padding: 7px 0px 5px 10px;margin: 0; }

	.batch .header h2 { font-size: 22px; font-weight: bold; color: #0033CC;margin: 0 0 5px 0px;padding: 0; }

	.batch .header h3 { font-size: 16px; font-weight: normal; color: #333;}

	.batch .body .glyphicon {color: #3396d1; }

	.batch .body .leftPart {padding: 7px 0 0 10px}

	.batch .body .rightPart {padding: 0px 0px 0px 20px;margin-top: -10px;}

	.batch .body .item {margin-top:1px; }

	.batch .body {padding-bottom: 5px;}

	.batch .instConMsg { border: 1px solid;padding:3px 3px 3px 3px;border-color: #0099FF;border-radius: 5px;float:left;text-align: center;
  		font-size: 13px;height: 26px;overflow: hidden;display: inline-block;margin-bottom:3px;font-family: 
	}

	.batch .instConMsg:hover {background: #E8E8E8; cursor: pointer;}

	.batch .instCon {margin-right:5px;min-width: 140px}

	.batch .instMsg {margin-right:5px;min-width: 120px}

	.batch .singleSessionPrice {  text-align: center;margin-bottom: 10px }

	.times_font { font-family: "Times New Roman", Georgia, Serif;}
	
  	
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
		<h3><a href="/memberships"><u>{{$homeLang['home_membership_title']}}</u></a></h3>
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
							<ul class="list-unstyled filters" id="filter-sub"> 	
								@foreach ($subcategoriesForCategory as $subcategoryData)
									<?php
										$subcategoryName = $subcategoryData->subcategory;
										$sub_id = $subcategoryData->id;
									?>				
									<li subcategory="{{$sub_id}}" >								
									 	 <label class="sub"><input autocomplete="off" value="{{$subcategoryName}}" type="checkbox" id="subcategory_filter" class="SubCheckbox filterCheckBox" @if(isset($subcategory_id)) @if($subcategory_id == $sub_id) checked="checked" @endif @endif /><span class="checkbox_data">{{' '.$subcategoryName}}</span></label>
									</li>
								 @endforeach
							 </ul>
							 
						</div>
					</div>			
					<div id="browse-filter" class="filter-option-2 filterOption">	
						<div class="filterTitle">Locality</div> 
						<div class="filterOptionsList">
							<div class="filter_option_loading"><img src="/assets/images/loading.gif"></div>
							<ul class="list-unstyled filters" id="filter-sub"> 
								@foreach ($localitiesForLocation as $localityData)
									<?php 
										$localityName = $localityData->locality;
										$localityUrl = $localityData->locality_url;
										$loc_id = $localityData->id;
									?>
									<li subcategory="{{$loc_id}}" >								
									 	 <label class="sub"><input autocomplete="off" style="" value="{{$localityUrl}}" type="checkbox" id="locality_filter" class="LocCheckbox filterCheckBox" @if(isset($locality_id)) @if($locality_id == $loc_id) checked="checked" @endif @endif /><span class="checkbox_data">{{' '.$localityName}}</span></label>
									</li> 
								@endforeach
							 </ul>							 
						</div>
					</div>
					<div id="browse-filter" class="filter-option-2 filterOption" style="overflow:auto;padding:0 5px 10px 5px;display:block;">	
						<h5>Like us on facebook</h5>
						<div class="fb-like" data-href="https://facebook.com/hobbyix" data-layout="standard" data-action="like" data-show-faces="true" data-share="true"></div>
					</div>
				</div>
				<div class="col-md-9 col-xs-12 col-sm-9 results-container" style="margin:30px 0px 25px 0px;padding:0px 1% 0px 0px;" >
					<ul class="list-unstyled row maz_pad_z" id="batchesData">
					@if(!empty($batchesForCategoryLocation)) 
					@foreach($batchesForCategoryLocation as $batchInfo)
						<li itemscope itemtype='http://schema.org/SportsActivityLocation' id="/batches/show/{{$batchInfo->batch}}" >
							<div class="batch col-md-12 col-xs-12 col-sm-12 maz_pad_z" id="batch{{$batchInfo->id}}" >
								<div class="col-md-9 col-xs-12 col-sm-12 body maz_pad_z" >
									<div class="col-md-12 col-xs-12 col-sm-12 header">
										<h2 title="Institute Name"><a href="/batches/show/{{$batchInfo->batch}}"><span itemprop="name">{{$batchInfo->institute}}</span></a></h2>
										<h3 class="maz_pad_z" title="Activity Name, Locality">
											<span itemprop="address" itemscope itemtype="http://schema.org/PostalAddress">{{$batchInfo->subcategory}}, 
											<span itemprop="addressLocality">{{$batchInfo->locality}}</span></span>
										</h3>
									</div>																
									<div class="col-md-6 col-xs-12 col-sm-6 leftPart maz_pad_z" >
										<div class="item" title="Landmark is {{$batchInfo->venue_landmark}}">
											<span class="text_over_flow_hide">
											<span class="glyphicon glyphicon-map-marker"></span>
											<span>{{$batchInfo->venue_landmark}}</span>
											</span>
										</div>
										<div class="item" title="Schedule: {{$batchInfo->batch_comment.' '.$batchInfo->batch_tagline}}">
											<span class="text_over_flow_hide">
											<span class="glyphicon glyphicon-time"></span>
											<span>{{$batchInfo->batch_comment.' '.$batchInfo->batch_tagline}}</span>
											<span class="text_over_flow_hide">
										</div>									
									</div>								
									<div class="col-md-6 col-xs-12 col-sm-6 rightPart maz_pad_z">
										<div class="col-md-5 col-xs-12 col-sm-6 instConMsg instCon" onClick="show_contact({{$batchInfo->id}})">										
											<span style='display:none'value="$batchInfo->id" id="contact{{$batchInfo->id}}" class="times_font" itemprop="telephone">											
												+91 {{$batchInfo->venue_contact_no}}
											</span>
											<span id="show_contact{{$batchInfo->id}}"><span class="glyphicon glyphicon-phone-alt"></span> View Number</span>
										</div>		
										<div class="col-md-4 col-xs-12 col-sm-5 instConMsg instMsg" data-toggle="modal" href="#sendMessage" data-batch="{{$batchInfo->batch}}"
											data-email="{{$batchInfo->venue_email}}" data-institute="{{$batchInfo->institute}}" title="Send Message to Institute and get response">
											<span class="glyphicon glyphicon-envelope"></span>										
											<span>Send Message</span>
										</div>	
										<div class="col-md-12 col-sm-12 facilities_continer"></div>
									</div>								
								</div>
								<div class="col-md-3 col-xs-12 col-sm-12 bookClass singleSessionPriceContainer 	">
									<div class="singleSessionPrice">
									<div class="times_font">₹{{$batchInfo->batch_single_price}} / Session <br>(or {{$batchInfo->batch_credit}} Credit)</div>
									<a class="btn btn-primary booknowButton" href="/batches/show/{{$batchInfo->batch}}">Book Now</a>
									</div>
								</div>	
							</span>																		
						</li>
					@endforeach
					@endif
					<!--<div id="loadMore" class='resultsMessage'><img height="30px" width="30px" src="/assets/images/filter_loading.gif"> Loading More Results</div> -->
					<div id="noResults" class='resultsMessage' >No More results to display.</div>
					</ul>					
				</div><!--end of results info -->
				{{$batchesForCategoryLocation->links()}}
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
				        <a class="text_over_flow_hide" href="/filter/{{$subcategories[$index]->subcategory}}/{{$locality_id}}">
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
				        <a class="text_over_flow_hide" href="/filter/{{$subcategory_id}}/{{$localities[$index]->locality}}">
				          {{$subcategory}} classes in {{$localities[$index]->locality.', '.$location}}
				        </a>
				      </li>
				    </div> 
				@endfor		            		                  		             
	      </div>       
	  </div>
	</div>
@endif
@if(isset($locationSubcategories))
	<div class="container" id="related_data_container">
	 	<div class="row">
	    	<div class="col-md-12 col-sm-12 col-xs-12 related_item">
	    		<?php	    			
		          	$institutesLength = sizeof($locationSubcategories);
		          	$index = 0;
		          	$maxlength = 12;		          
		          	$width = 3;
		          	if ($institutesLength<$maxlength) { $maxlength = $institutesLength; }        		     
		        ?>
		        <h4>Related to {{$categories[$category_id-1]->category}} classes in  {{$location}}</h4>       		        		        
				@for(; $index<$maxlength; $index++ )
				  	<div class="col-md-{{$width}} col-sm-{{$width}} col-xs-12 ">				    
				      <li title="{{$locationSubcategories[$index]->subcategory}} classes in {{$location}}" >
				        <a class="text_over_flow_hide" href="/filter/subcategory/{{$locationSubcategories[$index]->subcategory}}">
				          {{$locationSubcategories[$index]->subcategory}} classes in {{$location}}
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
				        <a class="text_over_flow_hide" href="/filter/subcategory/{{$localitySubcategories[$index]->subcategory}}">
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
		sub_select = $('.SubCheckbox:checked').map(function(){return this.value;}).get();
		loc_select = $('.LocCheckbox:checked').map(function(){return this.value;}).get();	
		if(result.length==0)	
		{
			$('#noResults').empty();
			$('#noResults').append("No Results Found");
			$('#loadMore').hide();
			$('#noResults').show();
		}	
		$(document).ready(function() 
		{
			filter_select = $('.filterCheckBox:checked').map(function(){return this.value;}).get();
			sub_select = $('.SubCheckbox:checked').map(function(){return this.value;}).get();
			loc_select = $('.LocCheckbox:checked').map(function(){return this.value;}).get();							
			if(filter_select.length>0)
			{
				filterStatus = true;
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
				$('#loadMore').show();
				$('#noResults').hide();
				result = [];				
				filter_select = $('.filterCheckBox:checked').map(function(){return this.value;}).get();							
				if(filter_select.length>0)
				{						
					filterStatus = true;				
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
						window.location.href = "/filter/"+sub_select+"/"+loc_select+"/"+locationId+"/"+chunk;
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