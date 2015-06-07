<!DOCTYPE html>
<html lang="en">
	<head>	
		@include('Templates.head')
	    @yield('pagestylesheet')
	</head>	
	<body> 		
		<!--Header Section contains sign-in sign-up searchbox and logo -->			
		{{--
		<header class="layout_header" >
			@include('Templates.headerHome')
		</header>
		--}}
		@if(isset($featuredBatches))
			<header class="layout_header" >
				@include('Templates.headerHome')
			</header>
		@else
			<header class="layout_header" >
				@include('Templates.header')
			</header>
		@endif	
		<!--sign-In pop up modal-->
		<div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
			@include('Modals.login')
		</div>
		<!--sign-UP pop up modal-->
		<div class="modal fade" id="signupModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="overflow-y:auto">
			@include('Modals.signup')
		</div>
		<!-- Error and success messages -->
		<div style="margin:0px;position:absolute;width:100%;z-index:1000000">
			@include('Templates.message')
		</div>

		<!--  id="content" class="site-content" -->
		<div style="margin-top:0px;" class="">			
			@yield('content')			
		</div>

		<!--Footer Section social networking links-->
		<footer class="footer-wrapper">
			@include('Templates.footer')
		</footer>		
		
	    @yield('pagejavascript')	    
	    <!--this page specific jquery-->
	    @yield('pagejquery')	   
	</body>
</html>