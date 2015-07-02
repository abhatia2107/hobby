<!DOCTYPE html>
<html lang="en">
	<head>	
		@include('Templates.head')
	    @yield('pagestylesheet')
	</head>	
	<body> 	
		<div id="fb-root"></div>
		<!-- Facebook SDK code -->
		<script>(function(d, s, id) {
		  var js, fjs = d.getElementsByTagName(s)[0];
		  if (d.getElementById(id)) return;
		  js = d.createElement(s); js.id = id;
		  js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.3&appId=787415747998638";
		  fjs.parentNode.insertBefore(js, fjs);
		}(document, 'script', 'facebook-jssdk'));</script>
		<!-- Google Analytics code -->
		<script>
		  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
		  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
		  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
		  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

		  ga('create', 'UA-64069425-1', 'auto');
		  ga('send', 'pageview');

		</script>
		<!--Header Section contains sign-in sign-up searchbox and logo -->					
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
		<div class="alertMessage">
			@include('Templates.message')
		</div>

		<!--  id="content" class="site-content" -->
		<div>			
			@yield('content')			
		</div>
		<!--Footer Section social networking links-->
		<footer class="footer-wrapper">
			@include('Templates.footer')
		</footer>
		<!--sign-In pop up modal-->
		<div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-hidden="true">
			@include('Modals.login')
		</div>
		<!--sign-UP pop up modal-->
		<div class="modal fade" id="signupModal" tabindex="-1" role="dialog" aria-hidden="true" style="overflow-y:auto">
			@include('Modals.signup')
		</div>						
	    @yield('pagejavascript')	    
	    <!--this page specific jquery-->
	    @yield('pagejquery')   
	</body>	
</html>