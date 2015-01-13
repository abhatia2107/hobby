<!DOCTYPE html>
<html lang="en">
	<head>
		@include('Templates.head')
	    @yield('pagestylesheet')
	</head>
	
	<body> <!--  style="background:white" class="home page page-id-6 page-template page-template-page-templates page-template-template-home page-template-page-templatestemplate-home-php custom-background template-home  directory-fields color-scheme-default footer- woocommerce-social-login listify-child wp-job-manager-categories-enabled wp-job-manager-categories-only" -->
		 <!--  id="page" class="hfeed site" -->
			<!--Header Section contains sign-in sign-up searchbox and logo -->
			<div class="row">
			@if(isset($featuredBatches))
				<header class="layout_header" >
					@include('Templates.headerHome')
				</header>
			@else
				<header class="layout_header" >
					@include('Templates.header')
				</header>
			@endif
			</div>
			<div class="row">
			@if(isset($categories))
				@include('Templates.navbar')
			@endif
			</div>
			<!--sign-In pop up modal-->
			<div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
				@include('Modals.login')
			</div>
			<!--sign-UP pop up modal-->
			<div class="modal fade" id="signupModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
				@include('Modals.signup')
			</div>
			<!-- Error and success messages -->
			@include('Templates.message')
			<div class="row"><!--  id="content" class="site-content" -->
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