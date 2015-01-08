@extends('Layouts.layout')
@section('pagestylesheet')

    <link rel="stylesheet" type="text/css" href="/assets/css/jquery-ui-1.7.2.custom.css" />
    <link rel="stylesheet" type="text/css" href="/assets/css/jquery.richtextarea.css" />
    <link rel="stylesheet" type="text/css" href="/assets/css/jquery-te-1.4.0.css">
    <script type="text/javascript" src="/assets/js/jquery-te-1.4.0.min.js"></script>
    <style>
	
	.ul-without-bullets
	{
		
	list-style-type: none;
	
	}
	#gengroup
	{
	list-style-type: none;
	}
	#agegroup
	{
		

    list-style-type: none;

	}
	.row_padding
	{
		padding-top:30px;
	}
    .img_requirement_span
    {
        position: absolute;
    }
        .btn-file {
            position: relative;
            overflow: hidden;
            font-size:20px;background-color:#3A8AF1;color:white;
        }
        .btn-file input[type=file] {
            position: absolute;
            top: 0;
            right: 0;
            min-width: 100%;
            min-height: 100%;
            font-size: 100px;
            text-align: right;
            filter: alpha(opacity=0);
            opacity: 0;
            outline: none;
            background: blue;
            cursor: inherit;
            display: block;
        }
        .label1
        {
            font-size: 15px;
            font-weight: 100;
			text-align: left !important;
        }
        .btn_save_div
        {
            
            position: relative;
left: 30%;
        }
        .input1
         {
            font-size: 15px;
            /*height:32px;*/
         }
@media(min-width:992px){
         #classInfo1
         {
            margin-left: auto;
            margin-right: auto;
            width: 900px;
         }}
         .create_class
         {
            font-size: 20px;
                font-weight: 600;
         }
         .important_required
         {
            color:red;
         }
         .img_requirement
         {
            font-size:10px;
         }
         .class_desc
         {
            background: url('/assets/images/batch/create/classdesc.PNG');
            height:41px;
         }
         .targetaud
         {
            background: url('/assets/images/batch/create/targetaud.PNG');
            height:41px;
         }
         .schedule
         {
            background: url('/assets/images/batch/create/schedule.PNG');
            height:41px 
         }
			.radio_data
			{
				position:relative;
				top:-7px;
			}
    </style>
@stop

