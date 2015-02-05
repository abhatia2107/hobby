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
    .checkbox_data
    {
        position:relative;
        top:-2px;
    }
    #scheduleContainer h4
    {
        text-align: center;
        font-size: 22px;
        margin: 0 0;
    }
    #scheduleContainer .control-label
    {
        margin-top:10px;
    }
    #scheduleContainer label
    {
        font-weight: normal;
        cursor: pointer;
        line-height: 0;
    }
    #scheduleContainer li
    {
        line-height: 0;
    }
    .addschedule
    {
         text-align: center;
    }
    #createBatch
    {
        background:white;
    }
    #scheduleStrat
    {
       padding-top:30px
    }
    #removeScheduleButton
    {
        float: right;
        color: red;
        font-size: 16px;
        cursor: pointer;
    }
    #PriceForSingleClass
    {
        display: none;
    }
    </style>
    <link type="text/css" rel="stylesheet" href="/assets/css/jquery-te-1.4.0.css">
@stop

@section('content')
<div class="home_vendor_page" id="createBatch">
    @include('Templates.navbarVendor')
    <div class="container-fluid">
    <div id="classInfo1">
    <form role="form" name="batchCreateForm" onsubmit="return(validate());" class="form-horizontal" id="classInfo" action="@if(isset($batchDetails)){{"/batches/update/$batchDetails->id"}}@else{{"/batches/store"}}@endif" method="post" enctype="multipart/form-data" >          
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
            <div class="">
                <label for="batch_category_id" class="col-sm-3 col-md-3 control-label label1">Category<span class="important_required">*</span></label>
                <div class="col-sm-3 col-md-3 form-group">
                    <select class="form-control" id="batch_category_id" name="batch_category_id" required="required">
                        <option disabled="disabled"> Select Category</option>
                        @foreach ($categories as $data)
                            <option value={{$data->id}}
                                @if(isset($batchDetails))
                                {{($batchDetails->batch_category_id==$data->id)?
                                'selected="selected"':''}}
                                @else{{""}}
                                {{((Input::old('batch_category_id'))==$data->id)?
                                'selected="selected"':''}}
                                @endif>
                                {{$data->category}}
                            </option>
                        @endforeach
                    </select>
                </div>
                <label for="batch_subcategory_id" class="col-sm-2 col-md-2 control-label label1">Sub Category<span class="important_required">*</span></label>
                <div class="col-sm-3 col-md-3 form-group">                                
                    <select class="form-control" name="batch_subcategory_id" id="batch_subcategory_id" required >
                        <option disabled="disabled"> Select Sub Category</option>                        
                        @foreach ($all_subcategories as $data)                        
                        <option category-id="{{$data->subcategory_category_id}}" class="{{$data->id}}" value={{$data->id}}
                            @if(isset($batchDetails))
                            {{($batchDetails->batch_subcategory_id==$data->id)?
                            'selected="selected"':''}}
                            @else
                            {{((Input::old('batch_subcategory_id'))==$data->id)?
                            'selected="selected"':''}}
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
                <label for="batch_accomplishment" class="col-sm-3 control-label label1">What will participants achieve through this class?</label>
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
                <label for="batch_difficulty_level" class="col-sm-3 control-label label1">Difficulty Level<span class="important_required">*</span></label>
                <div class="col-sm-8">
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
        <div class="row row_padding">
            <div class="form-group">
                <label for="batch_age_group" class="col-sm-3 control-label label1">Target Age Group<span class="important_required">*</span></label>
                <div class="col-sm-8">
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
        <div class="row row_padding">
            <div class="form-group">
                <label for="batch_gender_group" class="col-sm-3 control-label label1">Target Gender Group<span class="important_required">*</span></label>
                <div class="col-sm-8">
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
                                {{(Input::old('batch_venue_id')==$data->id)?
                                'selected="selected"':''}}
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
            <div class="form-group">
                <label for="batch_trial" class="col-sm-3 control-label label1">Trial Available<span class="important_required">*</span></label>
                <div class="col-sm-6">
                    <ul class="radio ul-without-bullets" name="batch_trial" id="batch_trial_container">
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
                <div class="col-sm-3 col-md-3">
                    <input type="text" class="form-control" id="batch_single_price" name="batch_single_price" value="@if(isset($batchDetails)){{$batchDetails->batch_single_price}}@else{{Input::old('batch_single_price')}}@endif"/>
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
            <div class="col-lg-12 img-responsive schedule">
            </div>
        </div>
        <div id="scheduleContainer">
        @if(isset($batchDetails))
            @foreach ($batchDetails->schedule as $j => $scheduleData)
            <div class="row row_padding">
                <h4>Schedule {{$j+1}}</h4>
                <div class="form-group" id="scheduleStrat">
                    @if(isset($batchDetails))
                        <input type="hidden" name="schedule[{{$j}}][id]" value="{{$scheduleData['id']}}">
                    @endif        
                    <label class="col-sm-3 col-md-3 control-label label1" for="schedule_session_month">Sessions/Months
                        <span class="important_required">*</span>
                    </label>
                    <div class="col-sm-3 col-md-3 form-group">
                        <select class="form-control" id="schedule_session_month" name="schedule[{{$j}}][schedule_session_month]" required="required">
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
                    
                    <label class="col-sm-3 col-md-3 control-label label1" for="schedule_number">No Of Sessions/Months
                        <span class="important_required">*</span>
                    </label>
                    <div class="col-sm-3 col-md-3">
                        <input type="text" class="form-control" id="schedule_number" name="schedule[{{$j}}][schedule_number]" value="@if(isset($batchDetails)){{$scheduleData['schedule_number']}}@else{{Input::old('schedule[$j][schedule_number]')}}@endif" required="required" />
                    </div>
                    <label for="schedule_price" class="col-md-1 control-label label1">Price<span class="important_required">*</span></label>
                    <div class="col-sm-2 col-md-2">
                        <input type="text" class="form-control" id="schedule_price" name="schedule[{{$j}}][schedule_price]" value="@if(isset($batchDetails)){{$scheduleData['schedule_price']}}@else{{Input::old('schedule[$j][schedule_price]')}}@endif" required="required" />
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
            <div class="row row_padding" id="multiScheduleForm{{$j}}">
                <h4>Schedule {{$j+1}}</h4>
                <div id="scheduleStrat">  
                    @if(isset($batchDetails))
                        <input type="hidden" name="schedule[{{$j}}][id]" value="{{$scheduleData['id']}}">
                    @endif        
                    <label class="col-sm-3 col-md-2 control-label label1" for="schedule_session_month">Sessions/Months
                        <span class="important_required">*</span>
                    </label>
                    <div class=" col-sm-3 col-md-2">
                        <select class="form-control" id="schedule_session_month{{$j}}" name="schedule[{{$j}}][schedule_session_month]" required>
                            @if(isset($schedule_session_month))
                            @foreach ($schedule_session_month as $key => $data)
                                <option value={{$key}}
                                    @if(isset($batchDetails))
                                        {{($scheduleData['schedule_session_month']==$key)?
                                        'selected="selected"':''}}
                                    @else
                                        {{((Input::old("schedule"))==$key)?
                                        'selected="selected"':''}}
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
                    <div class="col-sm-3 col-md-2 form-group" id="schedule_number_container{{$j}}">
                        <input type="text" class="form-control" id="schedule_number{{$j}}" onkeyup="validateScheduleFields({{$j}},'schedule_number')" name="schedule[{{$j}}][schedule_number]" value="@if(isset($batchDetails)){{$scheduleData['schedule_number']}}@else{{Input::old('schedule[$j][schedule_number]')}}@endif" />
                    </div>
                    <label for="schedule_price" class="col-md-1 control-label label1">Price<span class="important_required">*</span></label>
                    <div class="col-sm-2 col-md-2 form-group" id="schedule_price_container{{$j}}">
                        <input type="text" class="form-control" id="schedule_price{{$j}}" onkeyup="validateScheduleFields({{$j}},'schedule_price')"name="schedule[{{$j}}][schedule_price]" value="@if(isset($batchDetails)){{$scheduleData['schedule_price']}}@else{{Input::old('schedule[$j][schedule_price]')}}@endif" />
                    </div>
                </div>
            </div>
             <div class="row row_padding">
                <div class="form-group ">
                    <label  class="col-sm-3 control-label label1">
                        Batch have Classes on<span class="important_required">*</span>
                    </label>
                    <div class="col-sm-6">
                        <ul class="ul-without-bullets" id="schedule_batch_weekdays_container{{$j}}">
                            @foreach($weekdays as $data)
                                <li>
                                    <label>
                                    <input type="checkbox" id="schedule_batch_weekdays{{$j}}" name="schedule[{{$j}}][schedule_class][]" value="{{$data}}"
                                    @if(isset($batchDetails))
                                        @if(in_array($data, $scheduleData['schedule_class']))
                                            {{'checked="checked"'}}
                                        @endif
                                    @else
                                        @if(in_array($data, array('test')))
                                            {{'checked="checked"'}}
                                        @endif
                                    @endif  onClick="removeErrorMessage('#schedule_batch_weekdays_validation_message{{$j}}')"/>
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
        <div class="btn_save_div" style="margin-top:20px;">
            <button type="submit" id="createBatchButton" class="btn btn-success btn-lg"> @if(isset($batchDetails)) <i class="fa fa-save"></i>  Save @else <i class="fa fa-plus"></i>  Create @endif</button>
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
    var allSubcategories = <?php echo json_encode($all_subcategories) ?>;
    var scheduleSessions = ["Session", "Month"];
    var weekDays = ["monday", "tuesday", "wednesday","thursday","friday","saturday","sunday"];
    var scheduleCount = 1;
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
        //alert(scheduleCount);
        var linksContainer = $('#scheduleContainer'),baseUrl;
        
        //        "<span id='' onclick='removeSchedule("+scheduleCount+")'>X</span></h4>");
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
                    .append
                    (
                        $("<label></label>")
                        .attr("class","col-sm-2 control-label label1 ")
                        .attr("for","schedule_session_month")
                        .text("Sessions/Months")
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
                        .attr("class","col-sm-2 form-group")
                        .append
                        ( 
                            $("<select required></select>")  
                            .attr("class","form-control")
                            .attr("id","schedule_session_month"+scheduleCount)
                            .attr("name","schedule["+scheduleCount+"][schedule_session_month]")
                        )
                    )
                    .append
                    (
                        $("<label></label>")
                        .attr("class","col-sm-3 control-label label1")
                        .attr("for","schedule_number")
                        .text("No Of Sessions/Months")
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
                        .attr("class","col-md-2 form-group")
                        .attr("id","schedule_number_container"+scheduleCount)
                        .append
                        ( 
                            $("<input required />") 
                            .attr("type","text")
                            .attr("onkeyup","validateScheduleFields("+scheduleCount+",'schedule_number')")
                            .attr("class","form-control")
                            .attr("id","schedule_number"+scheduleCount)
                            .attr("name","schedule["+scheduleCount+"][schedule_number]")
                        )
                    ) 
                    .append
                    (
                        $("<label></label>")
                        .attr("for","schedule_price")
                        .attr("class","col-sm-1 control-label label1")
                        .text("Price")
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
                        .attr("class","col-sm-3 col-md-2 form-group")
                        .attr("id","schedule_price_container"+scheduleCount)
                        .append
                        ( 
                            $("<input required />")  
                            .attr("type","text")
                            .attr("onkeyup","validateScheduleFields("+scheduleCount+",'schedule_price')")
                            .attr("class","form-control")
                            .attr("id","schedule_price"+scheduleCount)
                            .attr("name","schedule["+scheduleCount+"][schedule_price]")                       
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
                    .attr("class","col-sm-3 control-label label1")
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
                    .attr("class","col-sm-6")
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
        var batchCount = $("#subcategory_list li").length ;
        $("input:radio[name=batch_trial]").click(function() {
            var value = $(this).val();
            if(value==3)
            {
                $("#PriceForSingleClass").show();
                $("#batch_single_price").attr("required","true");
            }
            else
            {
                $("#PriceForSingleClass").hide();
                $("#batch_single_price").attr("required","false");
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

                batch_single_price: {
                    message: 'The Price is not valid',
                    validators: {
                        notEmpty: {
                            message: 'The description is required and cannot be empty'
                        },
                        regexp: {
                            regexp: /^[0-9]/,
                            message: 'The  Price can only consist of numbers.'
                        }
                    }
                }, 
                batch_category_id: {
                    message: 'Please select Category',
                    validators:{
                        required: true
                    }
                },
                batch_subcategory_id: {
                    message: 'Please select Sub Category',
                    validators:{
                        required: true
                    }
                },
                schedule_number:{
                    message: 'Please enter No of Sessions/Months',
                    validators:{
                        required: true
                    }
                },
                batch_accomplishment: {
                    message: 'The text is not valid',
                    validators: {
                        /*notEmpty: {
                            message: 'The description is required and cannot be empty'
                        },*/
                        stringLength: {
                            min: 6,

                            message: 'The description must be more than 6  characters long'
                        },
                        regexp: {
                            regexp: /^[a-zA-Z0-9 _-]+$/,
                            message: 'The description can only consist of alphabetical, numbers,dash and underscore'
                        }
                    }
                },/*
                batch_difficulty_level: {
                    message: 'Please select difficulty level',
                    validators:{
                        required: true
                    }
                },
                batch_age_group: {
                    message: 'Please select age group',
                    validators:{
                        required: true
                    }
                },
                batch_gender_group: {
                    message: 'Please select gender group',
                    validators:{
                        required: true
                    }
                },*/
            }
        });
    });
    function validate()
    {
        var Result = true;
        var Focus = false;
        var targetAudienceFiledsValues = new Array();
        var scheduleFiledsValues = new Array();
        var targetAudienceErrorMessage = ["Please select difficulty level.","Please select age group.","Please select gender group."];
        var targetAudienceContainer = ["batchDifficultyLevel","batchAgeGroup","batchGenderGroup"];
        var scheduleContainers = ["schedule_number","schedule_price","schedule_batch_weekdays"];
        var batchTrailAvailable = $('#batch_trial:checked').val();
        targetAudienceFiledsValues[0] = $('.batchDifficultyLevel:checked').val();
        targetAudienceFiledsValues[1] = $('.batchAgeGroup:checked').val();
        targetAudienceFiledsValues[2] = $('.batchGenderGroup:checked').val();
        var scheduleErrorMessage = ["Please fill this required field.","Please fill this required field.","Plase select week days"];
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
                    var height = $('#'+targetContainer).position().top + 700;
                    $('html, body').stop().animate({
                        scrollTop : height
                    }, 1000, 'easeInOutExpo');
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
            .text("Plase select trial available option")
            .appendTo(batchTrailAvailableContainer);
            Result = false;
            if(!Focus)
            {
                var height = batchTrailAvailableContainer.position().top + 1200;
                $('html, body').stop().animate({
                    scrollTop : height
                }, 1000, 'easeInOutExpo');
                Focus = true;
            }
        }
        for(var i=0;i<scheduleCount;i++)
        {
            scheduleFiledsValues[0] = $('#schedule_number'+i).val();
            scheduleFiledsValues[1] = $('#schedule_number'+i).val();
            scheduleFiledsValues[2] = $('#schedule_batch_weekdays'+i+':checked').val()
            var scheduleNumber = $('#schedule_number'+i).val();
            var schedulePrice = $('#schedule_number'+i).val();
            var scheduleNumberMessage = $('#schedule_number_container'+i),baseUrl;
            var schedulePriceMessage = $('#schedule_price_container'+i),baseUrl;
            for(var filedsIndex=0;filedsIndex<3;filedsIndex++)
            {
                var scheduleFiledsValue = scheduleFiledsValues[filedsIndex];
                var scheduleMessageContainer = $('#'+scheduleContainers[filedsIndex]+'_container'+i),baseUrl;
                var scheduleErrorMessageContainer = scheduleContainers[filedsIndex]+'_validation_message'+i;
                if(scheduleFiledsValue=="" || scheduleFiledsValue==undefined)
                {
                    $('#'+scheduleErrorMessageContainer).remove();
                    $('<span></span>')
                    .attr("id",scheduleErrorMessageContainer)
                    .attr("class","batchCreateFormError")
                    .text(scheduleErrorMessage[filedsIndex])
                    .appendTo(scheduleMessageContainer);
                    Result = false;
                }
                if(!Focus)
                {
                    var height = scheduleMessageContainer.position().top + 700;
                    $('html, body').stop().animate({
                        scrollTop : height
                    }, 1000, 'easeInOutExpo');
                    Focus = true;
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
        var valid = "glyphicon glyphicon-ok";
        
        var invalid = "glyphicon glyphicon-remove";
        if(isNaN(inputValue) || inputValue<1)
        {    
            $('#'+divName+"_validation_message"+divid).remove();
            $('#'+divName+'_container'+divid+' .glyphicon-ok').remove();
            $('<span></span>')
            .attr("id",divName+"_validation_message"+divid)
            .attr("class","batchCreateFormError")
            .text("Should be a number and grater than 0")
            .appendTo(divisionContainer);
            $('<span></span>')
            .attr("class",invalid+" right-addon")
            .appendTo(divisionContainer);
        }
        else
        {
            $('#'+divName+"_validation_message"+divid).remove();
            $('#'+divName+'_container'+divid+' .glyphicon-remove').remove();
            $('<span></span>')
            .attr("class",valid+" right-addon")
            .appendTo(divisionContainer);
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