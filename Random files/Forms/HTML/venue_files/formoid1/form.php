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
<form class="formoid-metro-cyan" style="background-color:#FFFFFF;font-size:14px;font-family:'Open Sans','Helvetica Neue','Helvetica',Arial,Verdana,sans-serif;color:#666666;max-width:480px;min-width:150px" method="post"><div class="title"><h2>Venue</h2></div>
	<div class="element-input<?php frmd_add_class("input"); ?>" title="Name of Venue"><label class="title">Name of Venue<span class="required">*</span></label><input class="large" type="text" name="input" required="required"/></div>
	<div class="element-select<?php frmd_add_class("select"); ?>" title="City"><label class="title">City<span class="required">*</span></label><div class="large"><span><select name="select" required="required">

		<option value="Hyderabad">Hyderabad</option>
		<option value="Delhi">Delhi</option>
		<option value="Other">Other</option></select><i></i></span></div></div>
	<div class="element-select<?php frmd_add_class("select1"); ?>" title="Locality"><label class="title">Locality</label><div class="large"><span><select name="select1" >

		<option value="Kancheguda">Kancheguda</option>
		<option value="Madhapur">Madhapur</option>
		<option value="Other">Other</option></select><i></i></span></div></div>
	<div class="element-input<?php frmd_add_class("input4"); ?>" title="Address"><label class="title">Address<span class="required">*</span></label><input class="large" type="text" name="input4" required="required"/></div>
	<div class="element-input<?php frmd_add_class("input2"); ?>" title="Pin Code"><label class="title">Pin Code<span class="required">*</span></label><input class="large" type="text" name="input2" required="required"/></div>
	<div class="element-phone<?php frmd_add_class("phone"); ?>" title="Contact No."><label class="title">Contact No.<span class="required">*</span></label><input class="large" type="tel" pattern="\d{3}-\d{3}-\d{4}" maxlength="24" name="phone" required="required" placeholder="XXX-XXX-XXXX" value=""/></div>
	<div class="element-email<?php frmd_add_class("email"); ?>" title="Email"><label class="title">Email</label><input class="large" type="email" name="email" value="" /></div>
<div class="submit"><input type="submit" value="Submit"/></div></form><script type="text/javascript" src="<?php echo dirname($form_path); ?>/formoid-metro-cyan.js"></script>

<!-- Stop Formoid form-->
<?php endif; ?>

<?php frmd_end_form(); ?>