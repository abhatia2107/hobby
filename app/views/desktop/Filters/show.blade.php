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

	.batch .instCon {margin-right:5px;min-width: 120px}

	.batch .instMsg {margin-right:5px;min-width: 120px}

	.batch .singleSessionPrice {  text-align: center;margin-bottom: 10px }

	.times_font { font-family: "Times New Roman", Georgia, Serif;}
  	
  	.related_item ul {margin: 0;padding: 3px 0px}
  	
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
						 <input type="text" class="form-control" name='msgInputNumber' id='MsgInputPhone'  placeholder='Enter Your Mobile Number' required='required'/>
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
<ul class="breadcrumb">
		<li>
			<a href="{{url('/')}}">Home</a>
		</li>
		<li class="active">
			Fitness
		</li>		
		<h1>@if(isset($metaContent[3])){{$metaContent[3]}} @endif</h1>
	</ul>	
<div class="container filter_page_container" style="margin:15px 0px 30px 0px;">			
	<div class="col-lg-12 col-md-12 col-xs-12 col-sm-12 maz_pad_z">											
		<div class="col-lg-3 col-md-3 col-xs-12 col-sm-3 maz_pad_z">			
			<div class="col-lg-9 col-md-11 col-sm-11 filter-option-1 filterOption" style="padding:0;float:right">	
				<div class="filterTitle">Sub Categories</div>
				<div class="filterOptionsList">							
					<ul class="list-unstyled filters"> 	
						@foreach ($subcategoriesForCategory as $subcategoryData)											
							<li subcategory="{{$subcategoryData->id}}" >								
							 	 <label class="sub"><input autocomplete="off" value="{{$subcategoryData->subcategory}}" type="checkbox" data-filterid="subcategory_filter" class="SubCheckbox filterCheckBox" @if(isset($subArr))@if(in_array($subcategoryData->id, $subArr)) checked="checked" @endif @endif /><span class="checkbox_data">{{' '.$subcategoryData->subcategory}}</span></label>
							</li>
						 @endforeach
					 </ul>
					 
				</div>
			</div>			
			<div class="col-lg-9 col-md-11 col-sm-11 filter-option-2 filterOption" style="padding:0;float:right">	
				<div class="filterTitle">Locality</div> 
				<div class="filterOptionsList">							
					<ul class="list-unstyled filters"> 
						@foreach ($localitiesForLocation as $localityData)									
							<li subcategory="{{$localityData->id}}" >								
							 	 <label class="sub"><input autocomplete="off" value="{{$localityData->locality_url}}" type="checkbox" data-filterid="locality_filter" class="LocCheckbox filterCheckBox" @if(isset($locArr))@if(in_array($localityData->id, $locArr)) checked="checked" @endif @endif  /><span class="checkbox_data">{{' '.$localityData->locality}}</span></label>
							</li> 
						@endforeach
					 </ul>							 
				</div>
			</div>
			<div class="col-lg-9 col-md-11 col-sm-11 filterOption" style="overflow:auto;padding:0 5px 5px 5px;text-align:center;float:right">							
				<h4>Like us on facebook</h4>
				<div class="fb-page" data-href="https://www.facebook.com/hobbyix" data-width="300" data-hide-cover="false" data-show-facepile="true" data-show-posts="false"></div>						
				<!---<div class="fb-like" data-href="https://facebook.com/hobbyix" data-layout="standard" data-action="like" data-show-faces="true" data-width="240px" data-share="true"></div>						-->
			</div>
		</div>
		<div class="col-lg-9 col-md-9 col-xs-12 col-sm-9" style="padding-left:1%" >
			<ul class="list-unstyled row col-lg-11 col-md-12 maz_pad_z" id="batchesData">						
			@if(!empty($batchesForCategoryLocation)) 
			@foreach($batchesForCategoryLocation as $batchInfo)
				<li itemscope itemtype="http://schema.org/SportsActivityLocation">
					<div class="batch col-lg-12 col-md-12 col-xs-12 col-sm-12 maz_pad_z" id="batch{{$batchInfo->id}}" >
						<div class="col-lg-10 col-md-10 col-xs-12 col-sm-12 body maz_pad_z" >
							<div class="col-lg-12 col-md-12 col-xs-12 col-sm-12 header">
								<h2><a itemprop="url" title="{{$batchInfo->institute}}" href="/batch/{{$batchInfo->batch}}"><span itemprop="name">{{$batchInfo->institute}}</span></a></h2>
								<span style="display:none" itemprop="additionalType">ExerciseGym</span>
								<h3 class="maz_pad_z" title="Activity Name, Locality">											
									<span>{{$batchInfo->subcategory}}, {{$batchInfo->locality}}</span>
								</h3>
							</div>																
							<div class="col-lg-6 col-md-6 col-xs-12 col-sm-5 leftPart maz_pad_z" >
								<div class="item" title="Landmark is {{$batchInfo->venue_landmark}}, {{$batchInfo->locality}}">
									<span class="text_over_flow_hide" itemprop="address" itemscope itemtype="http://schema.org/PostalAddress">
										<span class="glyphicon glyphicon-map-marker"></span>
										<span itemprop="streetAddress">{{$batchInfo->venue_landmark}}</span>, 
										<span itemprop="addressLocality">{{$batchInfo->locality}}</span>, 
										<span itemprop="postalCode">{{$batchInfo->venue_pincode}}</span>
									</span>
								</div>
								<div class="item" title="Schedule: {{$batchInfo->batch_comment.' '.$batchInfo->batch_tagline}}">
									<span class="text_over_flow_hide">
									<span class="glyphicon glyphicon-time"></span>
									<time itemprop="openingHours" datetime="Mo-Su">{{$batchInfo->batch_comment.' '.$batchInfo->batch_tagline}}</time>
									<span class="text_over_flow_hide">
								</div>									
							</div>								
							<div class="col-lg-6 col-md-6 col-xs-12 col-sm-7 rightPart maz_pad_z">
								<div class="col-lg-5 col-md-5 col-xs-12 col-sm-6 instConMsg instCon" onClick='show_contact("{{$batchInfo->id}}")'>										
									<span style="display:none" id="contact{{$batchInfo->id}}" class="times_font" itemprop="telephone" >											
										 +91 {{$batchInfo->venue_contact_no}}
									</span>
									<span id="show_contact{{$batchInfo->id}}"><span class="glyphicon glyphicon-phone-alt"></span> View Number</span>
								</div>		
								<div class="col-lg-5 col-md-5 col-xs-12 col-sm-5 instConMsg instMsg" data-toggle="modal" href="#sendMessage" data-batch="{{$batchInfo->batch}}"
									data-email="{{$batchInfo->venue_email}}" data-institute="{{$batchInfo->institute}}" title="Send Message to Institute and get response">
									<span class="glyphicon glyphicon-envelope"></span>										
									<span>Send Message</span>
								</div>	
								<div class="col-lg-12 col-md-12 col-sm-12 facilities_continer"></div>
							</div>								
						</div>
						<div class="col-lg-2 col-md-2 col-xs-12 col-sm-12 bookClass singleSessionPriceContainer 	">
							<div class="singleSessionPrice">
							<div class="times_font">₹<span itemprop="priceRange">{{$batchInfo->batch_single_price}}</span> / Session <br>(or {{$batchInfo->batch_credit}} Credit)</div>
							<a class="btn btn-primary booknowButton" href="/batch/{{$batchInfo->batch}}">Book Now</a>
							</div>
						</div>	
					</div>																		
				</li>
			@endforeach
			@endif					
			<div id="noResults" class='resultsMessage' >No Results Found</div>
			</ul>
			@if($batchesForCategoryLocation)
				<div class="text-right">
					@if(isset($keyword))
						{{$batchesForCategoryLocation->appends(array('keyword' => $keyword))->links()}}
					@else
						{{$batchesForCategoryLocation->links()}}
					@endif
				</div>
			@endif
		</div>
	</div>		
