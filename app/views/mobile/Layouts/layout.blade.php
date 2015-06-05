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

		<!-- Error and success messages -->
		<div style="margin:0px;position:absolute;width:100%;z-index:1000000">
			@include('Templates.message')
		</div>

		<!--  id="content" class="site-content" -->
		<div style="margin-top:0px;">			
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