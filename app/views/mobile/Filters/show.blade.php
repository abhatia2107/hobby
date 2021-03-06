@extends('Layouts.layout')
@section('content')
<style type="text/css">

  	a, a:hover {text-decoration: none}

  	#batchesData { box-shadow: 0px 0px 2px #3366CC; -moz-box-shadow: 0px 0px 2px #3366CC;-webkit-box-shadow: 0px 0px 2px #3366CC;
  		color: #333; font-family: 'Open Sans',sans-serif;font-size: 12px;font-weight: normal;
	}

  	.batch { background: white;border-bottom:1px solid skyblue;}

	.batch .header {padding: 7px 0px 5px 10px;margin: 0; }

	.batch .header h2 { font-size: 16px; font-weight: bold; color: #0033CC;margin: 0 0 7px 0px;padding: 0; }

	.batch .header h3 { font-size: 14px; font-weight: normal; color: #333;}

	.batch .body .glyphicon {color: #3396d1; }

	.batch .body .leftPart {padding: 5px 0 0 10px}

	.batch .body .rightPart {padding: 0px 0px 0px 20px;margin-top: -10px;}
	
	.batch .body {padding-bottom: 5px;}

	.batch .instConMsg { border: 1px solid;padding:3px 3px 3px 3px;border-color: #0099FF;border-radius: 5px;
  		font-size: 14px;height: 26px;overflow: hidden;display: inline-block;margin-bottom:3px;font-family: 
	}

	.batch .instConMsg:hover {background: #E8E8E8; cursor: pointer;}

	.batch .instCon {margin-right:5px;min-width: 140px}

	.batch .instMsg {margin-right:5px;min-width: 120px}

	.batch .singleSessionPrice {  text-align: center;margin-bottom: 10px }

	.times_font { font-family: "Times New Roman", Georgia, Serif;}

	.singleSessionPriceContainer {padding: 0px 0px 0px 10px;margin:20px 0px 0px 0px;text-align: center;}   

	.filterTitle { color:white;font-family: 'Open Sans',sans-serif;font-size: 20px;padding: 0px 5px;
		background:#3396d1;height: 30px;
	}

	.filterOptionsList { padding: 5px 2px 0px 5px;border:1px solid;border-top:0px solid;border-color:#3396d1; }	

	.filters  {  overflow: auto; color: #333;padding: 0px;max-height: 130px;min-height: 130px; }

	#browse-filter   {  font-family: 'Open Sans',sans-serif; font-weight: lighter;   }

	#browse-filter label {font-weight: lighter;}

	.filter-option-2  {  margin-top: 10px;  font-weight: normal;   }	

	.filter-option-1   {  font-weight: normal;   }

	.sub {  cursor: pointer; }

	#fiter-text { font-weight: lighter;  margin-top: -17px; margin-left: 16px;  }

	.resultsMessage { font-size:20px;  background: lightgray;  height: 40px;  padding:5px; text-align: center;  }

	#noResults {  display: none;  }

	.rating_starts  { clear:both;color: #FF8000;margin-top:0px;  }

	#rating { margin-top: -6px; margin-left: 42px;  }

	#rating-tittle, .singleSessionPrice  { text-align: center; float:left; margin: 0px;font-size: 14px;padding: 0px; }

	.singleSessionPrice .btn-primary {height: 22px;margin-top: 2px;padding: 1px 7px;border-radius: 0px;background: #0099FF;border:0px;}	
	
	#contact  { display: none;  }
		
	#filter-tittle-name { font-family: 'Open Sans',sans-serif; font-size: 18px; color: gray; margin-left: 10%}
	
	#results-container {margin: 0 0 1px 0px;z-index: 1000;}

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

  	.filter_page h1 {font-size: 20px;text-align: center;margin: 10px 5px; }

</style>
<div class="container membership_message" style="background:#3396D1">
	<div class="alert">		
		<button type="button" onclick="hideMembershipMessage()" class="close" data-dismiss="alert" aria-hidden="true">x</button>
		<h3><a href="/memberships"><em>{{$homeLang['home_membership_title']}}</em></a></h3>
		<strong>{{$homeLang['home_membership_tagline']}}</strong>
<!--		<div style="color:white;">
			<a href="tel:+919100946081">Call: +919100946081</a>
		</div>-->
	</div>
</div>
<div class="container filter_page" >
	<div class="row">
		<div class="col-xs-12">			
			<div class="row">
				<h1>@if(isset($metaContent[3])){{$metaContent[3]}} @endif</h1>
				<!--Start of filter division -->
				<div class="col-xs-12 filter_options_popup">
					<!--<span id='filter-tittle-name'>Filter By</span>-->
					<div class="header"><a class="glyphicon glyphicon-arrow-left" id="return"></a> Filter </div>
					<div class="filter_options_container">
						<div id="browse-filter" class="filter-option-1 filterOption" style="max-height:45%">	
							<div class="filterTitle">Activity</div>
							<div class="filterOptionsList">
								<ul class="list-unstyled filters" id="filter-sub"> 	
									@foreach ($subcategoriesForCategory as $subcategoryData)
										<?php
											$subcategoryName = $subcategoryData->subcategory;
											$sub_id = $subcategoryData->id;
										?>				
										<li subcategory="{{$sub_id}}" >								
										 	 <label class="sub"><input autocomplete="off" @if(isset($subArr))@if(in_array($sub_id, $subArr)) checked="checked" @endif @endif value="{{$subcategoryName}}" type="checkbox" class="SubCheckbox filterCheckBox" @if(isset($subArr))@if(in_array($sub_id, $subArr)) checked="checked" @endif @endif /><span class="checkbox_data">{{' '.$subcategoryName}}</span></label>
										</li>
								 	@endforeach
								 </ul>
							</div>
						</div>			
						<div id="browse-filter" class="filter-option-2 filterOption" style="max-height:45%">	
							<div class="filterTitle">Locality</div> 
							<div class="filterOptionsList">
								<ul class="list-unstyled filters" id="filter-sub"> 
									@foreach ($localitiesForLocation as $localityData)
										<?php 
											$localityName = $localityData->locality;
											$localityUrl = $localityData->locality_url;
											$loc_id = $localityData->id;
										?>
										<li subcategory="{{$loc_id}}" >								
										 	 <label class="sub"><input autocomplete="off" @if(isset($locArr))@if(in_array($loc_id, $locArr)) checked="checked" @endif @endif value="{{$localityUrl}}" type="checkbox" class="LocCheckbox filterCheckBox"  @if(isset($locArr))@if(in_array($loc_id, $locArr)) checked="checked" @endif @endif  /><span class="checkbox_data">{{' '.$localityName}}</span></label>
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
				<div class="col-xs-12 maz_pad_z" id="results-container" >
					<ul class="list-unstyled maz_pad_z row" id="batchesData">					
					@if(!empty($batchesForCategoryLocation)) 
					@foreach($batchesForCategoryLocation as $batchInfo)
						<li itemscope itemtype='http://schema.org/SportsActivityLocation' id="/batch/{{$batchInfo->batch}}" >
							<div class="batch col-xs-12 maz_pad_z" id="batch{{$batchInfo->id}}" >
								<div class="col-xs-8 body maz_pad_z" >
									<div class="col-xs-12 header">
										<h2 title="Institute Name"><a href="/batch/{{$batchInfo->batch}}"><span itemprop="name">{{$batchInfo->institute}}</span></a></h2>
										<h3 class="maz_pad_z" title="Activity Name, Locality">
											<span itemprop="address" itemscope itemtype="http://schema.org/PostalAddress">{{$batchInfo->subcategory}}, 
											<span itemprop="addressLocality">{{$batchInfo->locality}}</span></span>
										</h3>
									</div>																
									<div class="col-xs-12 leftPart maz_pad_z" >
										<div class="item" title="Landmark is {{$batchInfo->venue_landmark}}">
											<span class="text_over_flow_hide">
											<span class="glyphicon glyphicon-map-marker"></span>
											<span>{{$batchInfo->venue_landmark}}</span>
											</span>
										</div>
										<div class="item" title="Schedule: @if($batchInfo->batch_institute_id==aol_institute) {{$batchInfo->batch_comment}} @if($batchInfo->batch_tagline) {{', '.$batchInfo->batch_tagline}} @endif @if($batchInfo->batch_aol_3) {{', '.$batchInfo->batch_aol_3}} @endif @if($batchInfo->batch_aol_4) {{', '.$batchInfo->batch_aol_4}} @endif @if($batchInfo->batch_aol_5) {{', '.$batchInfo->batch_aol_5}} @endif @if($batchInfo->batch_aol_6) {{', '.$batchInfo->batch_aol_6}} @endif @else {{$batchInfo->batch_comment.' '.$batchInfo->batch_tagline}} @endif">
											<span class="text_over_flow_hide">
											<span class="glyphicon glyphicon-time"></span>
											<span>
												@if($batchInfo->batch_institute_id==aol_institute)
													{{$batchInfo->batch_comment}}
													@if($batchInfo->batch_tagline)
														{{', '.$batchInfo->batch_tagline}}
													@endif
													@if($batchInfo->batch_aol_3)
														{{', '.$batchInfo->batch_aol_3}}
													@endif
													@if($batchInfo->batch_aol_4)
														{{', '.$batchInfo->batch_aol_4}}
													@endif
													@if($batchInfo->batch_aol_5)
														{{', '.$batchInfo->batch_aol_5}}
													@endif
													@if($batchInfo->batch_aol_6)
														{{', '.$batchInfo->batch_aol_6}}
													@endif
												@else
													{{$batchInfo->batch_comment.' '.$batchInfo->batch_tagline}}
												@endif
											</span>
											<span class="text_over_flow_hide">
										</div>									
									</div>								
									<div class="col-xs-12 rightPart maz_pad_z"style='display:none'>
										<div class="col-xs-12 instConMsg instCon" onClick="show_contact({{$batchInfo->id}})">										
											<span style='display:none'value="$batchInfo->id" id="contact{{$batchInfo->id}}" class="times_font" itemprop="telephone">											
												+91 {{$batchInfo->venue_contact_no}}
											</span>
											<span id="show_contact{{$batchInfo->id}}"><span class="glyphicon glyphicon-phone-alt"></span> View Number</span>
										</div>																					
									</div>								
								</div>
								<div class="col-xs-4 singleSessionPriceContainer maz_pad_z">
									<div class="singleSessionPrice">
									<div class="times_font">₹{{$batchInfo->batch_single_price}} / Session <br>(or {{$batchInfo->batch_credit}} Credit)</div>
									<button class="btn btn-primary booknowButton" data-href="/batch/{{$batchInfo->batch}}">Book Now</button>
									</div>
								</div>
							</div>	
						</li>
					@endforeach
					@endif					
					</ul>					
					<div id="noResults" class='resultsMessage' >No Results Found</div>
				</div><!--end of results info -->
				@if($batchesForCategoryLocation)
					<div class = "text-center">
						@if(isset($keyword))
							{{$batchesForCategoryLocation->appends(array('keyword' => $keyword))->links()}}
						@else
							{{$batchesForCategoryLocation->links()}}
						@endif
					</div>
				@endif
			</div>
		</div>
		<div class="filter_options_button"><button onclick="displayFilterOptions();" class="btn btn-primary">Filter</button></div>
	</div>	
</div>
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
		var categoryName = "{{$categories[$category_id-1]->category}}";		
		var locationName = "{{$locations[$location_id-1]->location}}";		
		var sub_select = new Array();
		var loc_select = new Array();
		var filter_select = new Array();		
		sub_select = $('.SubCheckbox:checked').map(function(){return this.value;}).get();
		loc_select = $('.LocCheckbox:checked').map(function(){return this.value;}).get();			
		// navActive('NavItem'+categoryId);
		if(result == "")
		{
			$('#loadMore').css('display','none');
			$('#noResults').css('display','block');
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
			$('body').css('overflow-x','hidden');	
			$(".filter_options_popup #return").click(function(){
				$('.filter_options_popup').hide();
				$('html').css('overflow-y','auto');
				$('#results-container').show();	
			});
			$(".booknowButton").click(function (e) {
				var url = $(this).data("href");
				window.location.href = url;
			});	
		});
		function filterApply() 
		{
			$('html').css('overflow-y','auto');
			$('.filter_options_popup').hide();
			$('#results-container').show();				
			$('#loadMore').show();
			$('#noResults').hide();						
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
		}
		function resetFilter () {
			$('.filterCheckBox:checked').map(function () {
				$(this).removeAttr('checked');
			});
		}
	</script>
@stop
