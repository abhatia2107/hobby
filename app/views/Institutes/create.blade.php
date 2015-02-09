@extends('Layouts.layout')
@section('pagestylesheet')
    <link rel="stylesheet" type="text/css" href="/assets/css/jquery.richtextarea.css" />
    <link rel="stylesheet" type="text/css" href="/assets/css/jquery-te-1.4.0.css">

    <style>
    .update_required
    {
        color: white;font-size: 18px;border-radius: 4px;
            background-color: #2274ef;
    }
    .important_required
         {
            color:red;
         }
        .label_size
        {
            font-size: 20px;
            font-weight: 500;
        }
        .c1
        {
            /*width:300px;*/
            height: 90px;
        }
        .btn-file {
            position: relative;
            overflow: hidden;
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
        .add_photo
        {
            font-size:20px;background-color:#3A8AF1;color:white;
        }
        @media(min-width:992px){
        #instituteInfo
        {
            margin-left: auto;margin-right: auto;width:50%;
        }}
    </style>

@stop


@section('content')
        @if(isset($instituteDetails))
            @include('Templates.navbarVendor')
        @endif
<div class="container">
    <div class="container-fluid">
        <form role="form"  id="instituteInfo" enctype="multipart/form-data"  action="@if(isset($instituteDetails)){{"/institutes/update/$instituteDetails->id"}}@else{{"/institutes/store"}}@endif" method="post">
            <div class="row">
                <div class="title">
                    <h2><span>
                    @if(isset($instituteDetails)) 
                        <i class="glyphicon glyphicon-pencil"></i> Edit Your Institute 
                    @else
                        <i class="glyphicon glyphicon-plus"></i> Add Your Institute 
                    @endif 
                    </span></h2>
                    <span class="important_required">*</span>
                    <label>Required Fields</label>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-12 col-md-12 col-xs-12">
                    <div class=" form-group">
                        <label  class="label_size" for="username">Institute Name 
                        <span class="important_required">*</span></label>
                        <input type="text" class="form-control" name="institute" id="institute" value="@if(isset($instituteDetails)){{$instituteDetails->institute}}@else{{Input::old('institute')}}@endif">
                    </div>
                </div>
            </div>
            
            <div class="row">
                <div class="col-sm-12 col-xs-12 col-md-12">
                    <div class="form-group">
                        <label class="label_size title" for="institute_description" >Tell us about your institute <span class="important_required">*</span></label>
                        <textarea name="institute_description" id="institute_description"  class="form-control .jqte-test" rows="5" required="required">
                            @if(isset($instituteDetails)){{$instituteDetails->institute_description}}@else{{Input::old('institute_description')}}@endif
                        </textarea>
                    </div>
                </div>
            </div>

            <div class="row ">
                <div class="col-sm-6 col-xs-12">
                    <div class="c1">
                        <p>Photo Gallery</p>
                        <span class="btn btn-default btn-file add_photo" >Add Photos 
                            <input type="file">
                        </span>
                        <span style="position: absolute">
                            <div>
                                <span style="font-size:10px">1.Based on requirements</span>
                            </div>
                        </span>
                    </div>
                </div>
                    <div class="col-sm-6 col-xs-12">
                        <div class="c1 form-group">
                            <label class="label_size" for="url">Website</label>
                            <input class="form-control" placeholder="http://" id="institute_website" name="institute_website" value="@if(isset($instituteDetails)){{$instituteDetails->institute_website}}@else{{Input::old('institute_website')}}@endif"/>
                        </div>
                    </div>
            </div>
            
            <div class="row">
                <div class="col-sm-6 col-xs-12">
                    <div class="c1 form-group">
                        <label  class="label_size" for="facebook">Facebook Page</label>
                        <input class="form-control " placeholder="http://" name="institute_fblink" value="@if(isset($instituteDetails)){{$instituteDetails->institute_fblink}}@else{{Input::old('institute_fblink')}}@endif" id="institute_fblink">
                    </div>
                </div>
                <div class="col-sm-6 col-xs-12">
                    <div class="c1 form-group" >
                        <label class="label_size" for="twitter">Twitter Profile</label>
                        <input class="form-control" placeholder="http://" name="institute_twitter" value="@if(isset($instituteDetails)){{$instituteDetails->institute_twitter}}@else{{Input::old('institute_twitter')}}@endif" id="institute_twitter">
                    </div>
                </div>
            </div>
            <div class="btn_save_div" >
                <button type="submit" class="btn btn-success btn-lg">@if(isset($instituteDetails)) <i class="fa fa-save"></i>  Update @else <i class="fa fa-plus"></i>  Create @endif</button>
                <button type="reset" class="btn btn-warning btn-lg"><i class="fa fa-power-off"></i> Reset</button>
            </div>  
        </form>
    </div>
</div>
@stop

@section('pagejavascript')
<script type="text/javascript"  src="/assets/js/jquery.richtextarea.min.js"></script>
<script type="text/javascript" src="/assets/js/jquery-te-1.4.0.min.js" charset="utf-8"></script>

@stop
@section('pagejquery')
    
    <script type="text/javascript" >
        $(document).ready(function(){
            $('#instituteInfo').bootstrapValidator({
                message: 'This value is not valid',
                feedbackIcons: {
                    valid: 'glyphicon glyphicon-ok',
                    invalid: 'glyphicon glyphicon-remove',
                    validating: 'glyphicon glyphicon-refresh'
                },
                fields: {
                    institute: {
                        message: 'The Institute name is not valid',
                        validators: {
                            notEmpty: {
                                message: 'The Institute name is required and cannot be empty'
                            },
                            stringLength: {
                                min: 6,
                                max: 30,
                                message: 'The Institute name must be more than 6 and less than 30 characters long'
                            },
                        }
                    },
                }
            });

        });
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