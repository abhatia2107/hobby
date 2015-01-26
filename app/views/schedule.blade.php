@extends('Layouts.layout')
@section('content')
<div class="home_vendor_page" id="createBactch" style="background: white;">
    <div class="container-fluid">
    <div id="classInfo1">
    <form role="form" class="form-horizontal" action="@if(isset($batchDetails))/schedules/update/{{$batchDetails->id}}@else{{"/schedules"}}@endif" method="post" enctype="multipart/form-data" id="classInfo">
          
        <div class="row row_padding">
            <p  class="create_class">Create your Class
            </p>
            <div class="col-lg-12 img-responsive class_desc">
            </div>
        </div>
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
                                        {{Input::old("schedule[$j]['schedule_session_month']")}}
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
                    <input type="text" class="form-control" id="schedule_number" name="schedule[{{$j}}][schedule_number]" value=@if(isset($batchDetails)){{$scheduleData['schedule_number']}}@else{{Input::old("schedule[0]['schedule_number']")}}@endif>
                </div>
            </div>
        </div>
        <div class="row row_padding">
            <div class="form-group">
                <label class="col-sm-3 col-md-3 control-label input1" for="schedule_price">Price<span class="important_required">*</span></label>
                <div class="col-sm-3 col-md-3">
                    <input type="text" class="form-control" id="schedule_price" name="schedule[{{$j}}][schedule_price]" value=@if(isset($batchDetails)){{$scheduleData['schedule_price']}}@else{{Input::old("schedule[$j]['schedule_price']")}}@endif>
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
                                    {{Input::old("schedule[$j]['schedule_class'][]")}}
                                @endif
                                {{ucfirst($data)}}
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
        @endfor
        <div class="btn_save_div" >
            <button type="submit" class="btn btn-success btn-lg"> @if(isset($batchDetails)) <i class="fa fa-save"></i>  Save @else <i class="fa fa-plus"></i>  Create @endif</button>
            <button type="reset" class="btn btn-warning btn-lg"><i class="fa fa-power-off"></i> Reset</button>
        </div>
    </form>
    </div>
    </div>
    </div>
@stop