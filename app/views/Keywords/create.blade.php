<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />

	<link href="/assets/css/ion.checkRadio.css" rel="stylesheet">
	<link href="/assets/css/ion.checkRadio.cloudy.css" rel="stylesheet">
	<link href="/css/bootstrap/css/jquery-ui.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="/assets/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="/assets/css/bootstrap-theme.min.css">
	<link rel="stylesheet" type="text/css" href="/assets/css/jquery.datetimepicker.css"/>
</head>

<body class="blurBg-false" style="background-color:#EBEBEB">

	<div class="container main-container headerOffset">


	<div class="row">
	<div class="breadcrumbDiv col-lg-12">
	<ul class="breadcrumb">
	<li><a href="/">Home</a> </li>
	<li class="active">@if(isset($batchDetails)) Edit Batch @else Create Batch @endif </li> 
	</ul>
	</div>
	</div>
	@if($errors->has())
	<div class="alert alert-block alert-danger fade in">
	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
	<h4><i class="fa fa-times-circle fa-fw fa-lg"></i>Oh snap! You got an error!</h4>
	@foreach($errors->all() as $error)
	<p>{{ $error }}<br></p>
	@endforeach
	</div>
	@endif
	@if(Session::has('success'))
	<div class="alert alert-success fade in" role="alert">
	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
	<i class="fa fa-check-circle fa-fw fa-lg"></i>
	<strong>Well done!</strong> {{Session::get('success')}}     
	</div>

	@endif
	@if(Session::has('failed'))
	<div class="alert alert-danger fade in" role="alert">
	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
	<i class="fa fa-times-circle fa-fw fa-lg"></i>
	<strong>OOPS!</strong> {{Session::get('failed')}}  
	</div>

	@endif

	<div class="row">
	<div class="col-lg-9 col-md-9 col-sm-7">
	<h1 class="section-title-inner"><span>@if(isset($batchDetails)) <i class="glyphicon glyphicon-pencil"></i>&nbsp; Edit Your Batch @else <i class="glyphicon glyphicon-plus"></i>&nbsp; Add Your Batch @endif </span></h1>
	<div class="row userInfo">
	<div class="col-lg-12">

	<h2 class="block-title-2">@if(isset($batchDetails)) Update Details @else Add Details @endif </h2>
	<p class="required"><sup>*</sup> Required field</p>
	</div>

	<form role="form" action="@if(isset($batchDetails)){{"/keywords/update/1"}}@else{{"/keywords/store"}}@endif" method="post" enctype="multipart/form-data">
	
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

	<div class="form-group required">
		<label>Batch Category <sup>*</sup> </label>
		<select class="form-control" tabindex=7 name="batch_category" required>
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
	<button type="submit" tabindex=22 class="btn btn-primary"> @if(isset($batchDetails)) <i class="fa fa-save"></i> &nbsp; Save @else <i class="fa fa-plus"></i> &nbsp; Create @endif</button>
	<button type="reset" tabindex=23 class="btn btn-primary"><i class="fa fa-power-off"></i> &nbsp; Reset</button>
	</div>
	</div>
	</form>
	<div class="col-lg-12 clearfix">
	<ul class="pager">
	<li class="next pull-right"><a href="/myaccount" tabindex=24> &larr; Back to My Account</a> </li>
	</ul>
	</div>
	</div>