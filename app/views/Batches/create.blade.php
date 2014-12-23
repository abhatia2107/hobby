<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>Add a batch</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/assets/formoid1/formoid-metro-cyan.css" type="text/css" />
</head>
<body class="blurBg-false" style="background-color:#ffffff">



<!-- Start Formoid form-->
<form enctype="multipart/form-data" class="formoid-metro-cyan form_create" action="/batches/store" method="post">
<div class="title"><h2>Add a batch</h2></div>
    <div class="element-input" title="Name of Batch"><label class="title">Name of Batch<span class="required">*</span></label><input class="large" type="text" name="batch" required="required"/></div>
    <div class="element-select" title="Category">
        <label class="title">Category<span class="required">*</span></label>
            <div class="large">
            <span>
                <select name="batch_category" required="required">
                    <option value="Cooking">Cooking</option>
                    <option value="Dance">Dance</option>
                </select><i></i>
            </span>
        </div>
    </div>
    <div class="element-select" title="SubCategory">
        <label class="title">SubCategory<span class="required">*</span></label>
        <div class="large">
            <span>
                <select name="batch_subcategory" required="required">
                    <option value="option 1">option 1</option>
                    <option value="option 2">option 2</option>
                    <option value="option 3">option 3</option>
                </select><i></i>
            </span>
        </div>
    </div>
    <div class="element-select" title="SubCategory">
        <label class="title">Keyword<span class="required">*</span></label>
        <div class="large">
            <span>
                <select name="batch_keyword" required="required">
                    <option value="option 1">option 1</option>
                    <option value="option 2">option 2</option>
                    <option value="option 3">option 3</option>
                </select><i></i>
            </span>
        </div>
    </div>
    <div class="element-date" title="Start Date"><label class="title">Start Date<span class="required">*</span></label><input class="large" data-format="yyyy-mm-dd" type="date" name="batch_start_date" required="required" placeholder="yyyy-mm-dd"/></div>
    <div class="element-date" title="End Date"><label class="title">End Date<span class="required">*</span></label><input class="large" data-format="yyyy-mm-dd" type="date" name="batch_end_date" required="required" placeholder="yyyy-mm-dd"/></div>
