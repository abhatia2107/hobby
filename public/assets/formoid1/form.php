<?php

define('EMAIL_FOR_REPORTS', '');
define('RECAPTCHA_PRIVATE_KEY', '@privatekey@');
define('FINISH_URI', 'http://');
define('FINISH_ACTION', 'message');
define('FINISH_MESSAGE', 'Thanks for filling out my form!');
define('UPLOAD_ALLOWED_FILE_TYPES', 'doc, docx, xls, csv, txt, rtf, html, zip, jpg, jpeg, png, gif');

define('_DIR_', str_replace('\\', '/', dirname(__FILE__)) . '/');
require_once _DIR_ . '/handler.php';

?>

<?php if (frmd_message()): ?>
<link rel="stylesheet" href="<?php echo dirname($form_path); ?>/formoid-metro-cyan.css" type="text/css" />
<span class="alert alert-success"><?php echo FINISH_MESSAGE; ?></span>
<?php else: ?>
<!-- Start Formoid form-->
<link rel="stylesheet" href="<?php echo dirname($form_path); ?>/formoid-metro-cyan.css" type="text/css" />
<script type="text/javascript" src="<?php echo dirname($form_path); ?>/jquery.min.js"></script>
<form enctype="multipart/form-data" class="formoid-metro-cyan" style="background-color:#ffffff;font-size:14px;font-family:'Open Sans','Helvetica Neue','Helvetica',Arial,Verdana,sans-serif;color:#666666;max-width:480px;min-width:150px" method="post"><div class="title"><h2>Add a batch</h2></div>
	<div class="element-input<?php frmd_add_class("input"); ?>" title="Name of Batch"><label class="title">Name of Batch<span class="required">*</span></label><input class="large" type="text" name="input" required="required"/></div>
	<div class="element-select<?php frmd_add_class("select"); ?>" title="Category"><label class="title">Category<span class="required">*</span></label><div class="large"><span><select name="select" required="required">

		<option value="Cooking">Cooking</option>
		<option value="Dance">Dance</option></select><i></i></span></div></div>
	<div class="element-select<?php frmd_add_class("select1"); ?>" title="SubCategory"><label class="title">SubCategory<span class="required">*</span></label><div class="large"><span><select name="select1" required="required">

		<option value="option 1">option 1</option>
		<option value="option 2">option 2</option>
		<option value="option 3">option 3</option></select><i></i></span></div></div>
	<div class="element-input<?php frmd_add_class("input3"); ?>" title="Keyword"><label class="title">Keyword</label><input class="large" type="text" name="input3" /></div>
	<div class="element-date<?php frmd_add_class("date"); ?>" title="Start Date"><label class="title">Start Date<span class="required">*</span></label><input class="large" data-format="yyyy-mm-dd" type="date" name="date" required="required" placeholder="yyyy-mm-dd"/></div>
	<div class="element-date<?php frmd_add_class("date1"); ?>" title="End Date"><label class="title">End Date<span class="required">*</span></label><input class="large" data-format="yyyy-mm-dd" type="date" name="date1" required="required" placeholder="yyyy-mm-dd"/></div>
	<div class="element-select<?php frmd_add_class("select2"); ?>" title="Venue"><label class="title">Venue<span class="required">*</span></label><div class="large"><span><select name="select2" required="required">

		<option value="option 1">option 1</option>
		<option value="option 2">option 2</option>
		<option value="option 3">option 3</option></select><i></i></span></div></div>
	<div class="element-textarea<?php frmd_add_class("textarea"); ?>" title="Accomplishment from the batch"><label class="title">Accomplishment from the batch<span class="required">*</span></label><textarea class="medium" name="textarea" cols="20" rows="5" required="required"></textarea></div>
	<div class="element-file<?php frmd_add_class("file"); ?>" title="Upload Photo of the batch"><label class="title">Upload Photo of the batch</label><label class="large" ><div class="button">Choose Photo</div><input type="file" class="file_input" name="file" /><div class="file_text">No file selected</div></label></div>
	<div class="element-select<?php frmd_add_class("select3"); ?>" title="Difficulty Level"><label class="title">Difficulty Level</label><div class="large"><span><select name="select3" >

		<option value="All">All</option>
		<option value="Beginner">Beginner</option>
		<option value="Intermediate">Intermediate</option>
		<option value="Advanced">Advanced</option></select><i></i></span></div></div>
	<div class="element-select<?php frmd_add_class("select4"); ?>" title="Age Group"><label class="title">Age Group</label><div class="large"><span><select name="select4" >

		<option value="All">All</option>
		<option value="Children">Children</option>
		<option value="Adults">Adults</option></select><i></i></span></div></div>
	<div class="element-select<?php frmd_add_class("select5"); ?>" title="Gender"><label class="title">Gender</label><div class="large"><span><select name="select5" >

		<option value="Both">Both</option>
		<option value="Male">Male</option>
		<option value="Female">Female</option></select><i></i></span></div></div>
	<div class="element-input<?php frmd_add_class("input1"); ?>" title="Price"><label class="title">Price</label><input class="large" type="text" name="input1" /></div>
	<div class="element-number<?php frmd_add_class("number"); ?>" title="Number of sessions in week"><label class="title">Number of sessions in week<span class="required">*</span></label><input class="large" type="text" min="0" max="7" name="number" required="required" value=""/></div>
	<div class="element-checkbox<?php frmd_add_class("checkbox"); ?>" title="Batch Schedule"><label class="title">Batch have Classes on<span class="required">*</span></label>		<div class="column column1"><label><input type="checkbox" name="checkbox[]" value="Monday"/ required="required"><span>Monday</span></label><label><input type="checkbox" name="checkbox[]" value="Tuesday"/ required="required"><span>Tuesday</span></label><label><input type="checkbox" name="checkbox[]" value="Wednesday"/ required="required"><span>Wednesday</span></label><label><input type="checkbox" name="checkbox[]" value="Thursday"/ required="required"><span>Thursday</span></label><label><input type="checkbox" name="checkbox[]" value="Friday"/ required="required"><span>Friday</span></label><label><input type="checkbox" name="checkbox[]" value="Saturday"/ required="required"><span>Saturday</span></label><label><input type="checkbox" name="checkbox[]" value="Sunday"/ required="required"><span>Sunday</span></label></div><span class="clearfix"></span>