</div>
<div class="container" id="related_data_container">
<!-- For Institutes only-->
@if(isset($instituteSubcategories))	
	<div class="row">
		<div class="col-md-12 col-sm-12 col-xs-12 related_item">
			<?php	    			
	          	$institutesLength = sizeof($instituteSubcategories);
	          	$index = 0;
	          	$maxlength = 12;		          
	          	$width = 3;
	          	if ($institutesLength<$maxlength) { $maxlength = $institutesLength; }        		     
	        ?>
	        <h4>Related to {{$instituteName}}</h4>   
	        <ul>    		        		        
				@for(; $index<$maxlength; $index++ )			  	   
					<li class="col-md-{{$width}} col-sm-{{$width}} col-xs-12 " title="{{$instituteSubcategories[$index]->subcategory}} in {{$locality.', '.$location}}" >
						<a class="text_over_flow_hide" href="/filter/{{$instituteSubcategories[$index]->subcategory}}/{{$locArr[0]}}">
						  {{$instituteSubcategories[$index]->subcategory}} in {{$locality.', '.$location}}
						</a>
					</li>			   
				@endfor	
			</ul>	            		                  		             
	  	</div>       
	</div>	
@endif
<!-- For Search and Institutes -->
@if(isset($locationSubcategories))	
 	<div class="row">
    	<div class="col-md-12 col-sm-12 col-xs-12 related_item">
    		<?php	    			
	          	$institutesLength = sizeof($locationSubcategories);
	          	$index = 0;
	          	$maxlength = 12;		          
	          	$width = 3;
	          	if ($institutesLength<$maxlength) { $maxlength = $institutesLength; }        		     
	        ?>
	        <h4>Related to {{$categories[$category_id-1]->category}} Activities in  {{$location}}</h4>       		        		        
	        <ul>
				@for(; $index<$maxlength; $index++ )			  				   
				    <li class="col-md-{{$width}} col-sm-{{$width}} col-xs-12 " title="{{$locationSubcategories[$index]->subcategory}} Activities in {{$location}}" >
				        <a class="text_over_flow_hide" href="/filter/{{$locationSubcategories[$index]->subcategory}}/{{$location}}">
				          {{$locationSubcategories[$index]->subcategory}} in {{$location}}
				        </a>
				    </li>			   
				@endfor
			</ul>		            		                  		             
      	</div>       
	</div>