@section('content')
<div class="container-fluid">
    <div id="classInfo1">
    <form role="form" class="form-horizontal" action="@if(isset($batchDetails)){{"/batches/update/$batchDetails->id"}}@else{{"/batches/store"}}@endif" method="post" enctype="multipart/form-data" id="classInfo">
          
        <div class="row row_padding">
            <p  class="create_class">Create your Class
            </p>
            <div class="col-lg-12 img-responsive class_desc">
            </div>
        </div>
        <div class="row row_padding">
            <div class="form-group">
                <label for="batch" class="col-sm-3 control-label label1">Title<span class="important_required">*</span></label>
                <div class="col-sm-8">
                    <input type="hidden" name="csrf_token" value="{{ csrf_token() }}">
                    <input type="text" class="form-control input1" id="batch" name="batch" value="@if(isset($batchDetails)){{$batchDetails->batch}}@else{{Input::old('batch')}}@endif" required>
                </div>
            </div>
        </div>
        <div class="row row_padding">
            <div class="form-group">
                <label for="batch_tagline" class="col-sm-3 control-label label1">Tagline</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" title="Not more than 40 characters" maxlength="40" id="batch_tagline"  name="batch_tagline" value="@if(isset($batchDetails)){{$batchDetails->batch_tagline}}@else{{Input::old('batch_tagline')}}@endif" required>
                </div>
            </div>
        </div>
        <div class="row row_padding">
            <div class="form-group">
                <label for="batch_category_id" class="col-sm-3 col-md-3 control-label label1">Category<span class="important_required">*</span></label>
                <div class="col-sm-3 col-md-3">
                    <select class="form-control input1"  id="batch_category_id" name="batch_category_id"required>
                        @foreach ($categories as $data)
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
                <label name="batch_subcategory_id" class="col-sm-2 col-md-2 control-label label1">Sub Category<span class="important_required">*</span></label>
                <div class="col-sm-3 col-md-3">
                    <select class="form-control input1" name="batch_subcategory_id" id="batch_subcategory_id">
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
            </div>

        </div>
        <div class="row ">
            <div class="form-group">
                    <label class="col-sm-3 control-label label1">Photo Gallery</label>
                    <div class="col-sm-6">
                        <span class="btn btn-default btn-file" >
                            Add Photos <input type="file" id="batch_photo" name="batch_photo" value="@if(isset($batchDetails)){{$batchDetails->batch_photo}}@endif">
                        </span>
                        <span class="img_requirement_span">
                            <ul class="ul-without-bullets">
							<li>
                        <span class="img_requirement">1.Based on requirements</span></li>
                        <li><span class="img_requirement">2.Based on requirements</span></li>
                </ul></span>

            </div>
            </div>

        </div>
        <div class="row row_padding">
            <div class="form-group">
                <label for="batch_accomplishment" class="col-sm-3 control-label label1">What will participants achieve through this class?<span class="important_required">*</span></label>
                <div class="col-sm-8">
                    <textarea name="batch_accomplishment" id="batch_accomplishment" =21 class="jqte-test" >@if(isset($batchDetails)){{$batchDetails->batch_accomplishment}}@else{{Input::old('batch_accomplishment')}}@endif</textarea>
                </div>
            </div>
        </div>
        <div class="row row_padding">
            <div class="col-lg-12 col-md-10 col-sm-10 targetaud" >
            </div>
        </div>
        <div class="row row_padding">
            <div class="form-group">
                <label for="diflevel" class="col-sm-3 control-label label1">Difficulty Level<span class="important_required">*</span></label>
                <div class="col-sm-8">
                    <ul class="radio ul-without-bullets" name="diflevel" id="diflevel">
                        <?php $i=1; ?>
                        @foreach($difficulty_level as $data)
						<li>
                        <label>
                            <input name="batch_difficulty_level" value={{$i}} @if(isset($batchDetails)){{($batchDetails->batch_difficulty_level==$i)?'checked':''}}@else{{"Input::old('batch_difficulty_level')"}}@endif type="radio" ><span class="radio_data">{{$data}}</span>
                            <?php $i++; ?>
                        </label>
						</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
        <div class="row row_padding">
            <div class="form-group">
                <label for="agegroup" class="col-sm-3 control-label label1">Target Age Group<span class="important_required">*</span></label>
                <div class="col-sm-8">
                    <ul class="radio" name="agegroup" id="agegroup">
                        
						<?php $i=1; ?>
                        @foreach($age_group as $data)
						<li>
                        <label >
                            <input name="batch_age_group" value={{$i}} @if(isset($batchDetails)){{($batchDetails->batch_age_group==$i)?'checked':''}}@else{{"Input::old('batch_age_group')"}}@endif type="radio" ><span class="radio_data">{{$data}}</span>
                            <?php $i++; ?>
                        </label>
						</li>
                        @endforeach
						
                    </ul>
                </div>
            </div>
        </div>
        <div class="row row_padding">
            <div class="form-group">
                <label for="gengroup" class="col-sm-3 control-label label1">Target Gender Group<span class="important_required">*</span></label>
                <div class="col-sm-8">
                    <ul class="radio" name="gengroup" id="gengroup">
                        <?php $i=1; ?>
                        @foreach($gender_group as $data)
						<li>
                        <label>
                            <input name="batch_gender_group" value={{$i}} @if(isset($batchDetails)){{($batchDetails->batch_gender_group==$i)?'checked':''}}@else{{"Input::old('batch_gender_group')"}}@endif type="radio" ><span class="radio_data">{{$data}}</span>
                            <?php $i++; ?>
                        </label>
						</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
        
        <div class="row row_padding">

            <div class="col-lg-12 img-responsive schedule">
            </div>
        </div>
        <div class="row row_padding">
            <div class="form-group">
                <label for="batch_venue_id" class="col-sm-3 control-label label1">Venue<span class="important_required">*</span></label>
                
                <div class="col-sm-6">
                    <select class="form-control" id="batch_venue_id" name="batch_venue_id" required>
                        @foreach ($all_venues as $data)
	                        <option value={{$data->id}}
	                            @if(isset($batchDetails))
	                            {{($batchDetails->batch_venue_id==$data->id)?
	                            'selected="selected"':''}}
	                            @else
	                            	{{"Input::old('batch_venue_id')"}}
	                            @endif>
	                            {{$data->venue}}
	                        </option>
                        @endforeach
                    </select>
                </div>
                <div class="col-sm-3">
                    <a data-target="#myModal2" data-toggle="modal">Add a venue</a>
                </div>
            </div>
        </div>
        <div class="row row_padding">
            <div class="form-group ">
                <label class="col-sm-3 col-md-3 control-label label1" for="batch_no_of_classes_in_week">No Of Sessions
                    <span class="important_required">*</span>
                </label>
                <div class="col-sm-3 col-md-2">
                    <select class="form-control" id="batch_no_of_classes_in_week" name="batch_no_of_classes_in_week" required>
   	                @for ($i = 1; $i < 8; $i++)
	                    <option value={{$i}}
	                        @if(isset($batchDetails))
		                        {{($batchDetails->batch_no_of_classes_in_week==$i)?
		                        'selected="selected"':''}}
	                        @else
	                        	{{"Input::old('batch_no_of_classes_in_week')"}}
	                        @endif>
	                        {{$i}}
	                    </option>
                    @endfor
                    </select>
                </div>
                <label class="col-sm-3 col-md-3 control-label input1" for="batch_price">Price</label>
                <div class="col-sm-3 col-md-3">
                    <input type="text" class="form-control" id="batch_price" name="batch_price" value="@if(isset($batchDetails)){{$batchDetails->batch_price}}@else{{Input::old('batch_price')}}@endif">
                </div>
            </div>
        </div>
        <div class="row row_padding">
            <div class="form-group">
                <label  class="col-sm-3 control-label label1">Batch have Classes on
                    <span class="important_required">*</span></label>

                <div class="col-sm-6">
				<ul class="ul-without-bullets">
				
                    @foreach($weekdays as $data)
					<li>
                        <input type="checkbox" name="batch_class[]" value="{{$data}}"
                        @if(isset($batchDetails))
                            <?php if(in_array($data, $batchDetails->batch_class)): echo 'checked="checked"'; endif; ?>
                        @else
                            {{Input::old('batch_class[]')}}
                        @endif/>
                        <?php
                            echo ucfirst($data);
                        ?>
						</li>
                    @endforeach
					</ul>
                </div>
            </div>
        </div>
        <div class="row row_padding">
            <div class="form-group">
                <label for="batch_trial" class="col-sm-3 control-label label1">Trial Available<span class="important_required">*</span></label>
                
                <div class="col-sm-6">
                    <ul class="radio ul-without-bullets">
                        <?php $i=1; ?>
                        @foreach($trial as $data)
						<li>
                        <label>
                            <input name="batch_trial" id="batch_trial" value={{$i}} @if(isset($batchDetails)){{($batchDetails->batch_trial==$i)?'checked':''}}@else{{"Input::old('batch_trial')"}}@endif type="radio" ><span class="radio_data">{{$data}}</span>
                            <?php $i++; ?>
                        </label>
						</li>
                        @endforeach
                    </ul>
                </div>

            </div>
        </div>
        <div class="row row_padding">
            <div class="form-group">
                <label for="batch_comment" class="col-sm-3 control-label label1">Tell us more about your batch(Prerequisite required, anything else you wish to share)<span class="important_required">*</span></label>
                <div class="col-sm-8">
                    <textarea  class="jqte-test" name="batch_comment" id="batch_comment" =21  >@if(isset($batchDetails)){{$batchDetails->batch_comment}}@else{{Input::old('batch_comment')}}@endif</textarea>
                </div>
            </div>
        </div>
        <div class="btn_save_div" >
            <button type="submit" class="btn btn-success btn-lg"> @if(isset($batchDetails)) <i class="fa fa-save"></i>  Save @else <i class="fa fa-plus"></i>  Create @endif</button>
            <button type="reset" class="btn btn-warning btn-lg"><i class="fa fa-power-off"></i> Reset</button>
        </div>
    </form>
