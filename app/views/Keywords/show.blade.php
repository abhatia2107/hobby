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
      background: white;border:0px solid;margin-bottom: 15px;border-color: skyblue;
        -webkit-box-shadow: 0px 3px 0px -2px #0099FF;
            box-shadow: 0px 3px 0px -2px #0099FF;
             color: #333;

    }
    #filter_data
   	{
   		padding-top: 10px;
   		box-shadow: 0px 0px 4px #3366CC;-moz-box-shadow: 0px 0px 4px #3366CC;-webkit-box-shadow: 0px 0px 4px #3366CC;
   		margin-bottom: 20px;
   		 color: #333;
   	}
    #batch_name
    {
    	font-size: 22px;
    	font-weight: bold;
    	color: #0033CC;
    }
    #inst_tagline
    {
    	font-size: 14px;
    	font-weight: normal;
    	 color: #333;
    }
    #inst_rating
    {
    	margin-top: 10px;

    }
    .inst_name
    {
    	font-size: 16px;
    	font-weight: normal;
    	 color: #333;
    }
    .filters
    {
    	max-height: 155px;
    	overflow: auto;
    	 color: #333;
    }
    #browse-filter
    {
    	
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
    .resultsMessage
    {
    	font-size:20px;
    	background: lightgray;
    	height: 40px;
    	padding:5px;
    }
    #noResults
   	{
   		display: none;
   	}
   	.location-icon
   	{
   		width:12px;height: 17px;
   		margin-top: -4px;
   		margin-right: 5px;
   	}
   	#inst_contact
   	{
   		min-width:175px;
   		height:30px;
   		border: 1px solid;
   		padding:3px;
   		border-color: #0099FF;
   		border-radius: 4px;
   		float: left;
   		text-align: center;
   		margin-right:5px;
   		margin-top: 2px;
   	}
   	#inst_contact:hover
   	{
   		background: #E8E8E8  ;
   		cursor: pointer;
   	}
   	#inst_message:hover
   	{
   		background: #E8E8E8  ;
   		cursor: pointer;
   	}
   	#inst_message
   	{
   		margin-top: 2px;
   		min-width:130px;
   		height:30px;
   		border: 1px solid;
   		padding:3px;
   		border-color: #0099FF;
   		border-radius: 4px;
   		float: left;
   		text-align: center;
   	}
   	.inscore {
   			border-radius: 50%;
		border: 4px solid;
		border-color:#FF8000;
		vertical-align: middle;
	    width: 45px;
	    height: 45px;
	    padding: 5px 5px 5px 5px; 
	    font-size: 19px;
	    font-weight: bold;
	    color: #333;
	    text-align: center;
	    float: left;
	    margin-left: 18px;
	    margin-bottom: 5px;
	}
	.rating_starts
	{
		clear:both;
		color: #FF8000;
		margin-top:10px;
	}
	#rating
	{
		margin-top: -6px;
		margin-left: 42px;
	}
	#rating-tittle
	{
		text-align: center;
		float:left;
		margin-top: 10px;
	}
	#inst_type
	{
		margin-top: 10px;
	}
	#inst_price
	{
		margin-top: 10px;
	}
	#hand-icon
	{
		color: #0099FF;
		margin-right: 5px;
	}
	#cell-icon
	{
		color: #0099FF;
		font-size: 0.9em;
	}
		#msg-icon
	{
		color: #0099FF;
		font-size: 0.9em;
	}
	.day
	{
		padding: 1px;
		padding-top:0px;
		width:20px;
		height:23px;
		border: 1px solid;
		border-color: #0099FF;
		margin-left: 4px;
		float:left;
		text-align: center;
		opacity: .20;
		margin-top: 11px;
	}
	#contact
	{
		display: none;
	}
	.institute-profile-pic 
	{
		width:146px;
		height: 145px;
		border-radius: 50%;
		border: 5px solid;
		border-color:#0099FF;
		vertical-align: middle;
		margin-top: -9px;
		margin-bottom: 10px;
	}
	.institute-profile-pic img 
	{
		width:140px;
		height: 140px;
	}
	#inst_details
	{
		margin-top: 7px;
		margin-bottom: 10px;
	}
	#batch-schedule
	{
		margin-top: 10px;
	}
	.sendMessage a
	{
		color: #333;
	}

	@media screen and (min-width: 768px) {
	
	#sendMessage .modal-dialog  {width:430px;}

	}
	#sendMessage 
	{
		border-radius: 5px;
	}
	#sendMessage .modal-dialog
	{
		margin-top:7%;
	}
	#sendMessage .modal-header
	{
		font-size: 22px;
		color: #333333;
		font-weight: bolder;
		font-family: serif;
	}
	#rating-schedule
	{
		float: right;
	}
	#MsgInputName
	{
		background: 
	}
	.inner-addon { 
    position: relative; 
}

/* style icon */
.inner-addon .glyphicon {
  position: absolute;
  padding: 8px;
  pointer-events: none;
}

/* align icon */
.left-addon .glyphicon  { left:  0px;}
.right-addon .glyphicon { right: 0px;}

/* add padding  */
.left-addon input  { padding-left:  30px; }
.right-addon input { padding-right: 30px; }
#offerMessage
{
	float: right;
	margin-top: -60px;
}
#offerMessage .glyphicon
{
	float: right;
	font-size: 100px;
}

</style>
</head>
<body>
@extends('Layouts.layout')
@section('content')
<div class="modal fade" id="sendMessage" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				 <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
				
					<center>Send Message To Institute</center>
			</div>
			<div class="modal-body">
				<form role="form">
					<div class="form-group inner-addon left-addon" >
						 <i class="glyphicon glyphicon-user"></i>
						 <input type="text" class="form-control" style="padding:0px 0px 0px 30px; " name='InputName' id='MsgInputName' placeholder='Enter Your Name' required='required'/>
					</div>
					<div class="form-group inner-addon left-addon">
						<i class="glyphicon glyphicon-envelope"></i>
						 <input type="email" class="form-control" name='InputEmail' id='MsgInputEmail'  placeholder='Enter Your E-Mail Address' required='required'/>
					</div>
					<div class="form-group">
					  <label for="comment">Message:</label>
					  <textarea class="form-control" rows="3" name='InputMessage' id="comment"></textarea>
					</div>
			</div>
			<div class="modal-footer">
				 <center><button type="submit" class="btn btn-primary">Send Message</button></center>
				 </form>
			</div>
		</div>
	</div>				
</div>
<div class="container" >
	<div class="row clearfix">
		<div class="col-md-12 col-xs-12 col-sm-12 column">
			<div class="row clearfix">
				<!--Start of filter division -->
				<div class="col-md-3 col-xs-12 col-sm-3 column">
					<h4>Filter Options</h4>
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
							 	 <label class="sub"><input autocomplete="off" style="" value="{{$sub_id}}" type="checkbox" class="SubCheckbox" />{{' '.$subcategory}}</label>
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
							<li subcategory="{{$loc_id}}" >								
							 	 <label class="sub"><input autocomplete="off" style="" value="{{$loc_id}}" type="checkbox" class="LocCheckbox" />{{' '.$locality}}</label>
							</li> 
						@endforeach
						 </ul> 
					</div>
				</div>
				<div class="col-md-9 col-xs-11 col-sm-9 column" >
					<center><h4>Results</h4></center>
					
					<ul class="list-unstyled" valuelimit="" style="" keepcollapsed="" displaytype="" nofilter="" id="filter_data"> 
					</ul>
					<div id="loadMore" class='resultsMessage'><center><img height="30px" width="30px" src="/assets/images/filter_loading.gif"> Loading More Results</center></div>
					<div id="noResults" class='resultsMessage' ><center>No More results to display.</center></div><br><br>
				</div><!--end of results info -->
			</div>
		</div>
	</div>
</div>
<br>
</body>
<script type="text/javascript">
	var result = <?php echo json_encode( $batchesForCategoryLocation ) ?>;
	var categoryId = "<?php echo $category_id; ?>";
	var locationId = "<?php echo $location_id; ?>";
	var range = 10;
	var filterRestultCount = 0;
	var filterStatus=false;
	var loadFilters = false;
	var chunk = 1;
	var resultCount = 0;
	var sub_select = new Array();
	var loc_select = new Array();
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
	function LoadFilterResults(sub_select,loc_select,start)
	{
		resultRange = result.length;
		if(sub_select.length==0)
			sub_select=0;
		if(loc_select.length==0)
			loc_select=0;
		$.get("/filter/"+sub_select+"/"+loc_select+"/"+categoryId+"/"+locationId+"/"+chunk,function(response)
		{
			chunk++;
			loadFilters = true;	
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
				displayResults(result,start);
				var count  = LoadResult(start,start+20);
				if(count<10)
				{
					LoadFilterResults(sub_select,loc_select,0);
				}
			}
		});
	}
	function show_contact (id) 
	{
		$('#show_contact'+id).empty();
		$('#contact'+id).fadeIn(700);
		// body...
	}
	function displayResults(results,start)
	{
		var linksContainer = $('#filter_data'),baseUrl;
		for (var index=start; index<results.length; index++)
		{
		    var institute = results[index]['institute'];
		    var institute_id =  results[index]['batch_institute_id'];
		    var institute_photo_path = '/assets/images/institute/institute.gif';
		    /*var institute_photo_exists = results[index]['institute_photo'];
		    if(institute_photo_exists==1)
		    {	institute_photo_path = "/assets/images/institute/"+institute_id+".jpg";}*/
			var batch = results[index]['batch'];
			var batchID= results[index]['id'];
			var price = results[index]['batch_price'];
			var subcategory = results[index]['subcategory'];
			var category =  results[index]['category'];
			var location_name = results[index]['location'];
			var locality =results[index]['locality'];
			var tagline =results[index]['batch_tagline'];
			var subcategoryID = results[index]['batch_subcategory_id'];
			var localityID = results[index]['venue_locality_id'];
			var contact = results[index]['venue_contact_no'];
			var weekDays = ["monday", "tuesday", "wednesday","thursday","friday","saturday","sunday"];
			var daysResult = new Array();
			for(day = 0;day<7;day++)
			{
				var dayID = "batch_class_on_"+weekDays[day];
				daysResult[day] = results[index][dayID];
			}
			$(linksContainer).append("<li subcategory='"+subcategoryID+"' locality='"+localityID+"' class='batch"+index+"' id='batchInfo' style='display:none'>"+
				"<div class='row clearfix batch' >"+
					"<div class='col-md-12 col-xs-12 col-sm-12 column'>"+
						"<div class='row clearfix batch'>"+
							"<div class='col-md-12 col-xs-12 col-sm-12 column' >"+
								"<div class='col-md-12 col-xs-12 col-sm-12 column'>"+
									"<span id='batch_name'><a href='/batches/"+batchID+"' >"+batch+"<br></span></a>"+
									"<span class='inst_name'>"+institute+".</span>"+
								"</div>"+
							"</div>"+
						"</div>"+
						"<div class='row clearfix batch'>"+
							"<div class='col-md-12 col-xs-12 col-sm-12 column' style='margin-top:20px'>"+
								"<div class='col-md-3 col-xs-12 col-sm-12 column'>"+
									"<center><img src='"+institute_photo_path+"' class='institute-profile-pic' ></ 	>"+
								"</div>"+
								"<div class='col-md-6 col-xs-12 col-sm-8 column'>"+
									"<div id='inst_contact'  onClick='show_contact("+index+")' class='col-md-5 col-xs-12 col-sm-4 column'><span style='display:none' id='contact"+index+"'><span id='cell-icon' class='glyphicon glyphicon-phone-alt'></span> "+contact+"</span>"+
										"<span id='show_contact"+index+"'><span id='cell-icon' class='glyphicon glyphicon-phone-alt'></span> View Phone Number</span>"+
									"</div>"+
									"<div href='#sendMessage' data-toggle='modal' id='inst_message' class='col-md-4 col-xs-12 col-sm-4 column'><i id='msg-icon' class='glyphicon glyphicon-envelope'></i> Send Message</div>"+
									"<div id='inst_details' class='col-xs-12' >"+
										"<div id='inst_type'><span id='hand-icon'>☛</span>Type: "+subcategory+", "+category+".</div>"+
										"<div id='inst_price'><span id='hand-icon'>☛</span>Price:  ₹ "+price+"</div>"+
										"<div id='inst_price'><span id='hand-icon'>☛</span>Address: "+locality+", "+location_name+"</div>"+
									"</div>"+
								"</div>"+
								"<div class='col-md-3 col-xs-12 col-sm-4 column' id='rating-schedule'>"+
								"<div id='rating' ><div class='inscore' ><span id='rating-value'>9.7</span></div><div class='rating_starts'><span class='glyphicon glyphicon-star'></span><span class='glyphicon glyphicon-star'></span><span class='glyphicon glyphicon-star'></span><span class='glyphicon glyphicon-star'></span><span class='glyphicon glyphicon-star'></span></div></div>"+
									"<div id='batch-schedule'><center>Batch Schedule</center><div id='day1' class='day'>M</div><div id='day2' class='day'>T</div><div id='day3' class='day'>W</div>"+
									"<div id='day4' class='day'>T</div><div id='day5' class='day'>F</div><div id='day6' class='day'>S</div><div id='day7' class='day'>S</div></div>"+
								"</div>"+
						"</div>"+
					"</div>"+
				"</div>"+
				"</div><hr></li>");
				for(day=0;day<7;day++)
				{
					if(daysResult[day]==1)
					{
						$('.batch'+index+' #day'+(day+1)).css('opacity','1');
					}
				}				
	    }
	}
	$(document).ready(function() {
		var linksContainer = $('#filter_data'),baseUrl;
		window.onscroll = function(ev)
		{
			if ((window.innerHeight + window.scrollY) == $(document).height())
			{
				resultRange = result.length;
				if(range>=resultRange)
				{
					if(!filterStatus)
					{
						$.get("/filter/categories/"+categoryId+"/locations/"+locationId+"/chunk/"+chunk,function(response)
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
						//alert(sub_select+","+loc_select);
						LoadFilterResults(sub_select,loc_select,resultRange);

					}
				}
				else
				{	LoadResult(range,range+10);	}

			}
		}
		$("#filter-sub input").click(function () {
			//e.preventDefault();
			//e.stopPropagation();
			//	e.preventDefault();
			//	alert('yes');
			filterStatus = true;
			$('#loadMore').css('display','block');
			$('#noResults').css('display','none');
			result = [];
			//result = <?php echo json_encode( $batchesForCategoryLocation ) ?>;
			//alert('yes');
		//	alert(result.length);
			$(linksContainer).empty();
			sub_select = $('.SubCheckbox:checked').map(function(){return this.value;}).get();
			loc_select = $('.LocCheckbox:checked').map(function(){return this.value;}).get();
			//alert(sub_select+','+loc_select);
			if(sub_select.length>0 || loc_select.length>0)
			{
				chunk = 0;
				LoadFilterResults(sub_select,loc_select,0);
			}
			else
			{
				chunk = 0;
				$.get("/filter/categories/"+categoryId+"/locations/"+locationId+"/chunk/"+chunk,function(response)
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
				});
			}
		});
	});
</script>
</html>
@stop