</div>
	<div class="element-radio<?php frmd_add_class("radio"); ?>"><label class="title">Batch Recurring<span class="required">*</span></label>		<div class="column column1"><label><input type="radio" name="radio" value="Not recurring" required="required"/><span>Not recurring</span></label><label><input type="radio" name="radio" value="Weekly" required="required"/><span>Weekly</span></label><label><input type="radio" name="radio" value="Monthly" required="required"/><span>Monthly</span></label><label><input type="radio" name="radio" value="Yearly" required="required"/><span>Yearly</span></label></div><span class="clearfix"></span>
</div>
	<div class="element-radio<?php frmd_add_class("radio1"); ?>" title="Trial available"><label class="title">Trial available<span class="required">*</span></label>		<div class="column column1"><label><input type="radio" name="radio1" value="Not available" required="required"/><span>Not available</span></label><label><input type="radio" name="radio1" value="Free Trial any time walk-in" required="required"/><span>Free Trial any time walk-in</span></label><label><input type="radio" name="radio1" value="Paid Trial any time walk-in" required="required"/><span>Paid Trial any time walk-in</span></label><label><input type="radio" name="radio1" value="Free Trial only in beginning of batch" required="required"/><span>Free Trial only in beginning of batch</span></label><label><input type="radio" name="radio1" value="Paid Trial only in beginning of batch" required="required"/><span>Paid Trial only in beginning of batch</span></label></div><span class="clearfix"></span>
</div>
	<div class="element-textarea<?php frmd_add_class("textarea1"); ?>" title="Special Comments"><label class="title">Special Comments about the batch (Prerequisite required, anything else you wish to share)</label><textarea class="medium" name="textarea1" cols="20" rows="5" ></textarea></div>
	<div class="element-input<?php frmd_add_class("input4"); ?>" title="Tagline"><label class="title">Tagline of the batch</label><input class="large" type="text" name="input4" /></div>
<div class="submit"><input type="submit" value="Submit"/></div></form><script type="text/javascript" src="<?php echo dirname($form_path); ?>/formoid-metro-cyan.js"></script>

<!-- Stop Formoid form-->
<?php endif; ?>

<?php frmd_end_form(); ?>