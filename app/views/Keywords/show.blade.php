<!DOCTYPE html>
<html>
<head>
	<title></title>
	<style type="text/css">
	body
	{
		background:white
	}
    #batchInfo
    {
      background: white;border:0px solid;padding:10px 10px;margin-bottom: 15px;border-color: skyblue;
      box-shadow: 0px 0px 10px rgba(0,0,0,0.5);-moz-box-shadow: 0px 0px 10px rgba(0,0,0,0.5);-webkit-box-shadow: 0px 0px 10px rgba(0,0,0,0.5);
    }
    #inst_name
    {
    	font-size: 19px;
    	font-weight: normal;
    	color: blue;
    }
    #inst_tagline
    {
    	font-size: 14px;
    	font-weight: normal;
    	color: black;
    }
    #inst_rating
    {
    	font-size: 18px;
    	font-weight: normal;
    	color: blue;
    }
     .sub input[type="checkbox"]
    {
    	height: 15px;
    }
    .sub input[type="checkbox"]:checked
    {
    	background:url(/assets/images/checked.gif) center top no-repeat;
    }
    .filters
    {
    	max-height: 155px;
    	overflow: auto;
    }
    #browse-filter
    {
    	font-size: 14px;
    	font-style: normal;
    	color:black;
    	line-height: 1em;
    }
    .filter2
    {
    	line-height: 1em;
    }
    .sub
    {
    	cursor: pointer;
    }
    #browse-filter h4
    {
    	color:black;
    }
    #fiter-text 
    {
    	font-weight: lighter;
    	margin-top: -17px;
    	margin-left: 16px;
    }


  </style>
</head>
<body>


@extends('Layouts.layout')
@section('content')
<div class="container" >
	<div class="row clearfix">
		<div class="col-md-12 col-xs-12 col-sm-12 column">
			<div class="row clearfix">
				<!--Start of filter division -->
				<div class="col-md-3 col-xs-12 col-sm-3 column">
					<h4>Filter Options</h4>
					<br>
					<div id="browse-filter">	
						<h4>Sub Categories</h4> 
						<ul class="list-unstyled filters filter1" valuelimit="" keepcollapsed="" displaytype="" nofilter="" id="filter-sub"> 
						
						@foreach ($subcategoriesForCategory as $subcategoryData)
							<?php
								$subcategory = $subcategoryData->subcategory;
								$sub_id = $subcategoryData->id;
								$class = preg_replace('/[^A-Za-z0-9\-]/', '', $subcategory); 
							?>				
							<li subcategory="{{$sub_id}}" >								
							 	 <label class="sub"><input autocomplete="off" style="" value="{{$sub_id}}" type="checkbox" class="SubCheckbox" /><div id="fiter-text">{{' '.$subcategory}}</div></label>
							</li>
						 @endforeach
						 </ul> 
					</div>
					<br>
					<div id="browse-filter">	
						<h4>Locality</h4> 
						<ul class="list-unstyled filters filter1" valuelimit="" keepcollapsed="" displaytype="" nofilter="" id="filter-sub"> 
						@foreach ($localitiesForLocation as $localityData)
							<?php 
								$locality = $localityData->locality;
								$loc_id = $localityData->id;
								$class = preg_replace('/[^A-Za-z0-9\-]/', '', $locality);
							?>
							<li subcategory="{{$loc_id}}">								
							 	 <label class="sub"><input autocomplete="off" style="" value="{{$loc_id}}" type="checkbox" class="LocCheckbox" /><div id="fiter-text">{{' '.$locality}}</div></label>
							</li> 
						@endforeach
						 </ul> 
					</div>
				</div>
				<div class="col-md-8 col-xs-11 col-sm-9 column">
					<center><h4>Results</h4></center>
					<ul class="list-unstyled" valuelimit="" keepcollapsed="" displaytype="" nofilter="" id="filter_data"> 
					@foreach ($batchesForCategoryLocation as $key => $batchInfo)
						<?php  
							$institute = $batchInfo->institute;
							$batch = $batchInfo->batch;
							$subcategory = $batchInfo->subcategory;
							$location = $batchInfo->location;
							$sub_id = $batchInfo->batch_subcategory_id;
							$loc_id = $batchInfo->venue_locality_id;
							$locality = $batchInfo->locality;
							$tagline = $batchInfo->batch_tagline;
							$sub = preg_replace('/[^A-Za-z0-9\-]/', '', $subcategory);
							$loc = preg_replace('/[^A-Za-z0-9\-]/', '', $locality);
						?>
						<li subcategory='{{$sub_id}}' locality='{{$loc_id}}' class='batch{{$key}}' id='batchInfo' style='display:block'>
						<div class='row clearfix batch' >
							<div class="col-md-12 col-xs-12 col-sm-12 column" >
								<div class="row clearfix">
									<div class="col-md-12 col-xs-12 col-sm-12 column">
										<div class="row clearfix">
											<div class="col-md-12 col-xs-12 col-sm-4 column">
												<div class="col-md-9 col-xs-12 col-sm-9 column">
													<span id="inst_name">{{$institute}}<br></span>
													<span id="inst_tagline">{{$tagline}}<br></span>
													{{ $locality }}<br>
												</div>
												<div class="col-md-3 col-xs-12 col-sm-3 column">
													<span id="inst_rating">{{ 'Rating' }}<br></span>
												</div>
											</div>
											<div class="col-md-12 col-xs-12 col-sm-4 column">
												
												<div class="col-md-6 col-xs-12 col-sm-4 column">
													{{ $batch }}
													{{ $batchInfo->batch_id }}
													{{ $subcategory}}
												</div>
												<div class="col-md-6 col-xs-12 col-sm-4 column">
											
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div> <!--end of batch info -->
						</li>
					@endforeach
					</ul>
				</div><!--end of results info -->
			</div>
		</div>
	</div>
