@extends('Layouts.layout')
@section('pagestylesheet')
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
        font-size:20px;background:#3A8AF1;color:white;
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
		top:1px;
	}
    </style>
    <link type="text/css" rel="stylesheet" href="/assets/css/jquery-te-1.4.0.css">
@stop

@section('content')
<div class="home_vendor_page" id="createBatch" style="background: white;">
    @include('Templates.navbarVendor')
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
                    <input type="text" class="form-control" title="Not more than 40 characters" maxlength="40" id="batch_tagline"  name="batch_tagline" value="@if(isset($batchDetails)){{$batchDetails->batch_tagline}}@else{{Input::old('batch_tagline')}}@endif">
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
                    <textarea name="batch_accomplishment" id="batch_accomplishment" class="jqte-test" >@if(isset($batchDetails)){{$batchDetails->batch_accomplishment}}@else{{Input::old('batch_accomplishment')}}@endif</textarea>
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
                        @foreach($difficulty_level as $key => $data)
						<li>
                        <label>
                            <input name="batch_difficulty_level" value={{$key}} @if(isset($batchDetails)){{($batchDetails->batch_difficulty_level==$key)?'checked':''}}@else{{"Input::old('batch_difficulty_level')"}}@endif type="radio" ><span class="radio_data">{{$data}}</span>
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
                        @foreach($age_group as $key => $data)
						<li>
                        <label >
                            <input name="batch_age_group" value={{$key}} @if(isset($batchDetails)){{($batchDetails->batch_age_group==$key)?'checked':''}}@else{{"Input::old('batch_age_group')"}}@endif type="radio" ><span class="radio_data">{{$data}}</span>
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
                        @foreach($gender_group as $data)
						<li>
                        <label>
                            <input name="batch_gender_group" value={{$key}} @if(isset($batchDetails)){{($batchDetails->batch_gender_group==$key)?'checked':''}}@else{{"Input::old('batch_gender_group')"}}@endif type="radio" ><span class="radio_data">{{$data}}</span>
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
                        @foreach ($venuesForUser as $data)
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
                    <a data-target="#venueCreate" data-toggle="modal">Add a venue</a>
                </div>
            </div>
        </div>
        <div class="row row_padding">
            <div class="form-group ">
                <label class="col-sm-3 col-md-3 control-label input1" for="batch_single_price">Price for a Single Class</label>
                <div class="col-sm-3 col-md-3">
                    <input type="text" class="form-control" id="batch_single_price" name="batch_single_price" value="@if(isset($batchDetails)){{$batchDetails->batch_single_price}}@else{{Input::old('batch_single_price')}}@endif">
                </div>
            </div>
        </div>
        <div class="row row_padding">
            <div class="form-group">
                <label for="batch_comment" class="col-sm-3 control-label label1">Tell us more about your batch(Prerequisite required, anything else you wish to share)</label>
                <div class="col-sm-8">
                    <textarea  class="jqte-test" name="batch_comment" id="batch_comment" >@if(isset($batchDetails)){{$batchDetails->batch_comment}}@else{{Input::old('batch_comment')}}@endif</textarea>
                </div>
            </div>
        </div>
        <div class="row row_padding">
            <div class="form-group">
                <label for="batch_trial" class="col-sm-3 control-label label1">Trial Available<span class="important_required">*</span></label>
                
                <div class="col-sm-6">
                    <ul class="radio ul-without-bullets">
                        @foreach($trial as $key => $data)
                        <li>
                        <label>
                            <input name="batch_trial" id="batch_trial" value={{$key}} @if(isset($batchDetails)){{($batchDetails->batch_trial==$key)?'checked':''}}@else{{"Input::old('batch_trial')"}}@endif type="radio" ><span class="radio_data">{{$data}}</span>
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
        @if(isset($batchDetails))
            @foreach ($batchDetails->schedule as $j => $scheduleData)
        <div class="row row_padding">
            <div class="form-group ">
                @if(isset($batchDetails))
                    <input type="hidden" name="schedule[{{$j}}][id]" value="{{$scheduleData['id']}}">
                @endif        
                <label class="col-sm-3 col-md-3 control-label label1" for="schedule_session_month">Sessions/Months
                    <span class="important_required">*</span>
                </label>
                <div class="col-sm-3 col-md-2">
                    <select class="form-control" id="schedule_session_month" name="schedule[{{$j}}][schedule_session_month]" required>
                        @if(isset($schedule_session_month))
                        @foreach ($schedule_session_month as $key => $data)
                            <option value={{$key}}
                                @if(isset($batchDetails))
                                    {{($scheduleData['schedule_session_month']==$key)?
                                    'selected="selected"':''}}
                                @else
                                    {{Input::old("schedule[$j][schedule_session_month]")}}
                                @endif>
                                {{$data}}
                            </option>
                        @endforeach
                        @endif
                    </select>
                </div>
                
                <label class="col-sm-3 col-md-3 control-label label1" for="schedule_number">No Of Sessions/Months
                    <span class="important_required">*</span>
                </label>
                <div class="col-sm-3 col-md-2">
                    <input type="text" class="form-control" id="schedule_number" name="schedule[{{$j}}][schedule_number]" value="@if(isset($batchDetails)){{$scheduleData['schedule_number']}}@else{{Input::old('schedule[$j][schedule_number]')}}@endif">
                </div>
            </div>
        </div>
        <div class="row row_padding">
            <div class="form-group">
                <label class="col-sm-3 col-md-3 control-label input1" for="schedule_price">Price<span class="important_required">*</span></label>
                <div class="col-sm-3 col-md-3">
                    <input type="text" class="form-control" id="schedule_price" name="schedule[{{$j}}][schedule_price]" value="@if(isset($batchDetails)){{$scheduleData['schedule_price']}}@else{{Input::old('schedule[$j][schedule_price]')}}@endif">
                </div>
                <label  class="col-sm-3 control-label label1">
                    Batch have Classes on<span class="important_required">*</span>
                </label>

                <div class="col-sm-6">
                    <ul class="ul-without-bullets">
                        @foreach($weekdays as $data)
                            <li>
                                <input type="checkbox" name="schedule[{{$j}}][schedule_class][]" value="{{$data}}"
                                @if(isset($batchDetails))
                                    @if(in_array($data, $scheduleData['schedule_class']))
                                        {{'checked="checked"'}}
                                    @endif
                                @else
                                    {{Input::old("schedule[$j][schedule_class][]")}}
                                @endif/>
                                {{ucfirst($data)}}
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
        @endforeach
        @else
        @for ($j = 0; $j < 1; $j++)    
            <div class="row row_padding">
                <div class="form-group ">
                    @if(isset($batchDetails))
                        <input type="hidden" name="schedule[{{$j}}][id]" value="{{$scheduleData['id']}}">
                    @endif        
                    <label class="col-sm-3 col-md-3 control-label label1" for="schedule_session_month">Sessions/Months
                        <span class="important_required">*</span>
                    </label>
                    <div class="col-sm-3 col-md-2">
                        <select class="form-control" id="schedule_session_month" name="schedule[{{$j}}][schedule_session_month]" required>
                            @if(isset($schedule_session_month))
                            @foreach ($schedule_session_month as $key => $data)
                                <option value={{$key}}
                                    @if(isset($batchDetails))
                                        {{($scheduleData['schedule_session_month']==$key)?
                                        'selected="selected"':''}}
                                    @else
                                        {{Input::old("schedule[$j][schedule_session_month]")}}
                                    @endif>
                                    {{$data}}
                                </option>
                            @endforeach
                            @endif
                        </select>
                    </div>
                    
                    <label class="col-sm-3 col-md-3 control-label label1" for="schedule_number">No Of Sessions/Months
                        <span class="important_required">*</span>
                    </label>
                    <div class="col-sm-3 col-md-2">
                        <input type="text" class="form-control" id="schedule_number" name="schedule[{{$j}}][schedule_number]" value="@if(isset($batchDetails)){{$scheduleData['schedule_number']}}@else{{Input::old('schedule[$j][schedule_number]')}}@endif">
                    </div>
                </div>
            </div>
            <div class="row row_padding">
                <div class="form-group">
                    <label class="col-sm-3 col-md-3 control-label input1" for="schedule_price">Price<span class="important_required">*</span></label>
                    <div class="col-sm-3 col-md-3">
                        <input type="text" class="form-control" id="schedule_price" name="schedule[{{$j}}][schedule_price]" value="@if(isset($batchDetails)){{$scheduleData['schedule_price']}}@else{{Input::old('schedule[$j][schedule_price]')}}@endif">
                    </div>
                    <label  class="col-sm-3 control-label label1">
                        Batch have Classes on<span class="important_required">*</span>
                    </label>

                    <div class="col-sm-6">
                        <ul class="ul-without-bullets">
                            @foreach($weekdays as $data)
                                <li>
                                    <input type="checkbox" name="schedule[{{$j}}][schedule_class][]" value="{{$data}}"
                                    @if(isset($batchDetails))
                                        @if(in_array($data, $scheduleData['schedule_class']))
                                            {{'checked="checked"'}}
                                        @endif
                                    @else
                                        {{Input::old("schedule[$j][schedule_class][]")}}
                                    @endif/>
                                    {{ucfirst($data)}}
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        @endfor
        @endif
        <div class="btn_save_div" >
            <button type="submit" class="btn btn-success btn-lg"> @if(isset($batchDetails)) <i class="fa fa-save"></i>  Save @else <i class="fa fa-plus"></i>  Create @endif</button>
            <button type="reset" class="btn btn-warning btn-lg"><i class="fa fa-power-off"></i> Reset</button>
        </div>
    </form>
</div>
</div>
</div>
<div class="modal fade" id="venueCreate" ="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    @include('Modals.venue')
</div>

@stop
@section('pagejavascript')
    <script type="text/javascript" src="/assets/js/jquery-te-1.4.0.min.js" charset="utf-8"></script>
@stop
@section('pagejquery')
<script type="text/javascript">
    $(document).ready(function(){
        navActive('navbar-vendor-createBatch');
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
                            min: 1,
                            max: 30,
                            message: 'The title must be more than 1 and less than 30 characters long'
                        },
                        regexp: {
                            regexp: /^[a-zA-Z0-9 _-]+$/,
                            message: 'The username can only consist of alphabetical, number,dash and underscore'
                        }
                    }
                },

                batch_single_price: {
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
                            regexp: /^[a-zA-Z0-9 _-]+$/,
                            message: 'The description can only consist of alphabetical, numbers,dash and underscore'
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