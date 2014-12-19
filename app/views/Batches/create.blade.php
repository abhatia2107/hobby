<html lang="en">
<head>
    
</head>
<body>
    <form role="form"action="@if(isset($batchDetails)){{"batches/$batchDetails->batch_id"}}@else{{"/batches/store"}}@endif" method="@if(isset($batchDetails)){{"put"}}@else{{"post"}}@endif" enctype="multipart/form-data">
            <div class="row">
                <p style="font-size: 20px;
                    font-weight: 600;">Create your Class
                </p>
            <div class="col-lg-12" style="background: url('../../../public/assets/images/classdesc.PNG');height:41px ">
            </div>
            <div class="row">
                <div class="form-group">
                    <label for="title" class="col-sm-3 control-label label1">Title&nbsp;<span style="color:red">*</span></label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control input1" name="title" placeholder="Title" id="title">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="form-group">
                    <label for="pitch" class="col-sm-3 control-label label1">Tagline&nbsp;<span style="color:red">*</span></label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control input1" name="batch_tagline" placeholder="One Time Pitch" id="pitch">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="form-group">
                    <label for="categ" class="col-sm-3 control-label label1">Category&nbsp;<span style="color:red">*</span></label>
                    <div class="col-sm-2">
                        <select  class="form-control input1" name="category"  id="categ">
                            <option selected>Dance</option>
                            <option>Cooking</option>
                            <option>Other</option>
                            <option>Art & Craft</option>
                        </select>
                    </div>
                    <label for="subcateg" class="col-sm-3 control-label label1">Sub Category&nbsp;<span style="color:red">*</span></label>
                    <div class="col-sm-2">
                        <select  class="form-control input1" name="subcategory"  id="subcateg">
                            <option >Salsa</option>
                            <option>Tango</option>
                            <option>Zumba</option>
                            <option>Other</option>
                        </select>
                    </div>
                </div>

            </div>
            <div class="row ">
                <div class="form-group">
                        <label class="col-sm-3 control-label label1">Photo Gallery</label>
                        <div class="col-sm-6">&nbsp;&nbsp;&nbsp;&nbsp;
                            <span class="btn btn-default btn-file" style="font-size:20px;background-color:#3A8AF1;color:white;">
                                Add Photos <input type="file">
                            </span>&nbsp;&nbsp;
                            <span style="position: absolute">
                                <div>
                            <span style="font-size:10px">1.Based on requirements</span><br>
                            <span style="font-size: 10px">2.Based on requirements</span>
                    </div></span>

                </div>
                </div>

            </div><br>
            <div class="row">
                <div class="form-group">
                    <label for="keywords" class="col-sm-3 control-label label1">Search Keywords&nbsp;<span style="color:red">*</span></label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control input1" name="keyword" placeholder="Search Keywords" id="keywords">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="form-group">
                    <br><label for="batch_accomplishment" class="col-sm-3 control-label label1">Accomplishment&nbsp;<span style="color:red">*</span></label>
                    <div class="col-sm-8">
                        <textarea class="jqte-test"name="batch_accomplishment"  id="batch_accomplishment"></textarea>
                    </div>
                </div>
            </div><br><br><br>
            <div class="row">
                <div class="col-lg-12" style="background: url('../../../public/assets/images/targetaud.PNG');height:41px ">
                </div>
            </div><br><br>
            <div class="row">
                <div class="form-group">
                    <label for="batch_difficulty_level" class="col-sm-3 control-label label1">Difficulty Level&nbsp;<span style="color:red">*</span></label>
                    <div class="col-sm-8">
                        <div class="radio" name="batch_difficulty_level" id="batch_difficulty_level">
                            <label><input type="radio" name="batch_difficulty_level" value="1" checked >Not Specified</label>
                        </div>
                        <div class="radio">
                            <label><input type="radio" name="batch_difficulty_level" value="2">Beginner</label>
                        </div>
                        <div class="radio ">
                            <label><input type="radio" name="batch_difficulty_level" value="3" >Intermediate</label>
                        </div>
                        <div class="radio ">
                            <label><input type="radio" name="batch_difficulty_level" value="4" >Advanced</label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="form-group">
                    <label for="batch_age_group" class="col-sm-3 control-label label1">Target Age Group&nbsp;<span style="color:red">*</span></label>
                    <div class="col-sm-8">
                        <div class="radio" name="batch_age_group" id="batch_age_group">
                            <label><input type="radio" name="batch_age_group" value="0" checked >All</label>
                        </div>
                        <div class="radio">
                            <label><input type="radio" name="batch_age_group" value="1">Kids</label>
                        </div>
                        <div class="radio">
                            <label><input type="radio" name="batch_age_group" value="2" >Adults</label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="form-group">
                    <label for="batch_gender_group" class="col-sm-3 control-label label1">Target Gender Group&nbsp;<span style="color:red">*</span></label>
                    <div class="col-sm-8">
                        <div class="radio" name="batch_gender_group" id="batch_gender_group">
                            <label><input type="radio" name="batch_gender_group" value="0" checked >All</label>
                        </div>
                        <div class="radio">
                            <label><input type="radio" name="batch_gender_group" value="1">Male</label>
                        </div>
                        <div class="radio ">
                            <label><input type="radio" name="batch_gender_group" value="2" >Female</label>
                        </div>
                    </div>
                </div>
            </div>
            <br><br><br>
            <div class="row">

                <div class="col-lg-12" style="background: url('../../../public/assets/images/schedule.PNG');height:41px ">
                </div>
            </div><br><br>
            <div class="row">
                <div class="col-sm-3">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <span class="label1">Timings</span>
                </div>
                <div class="col-sm-1">From
                </div>
                <div class="col-sm-2">
                    <div class="form-group">
                        <div class='input-group date' id='datetimepicker4'>
                            <input type='text' class="form-control" name="batch_start_time" id="time1"/>
                        <span class="input-group-addon"><span class="glyphicon glyphicon-time"></span>
                        </span>
                        </div>
                    </div>
                </div>
                <div class="col-sm-1">
                    To
                </div>
                <div class="col-sm-2">
                    <div class="form-group">
                        <div class='input-group date' id='datetimepicker5'>
                            <input type='text' class="form-control" name="batch_end_time" id="time2">
                            <span class="input-group-addon">
                                <span class="glyphicon glyphicon-time"></span>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-3">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <span class="label1">Date</span>
                </div>
                <div class="col-sm-1">
                    From
                </div>
                <div class="col-sm-2">
                    <div class="form-group">
                        <div class='input-group date' id='datetimepicker6'>
                            <input type='text' class="form-control" name="batch_start_date" id="date1"data-date-format="YYYY/MM/DD">
                            <span class="input-group-addon">
                                <span class="glyphicon glyphicon-calendar"></span>
                            </span>
                        </div>
                    </div>
                </div>
                <div class="col-sm-1">
                    To
                </div>
                <div class="col-sm-2">
                    <div class="form-group">
                        <div class='input-group date' id='datetimepicker7'>
                            <input type='text' class="form-control" name="batch_end_date" id="date2"data-date-format="YYYY/MM/DD"/>
                            <span class="input-group-addon">
                                <span class="glyphicon glyphicon-calendar"></span>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
            <script type="text/javascript">
                $(function () {
                    $('#datetimepicker4').datetimepicker({
                        pickDate: false
                    });
                });
                $(function () {
                    $('#datetimepicker5').datetimepicker({
                        pickDate: false
                    });
                });
                $(function () {
                    $('#datetimepicker6').datetimepicker({
                        pickTime: false
                    });
                });
                $(function () {
                    $('#datetimepicker7').datetimepicker({
                        pickTime: false
                    });
                });
            </script>
            <div class="row">
                <div class="form-group">
                    <label for="venue" class="col-sm-3 control-label label1">Venue&nbsp;<span style="color:red">*</span></label>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <div class="col-sm-6">
                        <select  class="form-control input1" name="venue"  id="venue">
                            <option >Option1</option>
                            <option>Option2</option>
                            <option>Option3</option>
                            <option>Option4</option>
                        </select>
                    </div>
                    <div class="col-sm-3">
                        <a data-target="#myModal2" data-toggle="modal">Add a venue</a>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="form-group col-sm-5">
                    <label class="col-sm-8 label1" for="sessions">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;No Of Sessions&nbsp;&nbsp;
                        <span style="color: red">*</span>
                    </label>
                <div class="col-sm-4">
                    <input type="text" id="sessions" name="sessions" class="form-control input1">
                </div>
                </div>
                <div class="col-sm-2 input1">Repeat</div>
                <div class="col-sm-4"><select class="form-control" id="session1"><option>No</option><option value="1">Weekly</option></select></div>


            </div>
            <div class="row">
                <div class="form-group">
                    <br><label for="textarea2" class="col-sm-3 control-label label1">Days/Comments&nbsp;<span style="color:red">*</span></label>
                    <div class="col-sm-8">
                        <textarea name="textarea2" class="jqte-test" id="textarea2"></textarea>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-2" >
                    <button type="button" style="float:right;font-size:19px;color:white;background-color:cornflowerblue" class="form-control btn  btn-default">
                        + &nbsp;Schedule
                    </button>
                </div>
            </div><br><br>
            <div  style="width: 53%">
                <button type="submit" style="float: right;font-size: 30px;color: white;background-color: cornflowerblue;width: 30%" class="form-control btn  btn-default">
                    Submit
                </button>
            </div>
        </form>
</body>
</html>