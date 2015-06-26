@extends('Layouts.layout')
@section('pagestylesheet')
    <style>
    .ul-without-bullets { list-style-type: none; }

    .ul-without-bullets li {padding: 0px;margin: 0px;}

    #gengroup,#agegroup { list-style-type: none; }

    .row_padding { padding-top:15px;padding-left:15px; }

    .btn-file {   position: relative;overflow: hidden;font-size:20px;background:#3A8AF1;color:white; }

    .btn-file input[type=file] {
        position: absolute;top: 0;right: 0;min-width: 100%;min-height: 100%;font-size: 100px;text-align: right;
        filter: alpha(opacity=0);opacity: 0;outline: none;background: blue;cursor: inherit;display: block;
    }

    .label1 { font-size: 15px;font-weight: 100;text-align: left !important; }

    .btn_save_div { text-align: center; }

    .input1 { font-size: 15px; }

    @media(min-width:992px) { #classInfo1 { margin-left: auto;margin-right: auto;width: 900px; } } 

    .create_class { font-size: 20px;font-weight: 600;text-align: center;}

    .important_required { color:red; }

    .img_requirement { font-size:12px; }

    .form_level { background: #3396d1;height:41px;margin-bottom: 20px;color: white;font-size: 22px;padding: 5px 15px 5px 10px;font-weight: bold;
                    border-radius: 3px; }

    .radio_data {  position:relative;top:1px; }

    .checkbox_data { position:relative;top:-2px; font-weight: normal;}

    #scheduleContainer { padding: 0 15px 0 5px; }

    #scheduleContainer h4 { text-align: center;font-size: 22px;margin: 0 0; }

    #scheduleContainer .control-label { margin-top:10px; }

    #scheduleContainer label { font-weight: normal;cursor: pointer;line-height: 0; }

    #scheduleContainer li { line-height: 0; }

    .addschedule { text-align: center; }

    #createBatch { background:white; }    

    #scheduleStrat { padding-top:30px; }

    #removeScheduleButton { float: right;color: red;font-size: 16px;cursor: pointer; }

    .CategorySelectOption { text-align: center; }

    .CategorySelectOption .labelCategory { margin-left: -15px;font-weight: normal;text-align: left; }

    .CategorySelectOption select { margin-left: 21px; }

    .CategorySelectOption .labelSubCat { margin-left: 51px; }

    #scheduleStrat .lebelSession { margin-left: -15px; }

    #scheduleStrat .lebelSessionNum { margin-left: 25px; }

    #scheduleStrat .lebelSessionPrice { margin-left: 47px; }

    #lebelSessionNum { margin-left: 53px; }

    #lebelSessionPrice { margin-left: 48px;float:left; }

    .SessionSelect { margin-left: 14px; }

    .targetAudienceRadioOptions { margin-left: -40px; }

    .trialAvailableRadioOptions { margin-left: -42px; }
    </style>
    
    <link type="text/css" rel="stylesheet" href="/assets/css/jquery-te-1.4.0.css">
@stop
@section('content')

	<div class="home_vendor_page" id="createBatch">   
    <div class="container">
    <form role="form"  name="batchCreateForm" onsubmit="return(validate());" id="classInfo" action="/batches/createentry" method="post" enctype="multipart/form-data" >
        <input type="hidden" name="csrf_token" value="{{ csrf_token() }}">
        <div class="create_class"><h1>Create Your Class</h1></div>
        <div class="col-md-10 col-md-offset-1">
            <div class="form_level">Class Description</div>
            <div class="row" style="padding:10px 20px 0px 20px;" >            
                <div class="col-sm-6 col-md-6 form-group" id="batchCateogyContainer">
                    <select class="form-control" id="batch_user_id" name="batch_user_id" required="required">
                        <option value="">Please Select User*</option>
                        @foreach ($users as $data)
                            <option value={{$data->id}}
                                @if(isset($batchDetails))
                                {{($batchDetails->batch_user_id==$data->id)?
                                'selected="selected"':''}}
                                @endif>
                                {{$data->user_name}}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="col-sm-6 col-md-6 form-group" id="batchCateogyContainer">
                    <select class="form-control" id="batch_institute_id" name="batch_institute_id" required="required">
                        <option value="">Please Select Institute*</option>
                        @foreach ($institutes as $data)
                            <option value={{$data->id}}
                                @if(isset($batchDetails))
                                	{{($batchDetails->batch_institute_id==$data->id)?
                                'selected="selected"':''}}
                                @endif>
                                {{$data->institute}}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="col-sm-6 col-md-6 form-group" id="batchSubCateogyContainer">                                
                    <select class="form-control" name="batch_subcategory_id" id="batch_subcategory_id" required="required" >
                        <option value="">Please Select Sub Category*</option>
                        @foreach ($all_subcategories as $data)                        
                        <option category-id="{{$data->subcategory_category_id}}" class="{{$data->id}}" value={{$data->id}}
                            @if(isset($batchDetails))
                            {{($batchDetails->batch_subcategory_id==$data->id)?
                            'selected="selected"':''}}
                            @endif>
                            {{$data->subcategory}} 
                        </option>                        
                        @endforeach
                    </select>                    
                </div>
                <div class="col-md-6 col-sm-6 col-xs-12 form-group" >
                    <input type="text" placeholder="User Price for a Single Class" class="form-control" id="batch_single_price" name="batch_single_price" value="@if(isset($batchDetails)){{$batchDetails->batch_single_price}}@else{{Input::old('batch_single_price')}}@endif" />
                </div>
                <div class="col-md-6 col-sm-6 col-xs-12 form-group" >
                    <input type="text" placeholder="Hobbyix Price for a Single Class" class="form-control" id="batch_hobbyix_price" name="batch_hobbyix_price" value="@if(isset($batchDetails)){{$batchDetails->batch_hobbyix_price}}@else{{Input::old('batch_hobbyix_price')}}@endif" />
                </div>
                <div class="col-md-6 col-sm-6 col-xs-12 form-group" >
                    <input type="text" placeholder="Credit for a Single Class" class="form-control" id="batch_credit" name="batch_credit" value="@if(isset($batchDetails)){{$batchDetails->batch_credit}}@else{{Input::old('batch_credit')}}@endif" />
                </div>
            </div>
            <div class="row" style="padding:0 20px 0 20px;">
                <div class="col-md-6 col-sm-6 col-xs-12 form-group" >
                    <input type="text" placeholder="Please Enter Weekday Timing For Your Class*" class="form-control input1" id="batch_comment" name="batch_comment" value="@if(isset($batchDetails)){{$batchDetails->batch_comment}}@else{{Input::old('batch_comment')}}@endif" required>
                </div>
                <div class=" col-md-6 col-sm-6 col-xs-12 form-group" >
                    <input type="text" placeholder="Please Enter Sunday Timing" class="form-control" title="Not more than 40 characters" maxlength="40" id="batch_tagline"  name="batch_tagline" value="@if(isset($batchDetails)){{$batchDetails->batch_tagline}}@else{{Input::old('batch_tagline')}}@endif">
                </div>
            </div> 
            
            <div class="form_level">Add Your Target Audience</div>
            <div class="row" style="padding-bottom:20px;">
                
                <div class="col-sm-12 col-md-12" style="margin-top:20px;">
                    <div class="form-group">
                        <label for="batch_gender_group" class="col-sm-3 control-label label1">Facilities Available<span class="important_required">*</span></label>
                        <div class="col-sm-8 targetAudienceRadioOptions">
                            <ul class="ul-without-bullets" id="">
                            @foreach($facilitiesAvailable as $data)
                                <li>
                                    <label>
                                        <input type="checkbox" id="{{$data}}" name="{{$data}}" value="1" onClick=""/>
                                        <span class="checkbox_data">{{$data}}</span>
                                    </label>
                                </li>
                            @endforeach
                            </ul>
                        </div>

                    </div>
                </div>
            </div>
            <div class="form_level">Batch Description</div>
            <div class="row" style="padding:0px 20px 20px 20px;">
                <div class="form-group">
                    <label for="batch_venue_id" class="col-sm-3 control-label label1">Venue<span class="important_required">*</span></label>
                    <div class="col-sm-3">
                        <select class="form-control" id="batch_venue_id" name="batch_venue_id" required>
                            @foreach ($venuesForUser as $data)
                                <option value={{$data->id}}
                                    @if(isset($batchDetails))
                                    {{($batchDetails->batch_venue_id==$data->id)?
                                    'selected="selected"':''}}
                                    @else
                                    {{(Input::old('batch_venue_id')==$data->id)?
                                    'selected="selected"':''}}
                                    @endif>
                                    {{$data->venue}}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-sm-3">
                        <a data-target="#venueCreate" href='javascript:void()' data-toggle="modal">Add a Venue</a>
                    </div>
                </div>
            </div>
            
        <div class="btn_save_div" style="margin-top:20px;">
            <button type="submit" id="createBatchButton" class="btn btn-success btn-lg"> @if(isset($batchDetails)) <i class="fa fa-save"></i>  Save @else <i class="fa fa-plus"></i>  Create @endif</button>
            <button type="reset" class="btn btn-warning btn-lg"><i class="fa fa-power-off"></i> Reset</button>
        </div>
        </div>
    </form>
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
    var allSubcategories = <?php echo json_encode($all_subcategories) ?>;
    var weekDays = ["monday", "tuesday", "wednesday","thursday","friday","saturday","sunday"];
    var batchUpdate = @if(isset($batchDetails)) true @else false @endif;
    var batchSinglePriceEnable = false;
    var valid = "glyphicon glyphicon-ok"; 
    var invalid = "glyphicon glyphicon-remove";
   $('#classInfo').bootstrapValidator({
            message: 'This value is not valid',
            feedbackIcons: {
                valid: 'glyphicon glyphicon-ok',
                invalid: 'glyphicon glyphicon-remove',
                validating: 'glyphicon glyphicon-refresh'
            },
            fields: {
                batch_subcategory_id: {
                    message: 'Please Select Sub Category',
                    validators:{
                        callback: {
                            
                        }                                              
                    }
                },
            }
        });
    });
</script>

@stop
@stop