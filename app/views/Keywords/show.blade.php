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
    #loadMore
    {
    	background: lightgray;
    	height: 40px;
    	padding:5px;
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
				<div class="col-md-8 col-xs-11 col-sm-9 column" >
					<center><h4>Results</h4></center>
					<ul class="list-unstyled" valuelimit="" keepcollapsed="" displaytype="" nofilter="" id="filter_data"> 
					</ul>
					<div id="loadMore"><center><img height="30px" width="30px" src="/assets/images/filter_loading.gif"> Loading More Results</center></div><br><br>
				</div><!--end of results info -->
			</div>
		</div>
	</div>
</div>
<br>
</body>
<script type="text/javascript">
	var result = <?php echo json_encode( $batchesForCategoryLocation ) ?>;	
	var range = 10;
	var completeRange = 0;
	var filterRestultCount = 0;
	var fiterStatus;
	displayResults(result,0);
	LoadResult(0,20);
	//Load_Some(20,40);
	function LoadResult(start,end)
	{
		//alert(end);
		var i = 0;
		$("#filter_data li").each(function () 
		{	
			if(i>=start && i<=end)
			{
				//alert('yes');
				var test = $(this).attr('class');
				$('.'+test).fadeIn(100);
			}
			i++;
		});
		completeRange = i;
		range = end;
		//alert(range);

	}

	//var json = JSON.parse(photos);
	//photos = photos[0].toSource();
	function displayResults(results,start)
	{	
		//alert(range);
		var linksContainer = $('#filter_data'),baseUrl;
		for (var i=start; i<results.length; i++)
		{
	    	//console.log("Source: "+results[i]['institute']);
	    	var institute = results[i]['institute'];
			var batch = results[i]['batch'];
			var key  = i;
			var subcategory = results[i]['subcategory'];
			var location_name = results[i]['location'];
			var locality =results[i]['locality'];
			var tagline =results[i]['batch_tagline'];
			var sub_id = results[i]['batch_subcategory_id'];
			var loc_id = results[i]['venue_locality_id'];	
			$(linksContainer).append("<li subcategory='"+sub_id+"' locality='"+loc_id+"' class='batch"+key+"' id='batchInfo' style='display:none'>"+
				"<div class='row clearfix batch' >"+
					"<div class='col-md-12 col-xs-12 col-sm-12 column'>"+
						"<div class='row clearfix'><div class='col-md-12 col-xs-12 col-sm-12 column'>"+
								"<div class='row clearfix'><div class='col-md-12 col-xs-12 col-sm-4 column'>"+
									"<div class='col-md-9 col-xs-12 col-sm-9 column'>"+
										"<span id='inst_name'>"+i+","+institute+"<br></span>"+
										"<span id='inst_tagline'>"+tagline+"<br></span>"+
										locality+","+location_name+
									"</div>"+
									"<div class='col-md-3 col-xs-12 col-sm-3 column'>"+
										"<span id='inst_rating'>Rating<br></span>"+
									"</div>"+
								"</div>"+
								"<div class='col-md-12 col-xs-12 col-sm-4 column'>"+
									"<div class='col-md-6 col-xs-12 col-sm-4 column'>"+
														batch+"<br>"+
														subcategory+"<br>"+
									"<div class='col-md-6 col-xs-12 col-sm-4 column'></div>"+
				"</div></div></div></div></div></div></li>");	
	    }
	}
	$(document).ready(function() {
		var linksContainer = $('#filter_data'),baseUrl;
		window.onscroll = function(ev)
		{
			if ((window.innerHeight + window.scrollY) == $(document).height())
			{
				if(range==result.length)
				{
					$.get("/filter/0/0/0/0/1",function(response)
					{
							alert(response);
					});
				}
				else
				{
					LoadResult(range,range+10);
				}

			}
		}
		var sub_select = new Array();
		var loc_select = new Array();
		$("#filter-sub li").click(function () {
			$(linksContainer).empty();
			displayResults(result,0);
			//$("#batchInfo").css('display','none');
			//var subcategory = 'batch_'+$(this).attr('subcategory');
			sub_select = $('.SubCheckbox:checked').map(function(){return this.value;}).get();
			loc_select = $('.LocCheckbox:checked').map(function(){return this.value;}).get();
			
			//alert('sub '+sub_select);
			//alert('lco' +loc_select);
			if(sub_select.length>0 && loc_select.length>0)
			{
				//alert('two');		
				//$('#batchInfo').css('display','none');	
				filterRestultCount=0;
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
					{	$('.'+test).remove();	}
					else
					{	
						//$('.'+test).fadeIn(500);
						filterRestultCount++;
					}
				});
				LoadResult(0,20);
			}
			else
			{
				if(sub_select.length>0 || loc_select.length>0)
				{
					filterRestultCount=0;
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
						{	$('.'+test).remove();	}
						else
						{	
							//$('.'+test).fadeIn(500);
							filterRestultCount++;
						}
					});
					//alert(filterRestultCount);
					LoadResult(0,20);
				}
				else
				{
					$(linksContainer).empty();
					range = 0;
					LoadResult(0,20);

				}
			}
			if(filterRestultCount<20)
			{	
				//alert('yes');
			}
		});
	});
</script>
</html>
@stop