<html>
<head>
<title> Iframe Kit </title>
</head>
<body>
<center>
<iframe src="<?php echo $action?>" id="paymentFrame" width="482" height="450" frameborder="0" scrolling="No" ></iframe>
</center>
<script type="text/javascript" src="/assets/js/jquery-1.7.2.js"></script>
<script type="text/javascript">
    	$(document).ready(function(){
    		 window.addEventListener('message', function(e) {
		    	 $("#paymentFrame").css("height",e.data['newHeight']+'px'); 	 
		 	 }, false);
	 	 	
		});
</script>
</body>
</html>