</div>
<br>
</body>
<script type="text/javascript">
	$(document).ready(function() {
			var sub_select = new Array();
			var loc_select = new Array();
			sub_select[0] =0;
			loc_select[0] =0;
			$("#filter-sub li").click(function () {
				//var subcategory = 'batch_'+$(this).attr('subcategory');
				sub_select = $('.SubCheckbox:checked').map(function(){return this.value;}).get();
				loc_select = $('.LocCheckbox:checked').map(function(){return this.value;}).get();
				$.get("/filter/"+sub_select+"/"+loc_select+"/1/1/1",function(response)
				{
					alert(response[4].toSource());
				});
				//alert('sub '+sub_select);
				//alert('lco' +loc_select);
				if(sub_select.length>0 && loc_select.length>0)
				{
					//alert('two');		
					//$('#batchInfo').css('display','none');	
					$("#filter_data li").each(function () 
					{
						var test = $(this).attr('class');
						subcategory = $(this).attr('subcategory');
						locality = $(this).attr('locality');
						//alert(locality);
						var subResult = jQuery.inArray(subcategory,sub_select);
						var locResult = jQuery.inArray(locality,loc_select);
						//alert('sub '+sub_select);
						//alert('lco' +loc_select);
						if (subResult==-1 || locResult==-1) 
						{	$('.'+test).fadeOut(500);	}
						else
						{	$('.'+test).fadeIn(500);	}
					});
				}
				else
				{
					if(sub_select.length>0 || loc_select.length>0)
					{
						//alert('yes');
						//$('#batchInfo').css('display','none');	
						$("#filter_data li").each(function () 
						{
							//alert('yes');
							var test = $(this).attr('class');
							subcategory = $(this).attr('subcategory');
							locality = $(this).attr('locality');
							var subResult = jQuery.inArray(subcategory,sub_select);
							var locResult = jQuery.inArray(locality,loc_select);
							if (subResult==-1 && locResult==-1) 
							{	$('.'+test).fadeOut(500);	}
							else
							{	$('.'+test).fadeIn(500);	}
						});
					}
					else
					{
						$("#filter_data li").each(function () 
						{
							var class_name = $(this).attr('class');
							$('.'+class_name).fadeIn(500);
						});
					}
				}
			});
	});
</script>
</html>
@stop