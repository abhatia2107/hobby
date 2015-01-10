@extends('Layouts.layout')
@section('content')
<div class="modal fade" id="sendMessage" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" id='close_model' class="close" data-dismiss="modal" aria-hidden="true">×</button>
					<center>Send Message To Institute</center>
			</div>
			<div class="modal-body">
				<form action="/batches/sendMessage" method="post" enctype="multipart/form-data" role="form">
					<input type="hidden" name="csrf_token" value="{{csrf_token()}}">
					<input type="hidden" name="batch">
					<input type="hidden" name="email">
					<input type="hidden" name="institute">
					<div class="form-group inner-addon left-addon" >
						 <i class="glyphicon glyphicon-user"></i>
						 <input type="text" class="form-control" style="padding:0px 0px 0px 30px; " name='msgInputName' id='MsgInputName' placeholder='Enter Your Name' required='required'/>
					</div>
					<div class="form-group inner-addon left-addon">
						<i class="glyphicon glyphicon-envelope"></i>
						 <input type="email" class="form-control" name='msgInputEmail' id='MsgInputEmail'  placeholder='Enter Your E-Mail Address' required='required'/>
					</div>
					<div class="form-group inner-addon left-addon">
						<i class="glyphicon glyphicon-phone"></i>
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
<div class="container" >
	<div class="row clearfix">
		<div class="col-md-12 col-xs-12 col-sm-12 column">
			<ul class="breadcrumb" style="background: white;">
				<li>
					<a href="/">Home</a>
				</li>
				<li>
					<?php $batchDet = $batchesForCategoryLocation[0]; ?>
					<a href="javascript:void()">{{$batchDet->category}}</a>
				</li>
				<li></li>
			</ul>
			<div class="row clearfix">
				<!--Start of filter division -->
				<div class="col-md-3 col-xs-12 col-sm-3 column" style="margin-top:-15px">
					<span id='filter-tittle-name'>Filter By</span>
					<div id="browse-filter" class="filter-option-1">	
						<h4>Sub Categories</h4> 
						<ul class="list-unstyled filters" valuelimit="" keepcollapsed="" displaytype="" nofilter="" id="filter-sub"> 	
							@foreach ($subcategoriesForCategory as $subcategoryData)
								<?php
									$subcategory = $subcategoryData->subcategory;
									$sub_id = $subcategoryData->id;
								?>				
								<li subcategory="{{$sub_id}}" >								
								 	 <label class="sub"><input autocomplete="off" value="{{$sub_id}}" type="checkbox" class="SubCheckbox filterCheckBox" />{{' '.$subcategory}}</label>
								</li>
							 @endforeach
						 </ul> 
						 <hr>
					</div>
					<br>
					<div id="browse-filter" class="filter-option-2">	
						<h4>Locality</h4> 
						<ul class="list-unstyled filters" valuelimit="" keepcollapsed="" displaytype="" nofilter="" id="filter-sub"> 
							@foreach ($localitiesForLocation as $localityData)
								<?php 
									$locality = $localityData->locality;
									$loc_id = $localityData->id;
								?>
								<li subcategory="{{$loc_id}}" >								
								 	 <label class="sub"><input autocomplete="off" style="" value="{{$loc_id}}" type="checkbox" class="LocCheckbox filterCheckBox" />{{' '.$locality}}</label>
								</li> 
							@endforeach
						 </ul>
						 <hr>
					</div>
					<div id="browse-filter" class="filter-option-3">	
						<h4>Trial Available</h4> 
						<ul class="list-unstyled filters" valuelimit="" keepcollapsed="" displaytype="" nofilter="" id="filter-sub"> 
						@foreach ($trial as $index => $trialValue)
							<li trial="{{$index}}" >								
							 	 <label class="sub"><input autocomplete="off" style="" value="{{$index}}" type="checkbox" class="trialCheckbox filterCheckBox" />{{' '.$trialValue}}</label>
							</li> 
						@endforeach
						 </ul> 
						 <hr>
					</div>
				</div>
				<div class="col-md-9 col-xs-11 col-sm-9 column" style=" font-family: "Times New Roman", Times, serif;" >
					<ul class="list-unstyled" valuelimit="" style="" keepcollapsed="" displaytype="" nofilter="" id="filter_data"> 
					</ul>
					<div id="loadMore" class='resultsMessage'><center><img height="30px" width="30px" src="/assets/images/filter_loading.gif"> Loading More Results</center></div>
					<div id="noResults" class='resultsMessage' ><center>No More results to display.</center></div><br><br>
				</div><!--end of results info -->
			</div>
		</div>
	</div>
