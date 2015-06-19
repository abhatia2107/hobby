@extends('Layouts.layout')
@section('pagestylesheet')
<style type="text/css">
  .booknowButton, .booknowButton:hover, .booknowButton button:active { background: #3396d1;margin-top: 5px;padding: 5px 25px 5px 25px;border-radius: 0px;border:0px solid;text-align: center; }
  .batchOrderButtons { text-align: center;color: white}
  .batchOrderField {margin-bottom: 4px;}
  .batchOrderField button { border:0px;background-color: #3aa54c;font-size: 15px;color: white;height:30px;padding: 4px;margin-top: 5px; }
  .help-block{color: white !important;}
</style> 
@stop
@section('content')

<div class="yoga-slider" style="max-height:750px; min-height:750px; overflow:hidden">
	<div style="background-color: rgba(0, 0, 0, 0.1);">
		<div class="col-md-5 col-sm-5 col-xs-5">
			<img src="/assets/images/yoga/hobbyix.jpg" alt="Hobbyix" height="100" width="200" class="pull-left"/>
		</div>
		<div class="col-md-2 col-sm-2 col-xs-2">
			<img src="/assets/images/yoga/yoga.jpg" alt="International Day of Yoga" height="140" width="50%" style="margin-left:25%;"/>
		</div>
		<div class="col-md-5 col-sm-5 col-xs-5">
			<img src="/assets/images/yoga/aol.jpg" alt="The Art of Living" height="100" width="200" class="pull-right"/>
		</div>
	</div>
	<div class="homepage-cover">
	   <div class="container" id="hompage-cover">
			<div class="hobby_search_listings" style="background-color: rgba(0, 0, 0, 0.2);padding:0px 0px 0px 0px;">
				<div>
					<h2>Hobbyix.com &amp; The Art of Living Presents</h2>
					<h1>YOGA: A NEW DIMENSION</h1>
					<h2>21st June 2015 International Day of Yoga</h2>
				</div> 
			</div>
			<!-- <div class="col-md-8"></div> -->
			<div>
				<h2>
					Time: 6:30 am to 9 am
				</h2>
				<h2>
					Register for free at hobbyix.com/yoga
				</h2>
			</div>
			<div class="col-md-3">
				
			</div>
			<div class="col-md-8">
				<h3>
				<table style="width:100%; color:white; text-align:left;">
					<tr><td>Venues:</td></tr>
					<tr><td>1. LB Outdoor Stadium - 9908347005</td></tr>
					<tr><td>2. Sports Complex, Gachibowli - 9000966684</td></tr>
					<tr><td>3. KVBR Indoor Stadium, Yousufguda - 9866687466</td></tr>
					<tr><td>4. Saroornagar Indoor Stadium, LB Nagar - 7032168786</td></tr>
					<tr><td>5. Cycling Vendrome, OU Campus - 9849648070</td></tr>
					<tr><td>6. Gymkhana Grounds, Secunderabad - 9652135036</td></tr>
				</table>
				</h3>
			</div>
			<div class="col-md-1">
				
			</div>
		</div>
	</div>
</div>

@stop

@stop