@endif
<!-- For Filter Page -->
@if(isset($localities))	
 	<div class="row">
    	<div class="col-md-12 col-sm-12 col-xs-12 related_item">
    		<?php	    			
	          	$institutesLength = sizeof($localities);
	          	$index = 0;
	          	$maxlength = 12;		          
	          	$width = 3;
	          	if ($institutesLength<$maxlength) { $maxlength = $institutesLength; } 
	          	if($subcategory=="Fitness")
	          		$activities = "Activities";
	          	else
	          		$activities = "";
	        ?>
	        <h4>Related to {{$subcategory}} {{$activities}} in {{$locality}} @if($locality!=$location){{', '.$location}} @endif</h4>       		        		        
	        <ul>
				@for(; $index<$maxlength; $index++ )			  	
				    <li class="col-md-{{$width}} col-sm-{{$width}} col-xs-12 " title="{{$subcategory}} {{$activities}} in {{$localities[$index]->locality.', '.$location}}" >
				        <a class="text_over_flow_hide" href="/filter/{{$subcategory}}/{{$localities[$index]->locality}}">
				          {{$subcategory}} {{$activities}} in {{$localities[$index]->locality.', '.$location}}
				        </a>
				    </li>
				@endfor	
			</ul>	            		                  		             
    	</div>       
	</div>	
@endif
<!-- For Filter Page -->
@if(isset($subcategories))	
 	<div class="row">
    	<div class="col-md-12 col-sm-12 col-xs-12 related_item">
    		<?php	    			
	          	$institutesLength = sizeof($subcategories);
	          	$index = 0;
	          	$maxlength = 12;		          
	          	$width = 3;
	          	if ($institutesLength<$maxlength) { $maxlength = $institutesLength; }        		     
	        ?>
	        <h4>Related to {{$categories[$category_id-1]->category}} Activities in {{$locality}}@if($locality!=$location){{', '.$location}}@endif</h4>
	        <ul>
				@for(; $index<$maxlength; $index++ )			  	
				    <li class="col-md-{{$width}} col-sm-{{$width}} col-xs-12 " title="{{$subcategories[$index]->subcategory}} Activities in {{$locality}}@if($locality!=$location){{', '.$location}}@endif" >
				        <a class="text_over_flow_hide" href="/filter/{{$subcategories[$index]->subcategory}}/{{$locality}}">
				          {{$subcategories[$index]->subcategory}} in {{$locality}}@if($locality!=$location){{', '.$location}}@endif
				        </a>
				    </li>			   
				@endfor	
			</ul>	            		                  		             
        </div>       
  	</div>
@endif
</div>
@stop
@section('pagejquery')
	<script type="text/javascript">
		var result = {{json_encode( $batchesForCategoryLocation ) }};  				
		var daysResult = new Array();			
		var categoryName = "{{$categories[$category_id-1]->category}}";		
		var locationName = "{{$locations[$location_id-1]->location}}";		
		var sub_select = new Array();
		var loc_select = new Array();
		var filter_select = new Array();
		sub_select = $('.SubCheckbox:checked').map(function(){return this.value;}).get();
		loc_select = $('.LocCheckbox:checked').map(function(){return this.value;}).get();						
		if(result == "")	
		{			
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
			$(".filters input").click(function(e)
			{	
				$(".filterOptionsList").css('pointer-events','none');
				if($(this).data('filterid') == "subcategory_filter")
				{				
					$('.filter-option-1 .filters').css('opacity','.5');					
				}
				else
				{
					$('.filter-option-2 .filters').css('opacity','.5');					
				}					
				filter_select = $('.filterCheckBox:checked').map(function(){return this.value;}).get();							
				if(filter_select.length>0)
				{						
					sub_select = $('.SubCheckbox:checked').map(function(){return this.value;}).get();					
					loc_select = $('.LocCheckbox:checked').map(function(){return this.value;}).get();
					if(sub_select.length > 0 && loc_select.length == 0)
					{
						window.location.href = "/filter/"+sub_select+"/"+locationName;
					}
					else if(sub_select.length == 0 && loc_select.length >0)
					{
						window.location.href = "/filter/"+categoryName+"/"+loc_select;
					}
					else
					{
						window.location.href = "/filter/"+sub_select+"/"+loc_select;
					}
				}
				else
				{
					window.location.href = "/filter/"+categoryName+"/"+locationName;					
				}				
			});	
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
			$('.fb-like').data('width',$('.filterOption').css('width'));
			//alert($('.fb-like').data('width'));
		});
		
	</script>
@stop