</div>
</div>
<div class="modal fade" id="myModal" ="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">
                    <span aria-hidden="true">&times;</span>
                    <span class="sr-only">Close</span>
                </button>
                <h4 class="modal-title" id="myModalLabel">Modal title</h4>
            </div>
            <form name="weekform" id="weekform" role="form">
                <div class="modal-body">
                    <div class="row row_padding">
                        <div class="form-group">
                            <label for="weekrepeat" class="col-sm-3 control-label ">Repeats every<span class="important_required">*</span></label>
                            <div class="col-sm-8">
                                <select  class="form-control " name="weekrepeat"  id="weekrepeat"><option>1</option><option>2</option><option>3</option><option>4</option><option>5</option></select>
                            </div>
                        </div>
                    </div>
                    <div class="row row_padding">
                        <div class="form-group">
                            <label for="endsafter" class="col-sm-3 control-label ">Ends After<span class="important_required">*</span></label>
                            <div class="col-sm-8">
                                <input type="date"  class="form-control " name="endsafter"  id="endsafter">
                            </div>
                        </div>
                    </div>
                    <div class="row row_padding">
                        <div class="form-group">
                            <label  class="col-sm-3 control-label ">Batches Start On<span class="important_required">*</span></label>
                            <div class="col-sm-8">
                                Sun<input  type="checkbox" value="1"  id="sun">
                                Mon<input  type="checkbox" value="2"  id="mon">
                                Tue<input  type="checkbox" value="3"  id="tue">
                                Wed<input  type="checkbox" value="4"  id="wed">
                                Thu<input  type="checkbox" value="5"  id="thu">
                                Fri<input  type="checkbox" value="6"  id="fri">
                                Sat<input  type="checkbox" value="7"  id="sat">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="modal fade" id="myModal2" ="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form name="venueform" id="venueform" role="form">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">
                        <span aria-hidden="true">&times;</span>
                        <span class="sr-only">Close</span>
                    </button>
                    <h4 class="modal-title" id="myModalLabel1">Add a Venue</h4>
                </div>
                <div class="modal-body">
                    <div class="row row_padding">
                        <div class="form-group">
                            <label for="venuename" class="col-sm-3 control-label ">Venue Name
                                <span class="important_required">*</span>
                            </label>
                            <div class="col-sm-8">
                                <input type="text"  class="form-control " name="venuename"  id="venuename">
                            </div>
                        </div>
                    </div>
                    <div class="row row_padding">
                        <div class="form-group">
                            <label for="city1" class="col-sm-3 control-label ">City<span class="important_required">*</span></label>
                            <div class="col-sm-8">
                                <select  class="form-control " name="city1"  id="city1"><option>1</option><option>2</option><option>3</option><option>4</option><option>5</option></select>
                            </div>
                        </div>
                    </div>
                    <div class="row row_padding">
                        <div class="form-group">
                            <label for="locality" class="col-sm-3 control-label ">Locality<span class="important_required">*</span></label>
                            <div class="col-sm-8">
                                <select  class="form-control " name="locality"  id="locality"><option>1</option><option>2</option><option>3</option><option>4</option><option>5</option></select>
                            </div>
                        </div>
                    </div>
                    <div class="row row_padding">
                        <div class="form-group">
                            <label for="address" class="col-sm-3 control-label ">Address<span class="important_required">*</span></label>
                            <div class="col-sm-8">
                                <input type="text"  class="form-control " name="address"  id="address">
                            </div>
                        </div>
                    </div>
                    <div class="row row_padding">
                        <div class="form-group">
                            <label for="pincode" class="col-sm-3 control-label ">pincode<span class="important_required">*</span></label>
                            <div class="col-sm-8">
                                <input type="text"  class="form-control " name="pincode"  id="pincode">
                            </div>
                        </div>
                    </div>
                    <div class="row row_padding">
                        <div class="form-group">
                            <label for="mobile" class="col-sm-3 control-label ">mobile<span class="important_required">*</span></label>
                            <div class="col-sm-8">
                                <input type="tel"  class="form-control " name="mobile"  id="mobile">
                            </div>
                        </div>
                    </div>
                    <div class="row row_padding">
                        <div class="form-group">
                            <label for="landline" class="col-sm-3 control-label ">Email<span class="important_required">*</span></label>
                            <div class="col-sm-8">
                                <input type="text"  class="form-control " name="landline"  id="landline">
                            </div>
                        </div>
                    </div>
                    <div class="row row_padding">
                        <div class="form-group">
                            <label for="comments" class="col-sm-3 control-label ">Landmark</label>
                            <div class="col-sm-8">
                                <textarea   class="form-control " name="comments"  id="comments"></textarea>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>
