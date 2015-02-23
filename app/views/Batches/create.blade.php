@extends('Layouts.layout')
@section('pagestylesheet')
    <style>
    .ul-without-bullets { list-style-type: none; }

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

    .create_class { font-size: 20px;font-weight: 600;text-align: center;margin-top: -20px; }

    .important_required { color:red; }

    .img_requirement { font-size:12px; }

    .form_level { background: #3396d1;height:41px;margin-bottom: 20px;color: white;font-size: 22px;padding: 5px 15px 5px 10px;font-weight: bold; }

    .radio_data {  position:relative;top:1px; }

    .checkbox_data { position:relative;top:-2px; }

    #scheduleContainer { padding: 0 15px 0 5px; }

    #scheduleContainer h4 { text-align: center;font-size: 22px;margin: 0 0; }

    #scheduleContainer .control-label { margin-top:10px; }

    #scheduleContainer label { font-weight: normal;cursor: pointer;line-height: 0; }

    #scheduleContainer li { line-height: 0; }

    .addschedule { text-align: center; }

    #createBatch { background:white; }    

    #scheduleStrat { padding-top:30px; }

    #removeScheduleButton { float: right;color: red;font-size: 16px;cursor: pointer; }

    #PriceForSingleClass { display: none;}

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
    @include('Templates.navbarVendor')
    <div class="container">
    <form role="form"  name="batchCreateForm" onsubmit="return(validate());" id="classInfo" action="@if(isset($batchDetails)){{"/batches/update/$batchDetails->id"}}@else{{"/batches/store"}}@endif" method="post" enctype="multipart/form-data" >          
        <input type="hidden" name="csrf_token" value="{{ csrf_token() }}">
        <div class="create_class"><h1>Create your Class</h1></div>
        <div class="col-md-10 col-md-offset-1">
            <div class="form_level">Class Description</div>
            <div class="row" style="padding:0 20px 0 20px;">
                <div class="col-md-6 col-sm-6 col-xs-12 form-group" >
                    <input type="text" placeholder="Please Enter Title For Your Class*" class="form-control input1" id="batch" name="batch" value="@if(isset($batchDetails)){{$batchDetails->batch}}@else{{Input::old('batch')}}@endif" required>
                </div>
                <div class=" col-md-6 col-sm-6 col-xs-12 form-group" >
                    <input type="text" placeholder="Please Enter Tagline For Your Class" class="form-control" title="Not more than 40 characters" maxlength="40" id="batch_tagline"  name="batch_tagline" value="@if(isset($batchDetails)){{$batchDetails->batch_tagline}}@else{{Input::old('batch_tagline')}}@endif">
                </div>
            </div>  
            <div class="row" style="padding:10px 20px 0px 20px;" >            
                <div class="col-sm-6 col-md-6 form-group" id="batchCateogyContainer">
                    <select class="form-control" id="batch_category_id" name="batch_category_id" required="required">
                        <option value="">Please Select Category*</option>
                        @foreach ($categories as $data)
                            <option value={{$data->id}}
                                @if(isset($batchDetails))
                                {{($batchDetails->batch_category_id==$data->id)?
                                'selected="selected"':''}}
                                @endif>
                                {{$data->category}}
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
            </div>
            <div class="row" style="padding:10px 0px 0px 10px;" >
                <div class="col-md-9 form-group">
                    <label for="batch_accomplishment" class="col-sm-12 control-label label1">What will participants achieve through this class?</label>
                    <div class="col-sm-12">
                        <textarea name="batch_accomplishment" id="batch_accomplishment" class="jqte-test" >@if(isset($batchDetails)){{$batchDetails->batch_accomplishment}}@else{{Input::old('batch_accomplishment')}}@endif</textarea>
                    </div>
                </div>
                <div class="col-md-3 form-group">
                    <label class="col-sm-12 control-label label1">Photo Gallery</label>
                    <div class="col-sm-12">
                        <span class="btn btn-default btn-file" >Add Photos
                            <input type="file" id="batch_photo" name="batch_photo" value="@if(isset($batchDetails)){{$batchDetails->batch_photo}}@endif">
                        </span>                   
                        <ul class="ul-without-bullets" style="margin-left:-40px;">
                            <li><span class="img_requirement">1.Based on requirements</span></li>
                            <li><span class="img_requirement">2.Based on requirements</span></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="form_level">Add Your Target Audience</div>
            <div class="row" style="padding-bottom:20px;">
                <div class="col-sm-12 col-md-12" id="targetAudience">
                    <div class="form-group">
                        <label for="batch_difficulty_level" class="col-sm-3 control-label label1">Difficulty Level<span class="important_required">*</span></label>
                        <div class="col-sm-8 targetAudienceRadioOptions">
                            <ul class="radio ul-without-bullets" name="batch_difficulty_level" id="batchDifficultyLevel">
                                @foreach($difficulty_level as $key => $data)
                                <li>
                                <label>
                                    <input name="batch_difficulty_level" class="batchDifficultyLevel" id="batch_difficulty_level" value={{$key}} @if(isset($batchDetails)){{($batchDetails->batch_difficulty_level==$key)?'checked':''}}@else{{(Input::old('batch_difficulty_level')==$key)?'checked':''}}@endif type="radio" onClick="removeErrorMessage('#batchDifficultyLevelValidationMessageContainer')" /><span class="radio_data">{{$data}}</span>
                                </label>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-md-12" style="margin-top:20px;">
                    <div class="form-group">
                        <label for="batch_age_group" class="col-sm-3 control-label label1">Target Age Group<span class="important_required">*</span></label>
                        <div class="col-sm-8 targetAudienceRadioOptions">
                            <ul class="radio ul-without-bullets" name="batch_age_group" id="batchAgeGroup">
                                @foreach($age_group as $key => $data)
                                <li>
                                <label >
                                    <input name="batch_age_group" class="batchAgeGroup" id="batch_age_group" value={{$key}} @if(isset($batchDetails)){{($batchDetails->batch_age_group==$key)?'checked':''}}@else{{(Input::old('batch_age_group')==$key)?'checked':''}}@endif type="radio" onClick="removeErrorMessage('#batchAgeGroupValidationMessageContainer')"/><span class="radio_data">{{$data}}</span>
                                </label>
                                </li>
                                @endforeach
                                
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-md-12" style="margin-top:20px;">
                    <div class="form-group">
                        <label for="batch_gender_group" class="col-sm-3 control-label label1">Target Gender Group<span class="important_required">*</span></label>
                        <div class="col-sm-8 targetAudienceRadioOptions">
                            <ul class="radio ul-without-bullets" name="batch_gender_group" id="batchGenderGroup">
                                @foreach($gender_group as $data)
                                <li>
                                <label>
                                    <input name="batch_gender_group" class="batchGenderGroup" id="batch_gender_group" value={{$key}} @if(isset($batchDetails)){{($batchDetails->batch_gender_group==$key)?'checked':''}}@else{{(Input::old('batch_gender_group')==$key)?'checked':''}}@endif type="radio" onClick="removeErrorMessage('#batchGenderGroupValidationMessageContainer')" /><span class="radio_data">{{$data}}</span>
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
                <div class="row row_padding" style="clear:both;margin-top:40px;">
                    <div class="form-group">
                        <label for="batch_trial" class="col-sm-3 control-label label1">Trial Available<span class="important_required">*</span></label>
                        <div class="col-sm-6">
                            <ul class="radio ul-without-bullets trialAvailableRadioOptions" name="batch_trial" id="batch_trial_container">
                                @foreach($trial as $key => $data)
                                <li>
                                <label>
                                    <input name="batch_trial" id="batch_trial" value={{$key}} @if(isset($batchDetails)){{($batchDetails->batch_trial==$key)?'checked':''}}@else{{(Input::old('batch_trial')==$key)?'checked':''}}@endif type="radio" onClick="removeErrorMessage('#batch_trial_error_message')"/><span class="radio_data">{{$data}}</span>
                                </label>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="row row_padding" id="PriceForSingleClass">
                    <div class="form-group ">
                        <label for="batch_single_price" class="col-sm-3 control-label label1">Price for a Single Class<span class="important_required">*</span></label>
                        <div class="col-sm-3 col-md-3" id="batch_single_price_container">
                            <input type="text" class="form-control" id="batch_single_price" onkeyup="validateScheduleFields('','batch_single_price')" name="batch_single_price" value="@if(isset($batchDetails)){{$batchDetails->batch_single_price}}@else{{Input::old('batch_single_price')}}@endif" />
                        </div>
                    </div>
                </div>
                <div class="row row_padding"  style="margin-top:10px;">
                    <div class="form-group">
                        <label for="batch_comment" class="col-sm-3 control-label label1">Tell us more about your batch(Prerequisite required, anything else you wish to share)</label>
                        <div class="col-sm-8">
                            <textarea  class="jqte-test" name="batch_comment" id="batch_comment" >@if(isset($batchDetails)){{$batchDetails->batch_comment}}@else{{Input::old('batch_comment')}}@endif</textarea>
                        </div>
                    </div>
                </div>
            </div>
            <div class="form_level">Add a Schedule</div>
            <div id="scheduleContainer">
        @if(isset($batchDetails))
            @foreach ($batchDetails->schedule as $j => $scheduleData)
            <div class="row row_padding">
                <h4>Schedule {{$j+1}}</h4>
                <div id="scheduleStrat">
                    @if(isset($batchDetails))
                        <input type="hidden" name="schedule[{{$j}}][id]" value="{{$scheduleData['id']}}">
                    @endif                          
                    <div class="col-sm-4 col-md-4 form-group">
                        <select class="form-control" id="schedule_session_month" name="schedule[{{$j}}][schedule_session_month]" required="required">
                            <option value="">Please Select Session/Month*</option>
                            @if(isset($schedule_session_month))                            
                            @foreach ($schedule_session_month as $key => $data)
                                <option value={{$key}}
                                    @if(isset($batchDetails))
                                        {{($scheduleData['schedule_session_month']==$key)?
                                        'selected="selected"':''}}
                                    @else
                                    {{(Input::old("schedule[$j][schedule_session_month]")==$data->id)?
                                    'selected="selected"':''}}
                                    @endif>
                                    {{$data}}
                                </option>
                            @endforeach
                            @endif
                        </select>
                    </div>                                
                    <div class="col-sm-4 col-md-4 form-group">
                        <input type="text" placeholder="Enter No of Sessions/Months*" class="form-control" id="schedule_number" name="schedule[{{$j}}][schedule_number]" value="@if(isset($batchDetails)){{$scheduleData['schedule_number']}}@else{{Input::old('schedule[$j][schedule_number]')}}@endif" required="required" />
                    </div>                
                    <div class="col-sm-4 col-md-4 form-group">
                        <input type="text" placeholder="Please Enter Price*" class="form-control" id="schedule_price" name="schedule[{{$j}}][schedule_price]" value="@if(isset($batchDetails)){{$scheduleData['schedule_price']}}@else{{Input::old('schedule[$j][schedule_price]')}}@endif" required="required" />
                    </div>
                </div>
            </div>
            <div class="row row_padding">
                <div class="form-group">
                    <label  class="col-sm-3 control-label label1">
                        Batch have Classes on<span class="important_required">*</span>
                    </label>
                    <div class="col-sm-6">
                        <ul class="ul-without-bullets">
                            @foreach($weekdays as $data)
                                <li>
                                    <label>
                                    <input type="checkbox" name="schedule[{{$j}}][schedule_class][]" value="{{$data}}"
                                    @if(isset($batchDetails))
                                        @if(in_array($data, $scheduleData['schedule_class']))
                                            {{'checked="checked"'}}
                                        @endif
                                    @else
                                        @if(in_array($data, (Input::old("schedule[$j][schedule_class][]"))))
                                            {{'checked="checked"'}}
                                        @endif
                                    @endif/>
                                    <span class="checkbox_data">{{ucfirst($data)}}</span>
                                    </label>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        @endforeach
        @else
        @for ($j = 0; $j < 1; $j++)    
            <div class="row row_padding" id="multiScheduleForm{{$j}}" class="scheduleStrat">
                <h4>Schedule {{$j+1}}</h4>
                <div id="scheduleStrat">  
                    @if(isset($batchDetails))
                        <input type="hidden" name="schedule[{{$j}}][id]" value="{{$scheduleData['id']}}">
                    @endif                            
                    <div class="col-sm-4 col-md-4 form-group" id="schedule_session_month_container{{$j}}">
                        <select class="form-control" id="schedule_session_month{{$j}}" onchange="validateSessionMonth({{$j}});" name="schedule[{{$j}}][schedule_session_month]">
                            <option value="">Please Select Session/Month*</option>
                            @if(isset($schedule_session_month))
                            @foreach ($schedule_session_month as $key => $data)
                                <option value={{$key}}>{{$data}}</option>
                            @endforeach
                            @endif
                        </select>
                    </div>
                    <div class="col-sm-4 col-md-4 form-group" id="schedule_number_container{{$j}}">
                        <input type="text" placeholder="Enter No of Sessions/Months*" class="form-control" id="schedule_number{{$j}}" onkeyup="validateScheduleFields({{$j}},'schedule_number')" name="schedule[{{$j}}][schedule_number]" value="" />
                    </div>
                    <div class="col-sm-4 col-md-4 form-group" id="schedule_price_container{{$j}}">
                        <input type="text" placeholder="Please Enter Price*" class="form-control" id="schedule_price{{$j}}" onkeyup="validateScheduleFields({{$j}},'schedule_price')" name="schedule[{{$j}}][schedule_price]" value="" />
                    </div>
                </div>
            </div>
             <div class="row row_padding">
                <div class="form-group ">
                    <label  class="col-sm-4 control-label label1">
                        Batch have Classes on<span class="important_required">*</span>
                    </label>
                    <div class="col-sm-8">
                        <ul class="ul-without-bullets targetAudienceRadioOptions" id="schedule_batch_weekdays_container{{$j}}">
                            @foreach($weekdays as $data)
                                <li>
                                    <label>
                                    <input type="checkbox" id="schedule_batch_weekdays{{$j}}" name="schedule[{{$j}}][schedule_class][]" value="{{$data}}"
                                      onClick="removeErrorMessage('#schedule_batch_weekdays_validation_message{{$j}}')"/>
                                    <span class="checkbox_data">{{ucfirst($data)}}</span>
                                    </label>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        @endfor
        @endif
        <div class='addschedule'>
            <button class='btn btn-primary addschedule' id="addschedule-btn" onclick="addSchedule()"> + Add Schedule</button>
        </div><hr/>
        <div class="btn_save_div" style="margin-top:20px">
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
    var scheduleSessions = ["Session", "Month"];
    var weekDays = ["monday", "tuesday", "wednesday","thursday","friday","saturday","sunday"];
    var scheduleCount = 1;
    var batchSinglePriceEnable = false;
    var valid = "glyphicon glyphicon-ok"; 
    var invalid = "glyphicon glyphicon-remove";
    function ucfirst(string)
    {
      return string.charAt(0).toUpperCase() + string.slice(1);
    }
    function removeSchedule(id)
    {
        $("#schedule"+id).remove();
        scheduleCount--;
    }
    function removeErrorMessage(tagetAudienceID)
    {
        $(tagetAudienceID).remove(); 
    }
    function addSchedule()
    {
        var linksContainer = $('#scheduleContainer'),baseUrl;
        $("<div></div>")
        .attr("id","schedule"+scheduleCount)
        .append("<hr/>")
        .append
        (
            $("<h4></h4>")
            .text("Schedule "+(scheduleCount+1))
            .append
            (
                $("<span></span>")
                .attr("id","removeScheduleButton")
                .attr("onClick","removeSchedule("+scheduleCount+")")
                .attr("title","Remove Schedule")
                .text("X")
            )
        )
        .append
        (
            $("<div></div>")
            .attr("class","row row_padding")
            .append
            (
                $("<div></div>")
                .attr("class","")
                .attr("id","scheduleStrat")
                .append
                (
                    $("<div></div>")
                    .attr("class","col-sm-4 col-md-4 form-group")
                    .attr("id","schedule_session_month_container"+scheduleCount)
                    .append
                    ( 
                        $("<select style='margin-left:0px'></select>")
                        .attr("class","form-control SessionSelect")
                        .attr("id","schedule_session_month"+scheduleCount)
                        .attr("onchange","validateSessionMonth("+scheduleCount+")")
                        .attr("name","schedule["+scheduleCount+"][schedule_session_month]")
                        .append
                        (
                             $("<option value=''>Please Select Session/Month*</option>")
                        )
                    )
                ) 
                .append
                (
                    $("<div></div>")
                    .attr("class","col-sm-4 col-md-4 form-group")
                    .attr("id","schedule_number_container"+scheduleCount)
                    .append
                    ( 
                        $("<input required />") 
                        .attr("type","text")
                        .attr("onkeyup","validateScheduleFields("+scheduleCount+",'schedule_number')")
                        .attr("class","form-control")
                        .attr("id","schedule_number"+scheduleCount)
                        .attr("name","schedule["+scheduleCount+"][schedule_number]")
                        .attr("placeholder","No Of Sessions/Months*")
                    )
                ) 
                .append
                (
                    $("<div></div>")
                    .attr("class","col-sm-4 col-md-4 form-group")
                    .attr("id","schedule_price_container"+scheduleCount)
                    .append
                    ( 
                        $("<input required />")  
                        .attr("type","text")
                        .attr("onkeyup","validateScheduleFields("+scheduleCount+",'schedule_price')")
                        .attr("class","form-control")
                        .attr("id","schedule_price"+scheduleCount)
                        .attr("name","schedule["+scheduleCount+"][schedule_price]")
                        .attr("placeholder","Price*")                       
                    )
                )           
            )
        )
        .append
        (
            $("<div></div>")
            .attr("class","row row_padding")
            .append
            (
                $("<div></div>")
                .attr("class","form-group")
                .append
                (
                    $("<label></label>")
                    .attr("class","col-sm-4 control-label label1")
                    .text("Batch have Classes on")
                    .append
                    (
                        $("<span></span>")
                        .attr("class","important_required")
                        .text("*")
                    )                      
                ) 
                .append
                (
                    $("<div></div>")
                    .attr("class","col-sm-7 targetAudienceRadioOptions")
                    .append
                    ( 
                        $("<ul></ul>")  
                        .attr("class","ul-without-bullets batch_week_days")
                        .attr("id","schedule_batch_weekdays_container"+scheduleCount)
                    )
                )
            )
        )
        .appendTo(linksContainer);    
        var SessionContainer = $("#schedule"+scheduleCount+" #schedule_session_month"+scheduleCount),baseUrl;
        for(var key in scheduleSessions)
        {
            var data = scheduleSessions[key];
            $("<option></option>")
                .attr("value",key)                
                .text(data)
                .appendTo(SessionContainer);
        }
        var weekDaysContainer = $("#schedule"+scheduleCount+" .batch_week_days"),baseUrl;
        for(var key in weekDays)
        {
            var day = ucfirst(weekDays[key]);
            $("<li></li>")
            .append
            (
                $("<label></label>")
                .append
                (
                    $("<input required/>")      
                    .attr("type","checkbox")
                    .attr("id","schedule_batch_weekdays"+scheduleCount)
                    .attr("value",weekDays[key])   
                    .attr("name","schedule["+scheduleCount+"][schedule_class][]")
                    .attr("onClick","removeErrorMessage('#schedule_batch_weekdays_validation_message"+scheduleCount+"')")       
                )
                .append
                (
                    $("<span></span>")
                    .attr("class","checkbox_data")
                    .text(' '+day)             
                )
            )
            .appendTo(weekDaysContainer);      
        }
        scheduleCount++;
    }
    function filterSubcategories(categoryID)
    {        
        var subcategories = allSubcategories.filter(function(array){                        
                       return array.subcategory_category_id ==  categoryID ;            
        });        
        var linksContainer = $('#batch_subcategory_id'),baseUrl;
        for(subcategory in subcategories)
        {
            var subcategoryID = subcategories[subcategory]['id'];
            var subcategory = subcategories[subcategory]['subcategory'];
            $("<option></option>")
                .attr("value",subcategoryID)
                .attr("class",subcategoryID)
                .text(subcategory)
                .appendTo(linksContainer);
        }
    }
    $(document).ready(function(){  
        $("input:radio[name=batch_trial]").click(function() {
            var value = $(this).val();
            if(value==3)
            {
                batchSinglePriceEnable = true;
                $("#PriceForSingleClass").show();
            }
            else
            {
                batchSinglePriceEnable  = false;
                $("#PriceForSingleClass").hide();
            }
        });
        $('#addschedule-btn').click(function(e){
            e.preventDefault();
            e.stopPropagation();
        })
        $('#batch_category_id').change(function () 
        {
            var categoryID = $(this).val();            
            $('#batch_subcategory_id').empty();  
            filterSubcategories(categoryID);            
        })
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
                batch_category_id: {
                    message: 'Please Select Category',
                    validators:{
                        
                    }
                },
                batch_subcategory_id: {
                    message: 'Please Select Sub Category',
                    validators:{
                        callback: {
                            
                        }                                              
                    }
                },
                schedule_number:{
                    message: 'Please Enter No of Sessions/Months',
                    validators:{
                        required: true
                    }
                },
                batch_accomplishment: {
                    message: 'The text is not valid',
                    validators: {                
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
    function validate()
    {
        var Result = true;
        var Focus = false;       
        var targetAudienceFiledsValues = new Array();
        var scheduleFiledsValues = new Array();
        var targetAudienceErrorMessage = ["Please select difficulty level","Please select age group","Please select gender group"];
        var targetAudienceContainer = ["batchDifficultyLevel","batchAgeGroup","batchGenderGroup"];
        var scheduleContainers = ["schedule_number","schedule_price","schedule_batch_weekdays","schedule_session_month"];
        var batchTrailAvailable = $('#batch_trial:checked').val();
        targetAudienceFiledsValues[0] = $('.batchDifficultyLevel:checked').val();
        targetAudienceFiledsValues[1] = $('.batchAgeGroup:checked').val();
        targetAudienceFiledsValues[2] = $('.batchGenderGroup:checked').val();
        var scheduleErrorMessage = ["Please fill this field properly","Please fill this field properly","Please select days","Please Select Session/Month"];    
        for(var i=0;i<3;i++)
        {
            var targetFiedlValue = targetAudienceFiledsValues[i];
            var targetContainer = targetAudienceContainer[i];
            if(targetFiedlValue==undefined || targetFiedlValue=="")
            {      
                $('#'+targetContainer+'ValidationMessageContainer').remove();
                $('<span></span>')
                .attr("id",targetContainer+"ValidationMessageContainer")
                .attr("class","batchCreateFormError")
                .text(targetAudienceErrorMessage[i])
                .appendTo($('#'+targetContainer),baseUrl);
                Result = false;
                if(!Focus)
                {
                    $('.'+targetAudienceContainer[i]).focus();
                    Focus = true;
                }
            }
        }
        if(batchTrailAvailable=="" || batchTrailAvailable==undefined)
        {
            var batchTrailAvailableContainer = $('#batch_trial_container'),baseUrl;
            $('#batch_trial_error_message').remove();
            $('<span></span>')
            .attr("id","batch_trial_error_message")
            .attr("class","batchCreateFormError")
            .text("Please select available trial option")
            .appendTo(batchTrailAvailableContainer);
            Result = false;
            if(!Focus)
            {
                $('#batch_trial').focus();
                Focus = true;
            }
        }
        if(batchSinglePriceEnable)
        {
            var batchSinglePrice = $('#batch_single_price').val();
            var PriceForSingleClassContainer = $('#batch_single_price_container'),baseUrl;
            if(batchSinglePrice=="" || isNaN(batchSinglePrice) || batchSinglePrice<1)
            {
                $('#batch_single_price_validation_message').remove();
                $('<span></span>')
                .attr("id","batch_single_price_validation_message")
                .attr("class","batchCreateFormError")
                .text("Please fill this field properly")
                .appendTo(PriceForSingleClassContainer);
                $('<span></span>')
                .attr("class",invalid+" right-addon")
                .appendTo(PriceForSingleClassContainer);
                $('#batch_single_price').css('border-color','#a94442');
                if(!Focus)
                {
                    $('#batch_single_price').focus();
                    Focus = true;
                } 
                Result = false;
            }
        }
        for(var i=0;i<scheduleCount;i++)
        {
            scheduleFiledsValues[0] = $('#schedule_number'+i).val();
            scheduleFiledsValues[1] = $('#schedule_price'+i).val();
            scheduleFiledsValues[2] = $('#schedule_batch_weekdays'+i+':checked').val();
            scheduleFiledsValues[3] = $('#schedule_session_month'+i).val(); 
            for(var filedsIndex=0;filedsIndex<4;filedsIndex++)
            {
                var scheduleFiledsValue = scheduleFiledsValues[filedsIndex];
                var scheduleFiledsValueDuplicate = scheduleFiledsValue;
                if(filedsIndex>=2)
                        scheduleFiledsValueDuplicate = 4;
                var scheduleMessageContainer = $('#'+scheduleContainers[filedsIndex]+'_container'+i),baseUrl;
                var scheduleErrorMessageContainer = scheduleContainers[filedsIndex]+'_validation_message'+i;
                if( scheduleFiledsValue=="" || scheduleFiledsValue==undefined || 
                    isNaN(scheduleFiledsValueDuplicate) || scheduleFiledsValueDuplicate<0 )
                {
                    $('#'+scheduleErrorMessageContainer).remove();
                    $('<span></span>')
                    .attr("id",scheduleErrorMessageContainer)
                    .attr("class","batchCreateFormError")
                    .text(scheduleErrorMessage[filedsIndex])
                    .appendTo(scheduleMessageContainer);
                    if(filedsIndex<2 || filedsIndex==3 )
                    {
                        $('<span></span>')
                        .attr("class",invalid+" right-addon")
                        .appendTo(scheduleMessageContainer);
                        $('#'+scheduleContainers[filedsIndex]+i).css('border-color','#a94442');
                    }
                    Result = false;
                    if(!Focus)
                    {
                        $('#'+scheduleContainers[filedsIndex]+i).focus();
                        Focus = true;
                    }
                }
            }
        }
        $('#createBatchButton').attr("disabled", "disabled");
        $('#createBatchButton').removeAttr('disabled');
        return Result;
    }
    function validateScheduleFields(divid,divName)
    {
        var inputValue = $('#'+divName+divid).val();
        var divisionContainer = $('#'+divName+'_container'+divid),baseUrl;
        if(isNaN(inputValue) || inputValue<1)
        {    
            $('#'+divName+"_validation_message"+divid).remove();
            $('#'+divName+'_container'+divid+' .glyphicon-ok').remove();
            $('<span></span>')
            .attr("id",divName+"_validation_message"+divid)
            .attr("class","batchCreateFormError")
            .text("Should be a number and greater than 0")
            .appendTo(divisionContainer);
            $('<span></span>')
            .attr("class",invalid+" right-addon")
            .appendTo(divisionContainer);
            $('#'+divName+divid).css('border-color','#a94442');
        }
        else
        {
            $('#'+divName+"_validation_message"+divid).remove();
            $('#'+divName+'_container'+divid+' .glyphicon-remove').remove();
            $('<span></span>')
            .attr("class",valid+" right-addon")
            .appendTo(divisionContainer);
            $('#'+divName+divid).css('border-color','#3c763d');
        }
    }
    function validateSessionMonth(scheduleIndex) 
    {
        var SessionMonthValue  =  $('#schedule_session_month'+scheduleIndex).val();
        if(SessionMonthValue != "" || SessionMonthValue==undefined )
        {
            $('#schedule_session_month_validation_message'+scheduleIndex).remove();
            $('#schedule_session_month_container'+scheduleIndex+' .glyphicon-remove').remove();
            $('<span></span>')
            .attr("class",valid+" right-addon")
            .appendTo('#schedule_session_month_container'+scheduleIndex);
            $('#schedule_session_month'+scheduleIndex).css('border-color','#3c763d');
        }
        else
        {
            $('#schedule_session_month_validation_message'+scheduleIndex).remove();
            $('#schedule_session_month_container'+scheduleIndex+' .glyphicon-ok').remove();
             $('<span></span>')
            .attr("id",'schedule_session_month_validation_message'+scheduleIndex)
            .attr("class","batchCreateFormError")
            .text("Please Select Session/Month")
            .appendTo('#schedule_session_month_container'+scheduleIndex);
            $('<span></span>')
            .attr("class",invalid+" right-addon")
            .appendTo('#schedule_session_month_container'+scheduleIndex);
            $('#schedule_session_month'+scheduleIndex).css('border-color','#a94442');
        }
    }
</script>
<script>
    $('.jqte-test').jqte();
    var jqteStatus = true;
    $(".status").click(function()
    {
        jqteStatus = jqteStatus ? false : true;
        $('.jqte-test').jqte({"status" : jqteStatus})
    });
</script>
@stop