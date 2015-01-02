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
      background: white;border:1px solid;padding:10px 10px;margin-bottom: 15px;border-color: skyblue;
      box-shadow: 0px 0px 10px rgba(0,0,0,0.5);-moz-box-shadow: 0px 0px 10px rgba(0,0,0,0.5);-webkit-box-shadow: 0px 0px 10px rgba(0,0,0,0.5);
    }
    #inst_name
    {
    	font-size: 18px;
    	font-weight: normal;
    	color: black;
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
				<div class="col-md-3 col-xs-12 col-sm-3 column" >
						<h4>Filter Results</h4>
						<div id="browse-filter">
						<div id="facetList" class="facetList">
						<div id="facetHead" class="line facet-head"> 
							 
						</div> 
						<div >
							<div class="oneFacet bmargin5">
							<div class="head line"> 
							<div title="Click to Collapse" class="facet-title"> 
							<h4 class="unit line">Sub Categories</h4> 
							<span style="display: none;" class="clear-wrap"> 
							<span class="separator">|</span> <a class="clear fk-font-13">Clear</a></span>
							<span class="icon minus"></span> </div>  </div>
							<ul class="list-unstyled" valuelimit="" keepcollapsed="" displaytype="" nofilter="" id="filter"> 
							<?php 
								foreach ($subcategoriesForCategory as $subcategoryData) {
									$subcategory = $subcategoryData->subcategory;
									$class = preg_replace('/[^A-Za-z0-9\-]/', '', $subcategory);
									# code...
								
								echo '
								<li subcategory="'.$class.'" style="margin-bottom:5px;margin-left:-23px" >								
								 	 <label><input autocomplete="off" style="background:#fafafa;" value="'.$class.'" type="checkbox" class="SubCheckbox" />'.$subcategory.'</label>
								</li> '; }
							?> 
							 </ul> </div>

						</div>
						</div>
						</div>
						</div>
				<div class="col-md-8 col-xs-12 col-sm-9 column">
					<center><h4>Results</h4></center>
					<ul class="list-unstyled" valuelimit="" keepcollapsed="" displaytype="" nofilter="" id="filter_data"> 
					<?php 
					foreach ($batchesForCategory as $key => $batchInfo)
					{ 
						$institute = $batchInfo->institute;
						$batch = $batchInfo->batch;
						$subcategory = $batchInfo->subcategory;
						$location = $batchInfo->location;
						$locality = $batchInfo->locality;
						$tagline = $batchInfo->batch_tagline;
						$class = preg_replace('/[^A-Za-z0-9\-]/', '', $subcategory);
						echo "<li subcategory='$class' class='batch$key' style='display:block'>";
						?>
						
						<?php echo "<div class='row clearfix batch' id='batchInfo' >"; ?>
							<div class="col-md-12 col-xs-12 col-sm-12 column" >
									<div class="row clearfix">
										<div class="col-md-12 col-xs-12 col-sm-12 column">
											<div class="row clearfix">
												<div class="col-md-12 col-xs-12 col-sm-4 column">
												<div class="col-md-8 col-xs-12 col-sm-4 column">
													<span id="inst_name"><?php echo $institute ;?><br></span>
													Tagline<br>
												</div>
												<div class="col-md-4 col-xs-12 col-sm-4 column">
													<span id="inst_name"><?php echo 'Rating' ;?><br></span>
												</div>
												</div>
												<div class="col-md-12 col-xs-12 col-sm-4 column">
												<div class="col-md-6 col-xs-12 col-sm-4 column">
													<h4><?php echo $batch ;?></h4>
													
													<h4><?php echo $subcategory ;?></h4>
												</div>
												<div class="col-md-6 col-xs-12 col-sm-4 column">
											
												</div>
												</div>
											</div>
										</div>
									</div>
							</div>
						</div>
						</li>
					<?php } ?>
				</div>
				</ul>
			</div>
		</div>
	</div>
</div>
<br>
</body>
<script type="text/javascript">
	$(document).ready(function() {
			var sub_select = new Array();
			$("#filter li").click(function () {
				//var subcategory = 'batch_'+$(this).attr('subcategory');
				sub_select = $('.SubCheckbox:checked').map(function(){return this.value;}).get();
				if(sub_select.length>0)
				{	
					$('#batch_list').css('display','none');	
					$("#filter_data li").each(function () 
					{
						var test = $(this).attr('class');
						subcategory = $(this).attr('subcategory');
						var result = jQuery.inArray(subcategory,sub_select);
						if (result==-1) 
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
				
			});
	});
</script>
</html>
@stop