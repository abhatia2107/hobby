@extends('Layouts.layout')
@section('content')
	<div class="row">
	<div class="col-lg-9 col-md-9 col-sm-7">
	<h1 class="section-title-inner"><span>@if(isset($batchDetails)) <i class="glyphicon glyphicon-pencil"></i>&nbsp; Edit Your Batch @else <i class="glyphicon glyphicon-plus"></i>&nbsp; Add Your Batch @endif </span></h1>
	<div class="row userInfo">
	<div class="col-lg-12">

	<h2 class="block-title-2">@if(isset($batchDetails)) Update Details @else Add Details @endif </h2>
	<p class="required"><sup>*</sup> Required field</p>
	</div>

	<form role="form" action="@if(isset($batchDetails)){{"/batches/update/$batchDetails->id"}}@else{{"/batches/store"}}@endif" method="post" enctype="multipart/form-data">
	<div class="col-md-6">
	<div class="form-group required">
		<label for="InputBatch">Batch Title <sup>*</sup> </label>
		<input type="text" class="form-control" tabindex=1 placeholder="Batch Title" name="batch" value="@if(isset($batchDetails)){{$batchDetails->batch}}@else{{Input::old('batch')}}@endif" required>
	</div>

	<div class="form-group required">
		<label>Batch Category <sup>*</sup> </label>
		<select class="form-control" tabindex=7 name="batch_category_id" required>
		@foreach ($all_categories as $data)
			<option value={{$data->id}} 
				@if(isset($batchDetails)) 
					{{($batchDetails->batch_category_id==$data->id)?
						'selected="selected"':''}}
				@else{{"Input::old('batch_category_id')"}}
				@endif>
				{{$data->category}}
			</option>
		
		@endforeach
		</select>
	</div>

	<div class="form-group required">
	<label for="date_picker_start"> Start Date <sup>*</sup></label>
	<p class="input-group">
	<input type="text" id="date_picker_start" tabindex=5 class="form-control" name="batch_start_date" value="@if(isset($batchDetails)){{$batchDetails->batch_start_date}}@else{{Input::old('batch_start_date')}}@endif" required>
	<!--<span class="input-group-btn"><button type="button"class="btn btn-default datetimepicker"><span class="glyphicon glyphicon-calendar"></span></button></span>-->
	<label for="date_picker_start" class="input-group-addon btn"><span class="glyphicon glyphicon-calendar"></span></label>
	</p>
	</div>
	<div class="form-group required">
	<label for="time_picker_start"> Start Time<sup>*</sup></label>
	<p class="input-group">
	<input type="text" id="time_picker_start" tabindex=5 class="form-control" name="batch_start_time" value="@if(isset($batchDetails)){{$batchDetails->batch_start_time}}@else{{Input::old('batch_start_time')}}@endif" required>
	<!--<span class="input-group-btn"><button type="button"class="btn btn-default datetimepicker"><span class="glyphicon glyphicon-calendar"></span></button></span>-->
	<label for="time_picker_start" class="input-group-addon btn"><span class="glyphicon glyphicon-time"></span></label>
	</p>
	</div>
	
	<div class="form-group required">
		<label>Batch Venue <sup>*</sup> </label>
		<select class="form-control" tabindex=7 name="batch_venue_id" required>
		@foreach ($all_venues as $data)
			<option value={{$data->id}} 
				@if(isset($batchDetails)) 
					{{($batchDetails->batch_venue_id==$data->id)?
						'selected="selected"':''}}
				@else{{"Input::old('batch_venue_id')"}}
				@endif>
				{{$data->venue}}
			</option>
		
		@endforeach
		</select>
	</div>

	<div class="form-group">
		<label>
			Batch Difficulty Level
		</label>
		<div class="radio">
		<?php $i=0; ?>
			@foreach($difficulty_level as $data)
			<label>
				<input name="batch_difficulty_level" tabindex=13 value={{$i}} @if(isset($batchDetails)){{($batchDetails->batch_difficulty_level==$i)?'checked':''}}@else{{"Input::old('batch_difficulty_level')"}}@endif type="radio" >{{$data}}
				<?php $i++; ?>	
			</label><br/>
			@endforeach
		</div>
	</div>

	<div class="form-group">
		<label>
			Batch Age Group
		</label>
		<div class="radio">
		<?php $i=0; ?>
			@foreach($age_group as $data)
			<label>
				<input name="batch_age_group" tabindex=13 value={{$i}} @if(isset($batchDetails)){{($batchDetails->batch_age_group==$i)?'checked':''}}@else{{"Input::old('batch_age_group')"}}@endif type="radio" >{{$data}}
				<?php $i++; ?>	
			</label><br/>
			@endforeach
		</div>
	</div>
	
	<div class="form-group">
		<label>
			Number of classes in week<sup>*</sup>
		</label>
		<div class="radio">
			@for($i=1;$i<8;$i++)
			<label>
				<input name="batch_no_of_classes_in_week" tabindex=13 value={{$i}} @if(isset($batchDetails)){{($batchDetails->batch_no_of_classes_in_week==$i)?'checked':''}}@else{{"Input::old('batch_no_of_classes_in_week')"}}@endif type="radio" >{{$i}}
			</label><br/>
			@endfor
		</div>
	</div>


	<div class="form-group">
		<label>
			Trial Available<sup>*</sup>
		</label>
		<div class="radio">
		<?php $i=0; ?>
			@foreach($trial as $data)
			<label>
				<input name="batch_trial" tabindex=13 value={{$i}} @if(isset($batchDetails)){{($batchDetails->batch_trial==$i)?'checked':''}}@else{{"Input::old('batch_trial')"}}@endif type="radio" >{{$data}}
				<?php $i++; ?>	
			</label><br/>
			@endforeach
		</div>
	</div>
	
	</div>

	<div class="col-md-6">

	<div id="tagline" class="form-group">
	<label>Batch tagline</label>

	<input type="text" class="form-control" tabindex=2 title="Not more than 40 characters" maxlength="40" name="batch_tagline" value="@if(isset($batchDetails)){{$batchDetails->batch_tagline}}@else{{Input::old('batch_tagline')}}@endif" required>
	</div>

	<div class="form-group required">
		<label>Batch Subcategory <sup>*</sup> </label>
		<select class="form-control" tabindex=7 name="batch_subcategory_id" required>
		@foreach ($all_subcategories as $data)
			<option value={{$data->id}} 
				@if(isset($batchDetails)) 
					{{($batchDetails->batch_subcategory_id==$data->id)?
						'selected="selected"':''}}
				@else{{"Input::old('batch_subcategory_id')"}}
				@endif>
				{{$data->subcategory}}
			</option>
		@endforeach
		</select>
	</div>

	<div class="form-group required">
	<label for="date_picker_end"> End Date<sup>*</sup> </label>
	<p class="input-group">
	<input type="text" id="date_picker_end" tabindex=6 class="form-control datetimepicker" name="batch_end_date" value="@if(isset($batchDetails)){{$batchDetails->batch_end_date}}@else{{Input::old('batch_end_date')}}@endif" required>
	<label for="date_picker_end" class="input-group-addon btn"><span class="glyphicon glyphicon-calendar"></span></label>
	</p>
	</div>

	<div class="form-group required">
	<label for="time_picker_end">End Time <sup>*</sup></label>
	<p class="input-group">
	<input type="text" id="time_picker_end" tabindex=5 class="form-control" name="batch_end_time" value="@if(isset($batchDetails)){{$batchDetails->batch_end_time}}@else{{Input::old('batch_end_time')}}@endif" required>
	<!--<span class="input-group-btn"><button type="button"class="btn btn-default datetimepicker"><span class="glyphicon glyphicon-calendar"></span></button></span>-->
	<label for="time_picker_end" class="input-group-addon btn"><span class="glyphicon glyphicon-time"></span></label>
	</p>
	</div>

	<div class="form-group">
	<label>Batch Price</label>

	<input type="text" class="form-control" tabindex=8 name="batch_price" value="@if(isset($batchDetails)){{$batchDetails->batch_price}}@else{{Input::old('batch_price')}}@endif">
	</div>

	<div class="form-group">
	<label>Batch Images</label>

	<input type="file" id="batch_photo" tabindex=18 name="batch_photo" value="@if(isset($batchDetails)){{$batchDetails->batch_photo}}@endif">
	</div>
	

	<div class="form-group">
		<label>
			Batch Gender Group
		</label>
		<div class="radio">
		<?php $i=0; ?>
			@foreach($gender_group as $data)
			<label>
				<input name="batch_gender_group" tabindex=13 value={{$i}} @if(isset($batchDetails)){{($batchDetails->batch_gender_group==$i)?'checked':''}}@else{{"Input::old('batch_gender_group')"}}@endif type="radio" >{{$data}}
				<?php $i++; ?>	
			</label><br/>
			@endforeach
		</div>
	</div>

	<div class="form-group" title="Batch Schedule">
		<label class="title">
		Batch have Classes on<sup>*</sup> </label>	
		<div class="column column1">

			@foreach($weekdays as $data)
				<input type="checkbox" name="batch_class[]" value="{{$data}}"
				@if(isset($batchDetails))
				<?php if(in_array($data, $batchDetails->batch_class)): echo 'checked="checked"'; endif; ?>
				@else{{Input::old('batch_class[]')}}
				@endif/>
				<?php
					echo ucfirst($data);
				?><br/>
			@endforeach
		</div>
	</div>
	
	<div class="form-group">
		<label>
			Batch Recurring
		</label>
		<div class="radio">
		<?php $i=0; ?>
			@foreach($recurring as $data)
			<label>
				<input name="batch_recurring" tabindex=13 value={{$i}} @if(isset($batchDetails)){{($batchDetails->batch_recurring==$i)?'checked':''}}@else{{"Input::old('batch_recurring')"}}@endif type="radio" >{{$data}}
				<?php $i++; ?>	
			</label><br/>
			@endforeach
		</div>
	</div>
	
	</div>
	<div class="col-md-12">
	<div class="form-group required">
	<label>What will participants achieve through this class?<sup>*</sup> </label>
	</div>

	<div class="form-group">

	<textarea name="batch_accomplishment" tabindex=21 class="form-control" rows="5">@if(isset($batchDetails)){{$batchDetails->batch_accomplishment}}@else{{Input::old('batch_accomplishment')}}@endif</textarea> 
	</div>

	<div class="form-group required">
	<label>Tell us more about your batch(Prerequisite required, anything else you wish to share)<sup>*</sup> </label>
	</div>

	<div class="form-group">

	<textarea name="batch_comment" tabindex=21 class="form-control" rows="5">@if(isset($batchDetails)){{$batchDetails->batch_comment}}@else{{Input::old('batch_comment')}}@endif</textarea> 
	</div>
	


	<div class="form-group">
	<button type="submit" tabindex=22 class="btn btn-primary"> @if(isset($batchDetails)) <i class="fa fa-save"></i> &nbsp; Save @else <i class="fa fa-plus"></i> &nbsp; Create @endif</button>
	<button type="reset" tabindex=23 class="btn btn-primary"><i class="fa fa-power-off"></i> &nbsp; Reset</button>
	</div>
	</div>
	</div>
	</form>
	<div class="col-lg-12 clearfix">
	<ul class="pager">
	<li class="next pull-right"><a href="/myaccount" tabindex=24> &larr; Back to My Account</a> </li>
	</ul>
	</div>
	</div>
	<!--/row end--> 

	</div>
	<div class="col-lg-3 col-md-3 col-sm-5"> </div>
	</div>
	<!--/row-->

	<div style="clear:both"></div>
	</div>
	<!-- /main-container -->
