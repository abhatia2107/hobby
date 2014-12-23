<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>Add a batch</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body class="blurBg-false" style="background-color:#ffffff">



<!-- Start Formoid form-->
<link rel="stylesheet" href="batch_files/formoid1/formoid-metro-cyan.css" type="text/css" />
<link rel="stylesheet"  href="http://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/3.1.3/css/bootstrap-datetimepicker.min.css">
<script type="text/javascript" src="batch_files/formoid1/jquery.min.js"></script>
<script src="http://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/3.1.3/js/bootstrap-datetimepicker.min.js"></script>
<form enctype="multipart/form-data" class="formoid-metro-cyan" style="background-color:#ffffff;font-size:14px;font-family:'Open Sans','Helvetica Neue','Helvetica',Arial,Verdana,sans-serif;color:#666666;max-width:480px;min-width:150px" action="/batches/store" method="post"><div class="title"><h2>Add a batch</h2></div>
    <div class="element-input" title="Name of Batch"><label class="title">Name of Batch<span class="required">*</span></label><input class="large" type="text" name="batch" required="required"/></div>
    <div class="element-select" title="Category"><label class="title">Category<span class="required">*</span></label><div class="large"><span><select name="batch_category" required="required">

        <option value="Cooking">Cooking</option>
        <option value="Dance">Dance</option></select><i></i></span></div></div>
    <div class="element-select" title="SubCategory"><label class="title">SubCategory<span class="required">*</span></label><div class="large"><span><select name="batch_subcategory" required="required">

        <option value="option 1">option 1</option>
        <option value="option 2">option 2</option>
        <option value="option 3">option 3</option></select><i></i></span></div></div>
    <div class="element-input" title="Keyword"><label class="title">Keyword</label><input class="large" type="text" name="batch_keyword" /></div>
    <div class="element-date" title="Start Date"><label class="title">Start Date<span class="required">*</span></label><input class="large" data-format="yyyy-mm-dd" type="date" name="batch_start_date" required="required" placeholder="yyyy-mm-dd"/></div>
    <div class="element-date" title="End Date"><label class="title">End Date<span class="required">*</span></label><input class="large" data-format="yyyy-mm-dd" type="date" name="batch_end_date" required="required" placeholder="yyyy-mm-dd"/></div>
    <div class="form-group has-feedback">
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
    <div class="element-select" title="Venue"><label class="title">Venue<span class="required">*</span></label><div class="large"><span><select name="batch_venue_id" required="required">

        <option value="option 1">option 1</option>
        <option value="option 2">option 2</option>
        <option value="option 3">option 3</option></select><i></i></span></div></div>
    <div class="element-textarea" title="Accomplishment from the batch"><label class="title">Accomplishment from the batch<span class="required">*</span></label><textarea class="medium" name="batch_accomplishment" cols="20" rows="5" required="required"></textarea></div>
    <div class="element-file" title="Upload Photo of the batch"><label class="title">Upload Photo of the batch</label><label class="large" ><div class="button">Choose Photo</div><input type="file" class="file_input" name="batch_photo" /><div class="file_text">No file selected</div></label></div>
    <div class="element-select" title="Difficulty Level"><label class="title">Difficulty Level</label><div class="large"><span><select name="batch_difficulty_level" >

        <option value="All">All</option>
        <option value="Beginner">Beginner</option>
        <option value="Intermediate">Intermediate</option>
        <option value="Advanced">Advanced</option></select><i></i></span></div></div>
    <div class="element-select" title="Age Group"><label class="title">Age Group</label><div class="large"><span><select name="batch_age_group" >

        <option value="All">All</option>
        <option value="Children">Children</option>
        <option value="Adults">Adults</option></select><i></i></span></div></div>
    <div class="element-select" title="Gender"><label class="title">Gender</label><div class="large"><span><select name="batch_gender_group" >

        <option value="Both">Both</option>
        <option value="Male">Male</option>
        <option value="Female">Female</option></select><i></i></span></div></div>
    <div class="element-input" title="Price"><label class="title">Price</label><input class="large" type="text" name="batch_price" /></div>
    <div class="element-number" title="Number of sessions in week"><label class="title">Number of sessions in week<span class="required">*</span></label><input class="large" type="text" min="0" max="7" name="batch_no_of_classes_in_week" required="required" value=""/></div>
    <div class="element-checkbox" title="Batch Schedule"><label class="title">Batch have Classes on<span class="required">*</span></label>      <div class="column column1"><label><input type="checkbox" name="batch_class_on_monday" value="Monday"/ required="required"><span>Monday</span></label><label><input type="checkbox" name="batch_class_on_tuesday" value="Tuesday"/ required="required"><span>Tuesday</span></label><label><input type="checkbox" name="batch_class_on_wednesday" value="Wednesday"/ required="required"><span>Wednesday</span></label><label><input type="checkbox" name="batch_class_on_thursday" value="Thursday"/ required="required"><span>Thursday</span></label><label><input type="checkbox" name="batch_class_on_friday" value="Friday"/ required="required"><span>Friday</span></label><label><input type="checkbox" name="batch_class_on_saturday" value="Saturday"/ required="required"><span>Saturday</span></label><label><input type="checkbox" name="batch_class_on_sunday" value="Sunday"/ required="required"><span>Sunday</span></label></div><span class="clearfix"></span>
</div>
    <div class="element-radio"><label class="title">Batch Recurring<span class="required">*</span></label>      <div class="column column1"><label><input type="radio" name="batch_recurring" value="Not recurring" required="required"/><span>Not recurring</span></label><label><input type="radio" name="batch_recurring" value="Weekly" required="required"/><span>Weekly</span></label><label><input type="radio" name="batch_recurring" value="Monthly" required="required"/><span>Monthly</span></label><label><input type="radio" name="batch_recurring" value="Yearly" required="required"/><span>Yearly</span></label></div><span class="clearfix"></span>
</div>
    <div class="element-radio" title="Trial available"><label class="title">Trial available<span class="required">*</span></label>      <div class="column column1"><label><input type="radio" name="batch_trial" value="Not available" required="required"/><span>Not available</span></label><label><input type="radio" name="batch_trial" value="Free Trial any time walk-in" required="required"/><span>Free Trial any time walk-in</span></label><label><input type="radio" name="batch_trial" value="Paid Trial any time walk-in" required="required"/><span>Paid Trial any time walk-in</span></label><label><input type="radio" name="batch_trial" value="Free Trial only in beginning of batch" required="required"/><span>Free Trial only in beginning of batch</span></label><label><input type="radio" name="batch_trial" value="Paid Trial only in beginning of batch" required="required"/><span>Paid Trial only in beginning of batch</span></label></div><span class="clearfix"></span>
</div>
    <div class="element-textarea" title="Special Comments"><label class="title">Special Comments about the batch (Prerequisite required, anything else you wish to share)</label><textarea class="medium" name="batch_comment" cols="20" rows="5" ></textarea></div>
    <div class="element-input" title="Tagline"><label class="title">Tagline of the batch</label><input class="large" type="text" name="batch_tagline" /></div>
<div class="submit"><input type="submit" value="Submit"/></div></form><p class="frmd"><a href="http://formoid.com/v29.php">javascript form validation</a> Formoid.com 2.9</p>
<script type="text/javascript" src="batch_files/formoid1/formoid-metro-cyan.js"></script>
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