</div>
@stop
@section('pagejquery')
	<script type="text/javascript">
		var result = <?php echo json_encode( $batchesForCategoryLocation ) ?>;
		var trials = <?php echo json_encode( $trial ) ?>;
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
		var filter_select = new Array();
		var trial_select = new Array();

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
				var email = results[index]['venue_email'];
				var contact = results[index]['venue_contact_no'];
				var weekDays = ["monday", "tuesday", "wednesday","thursday","friday","saturday","sunday"];
				var daysResult = new Array();
				var trialID = results[index]['batch_trial'];
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
										"<div class='col-md-8 col-xs-12 col-sm-8 column'>"+
											"<span id='batch_name'><a href='/batches/show/"+batchID+"' >"+batch+"</span></a>"+
											"<br><span class='inst_name'>"+institute+".</span>"+
										"</div>"+
										"<div class='col-md-4 col-xs-12 col-sm-4 column'>"+
											"<span id='tag-icon' ><span class='glyphicon glyphicon glyphicon-tags'></span>"+trials[trialID]+"</span>"+	
										"</div>"+
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
										"<div href='#sendMessage' data-toggle='modal' data-email="+email+" data-institute="+institute+" data-batch="+batch+" id='inst_message' class='col-md-4 col-xs-12 col-sm-4 column'><i id='msg-icon' class='glyphicon glyphicon-envelope'></i> Send Message</div>"+
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
				//triggered when modal is about to be shown
		$('#sendMessage').on('show.bs.modal', function(e) {

		    //get data-id attribute of the clicked element
		    var batch = $(e.relatedTarget).data('batch');
		    var email = $(e.relatedTarget).data('email');
		    var institute = $(e.relatedTarget).data('institute');
		    //populate the textbox
		    $(e.currentTarget).find('input[name="batch"]').val(batch);
		    $(e.currentTarget).find('input[name="email"]').val(email);
		    $(e.currentTarget).find('input[name="institute"]').val(institute);
		});
		$(document).ready(function() {
			var linksContainer = $('#filter_data'),baseUrl;
			window.onscroll = function(ev)
			{
				  var height = $(document).height();  
	            if($(window).scrollTop() + $(window).height() > height-100) 
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
							LoadFilterResults(sub_select,loc_select,trial_select,resultRange);

						}
					}
					else
					{	
						LoadResult(range,range+10);	}

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
				filter_select = $('.filterCheckBox:checked').map(function(){return this.value;}).get();
				//alert(filter_select.length);
				//alert(sub_select+','+loc_select);
				if(filter_select.length>0)
				{
					sub_select = $('.SubCheckbox:checked').map(function(){return this.value;}).get();
					loc_select = $('.LocCheckbox:checked').map(function(){return this.value;}).get();
					trial_select =  $('.trialCheckbox:checked').map(function(){return this.value;}).get(); 
					//alert("sub = "+sub_select+"loc = "+loc_select+"trial = "+trial_select);
					chunk = 0;
					LoadFilterResults(sub_select,loc_select,trial_select,0);
				}
				else
				{

					chunk = 0;
					$.get("/filter/categories/"+categoryId+"/locations/"+locationId+"/chunk/"+chunk,function(response)
					{
						alert(response);
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

@stop