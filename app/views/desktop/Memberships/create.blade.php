<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

	<form method="post" action="/memberships" enctype="multipart/form-data">
			<div class="col-md-3 col-sm-3 col-xs-12">
				<div class="form-group">
					<div class="col-md-offset-2 col-sm-12 col-md-8 col-xs-offset-2 col-xs-8">
		    			<input type="hidden" >
		    			<!-- <input type="date" placeholder="Starting Date" class="form-control" id="datepicker" name="start_date" required /> -->
						<input type="submit">
		    		</div>
				</div>
			</div>
	</form>

<script src="/assets/js/jquery-ui-1.10.4.min.js"></script>
<script type="text/javascript">
	 $(function() {
		$("#datepicker").datepicker({
			/*showOn: 'both',
			buttonImage: "http://jqueryui.com/resources/demos/datepicker/images/calendar.gif",
            buttonText: "Choose Date",*/
            dateFormat: 'yy-mm-dd'
		});
	});
</script>

</body>
</html>