@stop
@pagejavascript
	<!-- include checkRadio plugin //Custom check & Radio  --> 
	<script type="text/javascript" src="/assets/js/ion-checkRadio/ion.checkRadio.min.js"></script> 
	<!-- include grid.js // for equal Div height  --> 
	<script src="/assets/js/grids.js"></script> 
	<script src="/assets/js/jquery.datetimepicker.js"></script>

	<script>
	jQuery(function(){
	jQuery('#date_picker_start').datetimepicker({
	format:'Y/m/d',
	onShow:function( ct ){
	this.setOptions({
	maxDate:jQuery('#date_picker_end').val()?jQuery('#date_picker_end').val():false
	})
	},
	timepicker:false
	});
	jQuery('#date_picker_end').datetimepicker({
	format:'Y/m/d',
	onShow:function( ct ){
	this.setOptions({
	minDate:jQuery('#date_picker_start').val()?jQuery('#date_picker_start').val():false
	})
	},
	timepicker:false
	});
	});
	$('.timepicker').datetimepicker({
	format:'Y-m-d',
	datepicker:false,
	});
	$('#paid').click(function(){
	$('.paid').css('display','block');
	});
	$('#free').click(function(){
	$('.paid').css('display','none');
	});
	</script>
	<script>
	jQuery(function(){
	jQuery('#time_picker_start').datetimepicker({
	format:'H:i:00',
	onShow:function( ct ){
	this.setOptions({
	})
	},
	datepicker:false
	});
	jQuery('#time_picker_end').datetimepicker({
	format:'H:i:00',
	onShow:function( ct ){
	this.setOptions({
	})
	},
	datepicker:false
	});
	});
	</script>
@stop