<!--     <div class="form-group has-feedback">
        <div class="input-group date" id="datetimepicker4">
            <input data-bv-field="time1" class="form-control" name="batch_start_time" id="batch_start_time" type="text">
        <span class="input-group-addon"><span class="glyphicon glyphicon-time"></span>
        </span>
        </div><i data-bv-icon-for="time1" class="form-control-feedback bv-no-label bv-icon-input-group" style="display: none;"></i>
    <small data-bv-result="NOT_VALIDATED" data-bv-for="time1" data-bv-validator="notEmpty" class="help-block" style="display: none;">The timings are  required and cannot be empty</small></div>
    <div class="form-group has-feedback">
        <div class="input-group date" id="datetimepicker5">
            <input data-bv-field="time1" class="form-control" name="batch_end_time" id="batch_end_time" type="text">
        <span class="input-group-addon"><span class="glyphicon glyphicon-time"></span>
        </span>
        </div><i data-bv-icon-for="time1" class="form-control-feedback bv-no-label bv-icon-input-group" style="display: none;"></i>
    <small data-bv-result="NOT_VALIDATED" data-bv-for="time1" data-bv-validator="notEmpty" class="help-block" style="display: none;">The timings are  required and cannot be empty</small></div>
  -->   <div class="element-select" title="Venue"><label class="title">Venue<span class="required">*</span></label><div class="large"><span><select name="batch_venue_id" required="required">

        <option value="option 1">option 1</option>
        <option value="option 2">option 2</option>
        <option value="option 3">option 3</option></select><i></i></span></div></div>
    <div class="element-textarea" title="Accomplishment from the batch"><label class="title">Accomplishment from the batch<span class="required">*</span></label><textarea class="medium" name="batch_accomplishment" cols="20" rows="5" required="required"></textarea></div>
    <div class="element-file" title="Upload Photo of the batch"><label class="title">Upload Photo of the batch</label><label class="large" ><div class="button">Choose Photo</div><input type="file" class="file_input" name="batch_photo" /><div class="file_text">No file selected</div></label></div>
    <div class="element-select" title="Difficulty Level"><label class="title">Difficulty Level</label><div class="large"><span><select name="batch_difficulty_level" >

        <option value="0">All</option>
        <option value="1">Beginner</option>
        <option value="2">Intermediate</option>
        <option value="3">Advanced</option></select><i></i></span></div></div>
    <div class="element-select" title="Age Group"><label class="title">Age Group</label><div class="large"><span><select name="batch_age_group" >

        <option value="0">All</option>
        <option value="1">Children</option>
        <option value="2">Adults</option></select><i></i></span></div></div>
    <div class="element-select" title="Gender"><label class="title">Gender</label><div class="large"><span><select name="batch_gender_group" >

        <option value="0">Both</option>
        <option value="1">Male</option>
        <option value="2">Female</option></select><i></i></span></div></div>
    <div class="element-input" title="Price"><label class="title">Price</label><input class="large" type="text" name="batch_price" /></div>
    <div class="element-number" title="Number of sessions in week"><label class="title">Number of sessions in week<span class="required">*</span></label><input class="large" type="text" min="0" max="7" name="batch_no_of_classes_in_week" required="required" value=""/></div>
    <div class="element-checkbox" title="Batch Schedule">
    <label class="title" required="required">Batch have Classes on<span class="required">*</span></label>      
        <div class="column column1">
        <label><input type="checkbox" name="batch_class_on_monday" value="1"/><span>Monday</span></label>
        <label><input type="checkbox" name="batch_class_on_tuesday" value="1"/><span>Tuesday</span></label>
        <label><input type="checkbox" name="batch_class_on_wednesday" value="1"/><span>Wednesday</span></label>
        <label><input type="checkbox" name="batch_class_on_thursday" value="1"/><span>Thursday</span></label>
        <label><input type="checkbox" name="batch_class_on_friday" value="1"/><span>Friday</span></label>
        <label><input type="checkbox" name="batch_class_on_saturday" value="1"/><span>Saturday</span></label>
        <label><input type="checkbox" name="batch_class_on_sunday" value="1"/><span>Sunday</span></label>
        </div>
    <span class="clearfix"></span>
    </div>
    <div class="element-radio"><label class="title">Batch Recurring<span class="required">*</span></label>
        <div class="column column1">
        <label><input type="radio" name="batch_recurring" value="0" required="required"/><span>Not recurring</span></label>
        <label><input type="radio" name="batch_recurring" value="1" required="required"/><span>Weekly</span></label>
        <label><input type="radio" name="batch_recurring" value="2" required="required"/><span>Monthly</span></label>
        <label><input type="radio" name="batch_recurring" value="3" required="required"/><span>Yearly</span></label>
        </div>
        <span class="clearfix"></span>
    </div>
    <div class="element-radio" title="Trial available">
    <label class="title">Trial available<span class="required">*</span></label>
    <div class="column column1">
    <label>
    <input type="radio" name="batch_trial" value="0" required="required"/>
    <span>Not available</span>
    </label>
    <label>
    <input type="radio" name="batch_trial" value="1" required="required"/>
    <span>Free Trial any time walk-in</span>
    </label>
    <label>
    <input type="radio" name="batch_trial" value="2" required="required"/>
    <span>Paid Trial any time walk-in</span>
    </label>
    <label>
    <input type="radio" name="batch_trial" value="3" required="required"/>
    <span>Free Trial only in beginning of batch</span>
    </label>
    <label>
    <input type="radio" name="batch_trial" value="4" required="required"/>
    <span>Paid Trial only in beginning of batch</span>
    </label>
    </div>
    <span class="clearfix"></span>
    </div>
    <div class="element-textarea" title="Special Comments"><label class="title">Special Comments about the batch (Prerequisite required, anything else you wish to share)</label><textarea class="medium" name="batch_comment" cols="20" rows="5" ></textarea></div>
    <div class="element-input" title="Tagline"><label class="title">Tagline of the batch</label><input class="large" type="text" name="batch_tagline" /></div>
<div class="submit"><input type="submit" value="Submit"/></div></form>
<script type="text/javascript" src="http://code.jquery.com/jquery-1.11.2.min.js"></script>
<script type="text/javascript" src="/assets/formoid1/formoid-metro-cyan.js"></script>
<!-- Stop Formoid form-->

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
                </script>

</body>
</html>