@stop
@section('pagejavascript')
<script type="text/javascript" src="/assets/js/jquery-ui-1.7.2.custom.min.js"></script>
<script type="text/javascript"  src="http://cdnjs.cloudflare.com/ajax/libs/moment.js/2.8.4/moment.min.js"></script>
<script type="text/javascript" src="jquery-te-1.4.0.min.js" charset="utf-8"></script>
<script type="text/javascript"  src="/assets/js/jquery.richtextarea.min.js"></script>
@stop
@section('pagejquery')
<script type="text/javascript">
    $(document).ready(function(){
        $("#session1").change(function(e){
            if($("#session1").val()==1)
            {
                $("#myModal").modal('toggle');
                e.preventDefault();
            }
        });
        $('#classInfo').bootstrapValidator({
            message: 'This value is not valid',
            feedbackIcons: {
                valid: 'glyphicon glyphicon-ok',
                invalid: 'glyphicon glyphicon-remove',
                validating: 'glyphicon glyphicon-refresh'
            },
            fields: {
                batch: {
                    message: 'The title is not valid',
                    validators: {
                        notEmpty: {
                            message: 'The title is required and cannot be empty'
                        },
                        stringLength: {
                            min: 6,
                            max: 30,
                            message: 'The title must be more than 6 and less than 30 characters long'
                        },
                        regexp: {
                            regexp: /^[a-zA-Z0-9_]+$/,
                            message: 'The username can only consist of alphabetical, number and underscore'
                        }
                    }
                },
                batch_tagline: {
                    message: 'The tagline is not valid',
                    validators: {
                        regexp: {
                            regexp: /^[a-zA-Z]+(?:(?:\\s+|-)[a-zA-Z]+)*$/,
                            message: 'The  tagline can only consist of alphabets'
                        }
                    }
                },

                batch_price: {
                    message: 'The Price is not valid',
                    validators: {
                        regexp: {
                            regexp: /^[0-9]/,
                            message: 'The  Price can only consist of numbers.'
                        }
                    }
                },

                batch_accomplishment: {
                    message: 'The text is not valid',
                    validators: {
                        notEmpty: {
                            message: 'The description is required and cannot be empty'
                        },
                        stringLength: {
                            min: 6,

                            message: 'The description must be more than 6  characters long'
                        },
                        regexp: {
                            regexp: /^[a-zA-Z0-9_]+$/,
                            message: 'The description can only consist of alphabetical, number and underscore'
                        }
                    }
                },
            }
        });
        $('#venueform').bootstrapValidator({
            message: 'This value is not valid',
            feedbackIcons: {
                valid: 'glyphicon glyphicon-ok',
                invalid: 'glyphicon glyphicon-remove',
                validating: 'glyphicon glyphicon-refresh'
            },
            fields: {
                venuename: {
                    message: 'The name is not valid',
                    validators: {
                        notEmpty: {
                            message: 'The venue is required and cannot be empty'
                        },
                        stringLength: {
                            min: 3,
                            max: 30,
                            message: 'The venue name must be more than 3 and less than 30 characters long'
                        },
                        regexp: {
                            regexp: /^[a-zA-Z]+$/,
                            message: 'The venue can only consist of alphabets'
                        }
                    }
                },
                textarea1: {
                    message: 'The text is not valid',
                    validators: {
                        notEmpty: {
                            message: 'The description is required and cannot be empty'
                        },
                        stringLength: {
                            min: 6,

                            message: 'The description must be more than 6  characters long'
                        },
                        regexp: {
                            regexp: /^[a-zA-Z0-9_]+$/,
                            message: 'The description can only consist of alphabetical, number and underscore'
                        }
                    }
                },
                city: {
                    message: 'The city is not valid',
                    validators: {
                        notEmpty: {
                            message: 'The city name is required and cannot be empty'
                        },
                        stringLength: {
                            min: 3,
                            max: 30,
                            message: 'The city must be more than 3 and less than 30 characters long'
                        },
                        regexp: {
                            regexp: /^[a-zA-Z]+(?:(?:\\s+|-)[a-zA-Z]+)*$/,
                            message: 'The city name can only consist of alphabets'
                        }
                    }
                },
                mobile: {
                    message: 'The number is not valid',
                    validators: {
                        notEmpty: {
                            message: 'The mobile number is required and cannot be empty'
                        },

                        regexp: {
                            regexp: /^\s*(?:\+?(\d{1,3}))?[-. (]*(\d{3})[-. )]*(\d{3})[-. ]*(\d{4})(?: *x(\d+))?\s*$/,
                            message: 'The phone number consists of 10 digits'
                        }
                    }
                },
                email: {
                    validators: {
                        notEmpty: {
                            message: 'The email is required and cannot be empty'
                        },
                        emailAddress: {
                            message: 'The input is not a valid email address'
                        }
                    }
                },
            }
        });

    });
</script>
<script>
    $('.jqte-test').jqte();

    // settings of status
    var jqteStatus = true;
    $(".status").click(function()
    {
        jqteStatus = jqteStatus ? false : true;
        $('.jqte-test').jqte({"status" : jqteStatus})
    });
</script>
@stop