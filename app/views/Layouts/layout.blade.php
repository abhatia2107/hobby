<!DOCTYPE html>
<html lang="en">
	<head>
		@include('Templates.head')
	    @yield('pagestylesheet')
	</head>
	<body  style="background:white" class="home page page-id-6 page-template page-template-page-templates page-template-template-home page-template-page-templatestemplate-home-php custom-background template-home  directory-fields color-scheme-default footer- woocommerce-social-login listify-child wp-job-manager-categories-enabled wp-job-manager-categories-only">
		<div id="page" class="hfeed site">
			<!--Header Section contains sign-in sign-up searchbox and logo -->
			<header  class="layout_header" >
				@include('Templates.header')
			</header>
			@include('Templates.navbar')
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
			
			<div id="content" class="site-content">
				@yield('content')
			</div>
			<!--Footer Section social networking links-->
			<div class="footer-wrapper">
				@include('Templates.footer')
			</div>
		</div>
		<!-- Few Scripts from Listify Template-->
		<!-- Placed at the end of the document so the pages load faster --> 
		<div id="ajax-response"></div>
		<script>
			eval(mod_pagespeed_vL28zK69LJ);
		</script>
		<script type="text/javascript">
			var _wpcf7={"loaderUrl":"https:\/\/demo.astoundify.com\/listify\/wp-content\/plugins\/contact-form-7\/images\/ajax-loader.gif","sending":"Sending ..."};
		</script>
		<script type="text/javascript" src="https://demo.astoundify.com/listify/wp-content/plugins/contact-form-7/includes/js/scripts.js,qver=4.0.3.pagespeed.jm.aPhR_ZcXmQ.js"></script>
		<script type="text/javascript">
			var wc_add_to_cart_params={"ajax_url":"\/listify\/wp-admin\/admin-ajax.php","ajax_loader_url":"\/\/demo.astoundify.com\/listify\/wp-content\/plugins\/woocommerce\/assets\/images\/ajax-loader@2x.gif","i18n_view_cart":"View Cart","cart_url":"https:\/\/demo.astoundify.com\/listify\/cart\/","is_cart":"","cart_redirect_after_add":"yes"};var wc_add_to_cart_params={"ajax_url":"\/listify\/wp-admin\/admin-ajax.php","ajax_loader_url":"\/\/demo.astoundify.com\/listify\/wp-content\/plugins\/woocommerce\/assets\/images\/ajax-loader@2x.gif","i18n_view_cart":"View Cart","cart_url":"https:\/\/demo.astoundify.com\/listify\/cart\/","is_cart":"","cart_redirect_after_add":"yes"};
		</script>
		<script src="//demo.astoundify.com/listify/wp-content/plugins/woocommerce/assets/js/frontend,_add-to-cart.min.js,qver==2.2.10+jquery-blockui,_jquery.blockUI.min.js,qver==2.60.pagespeed.jc.xktd1LBHTb.js"></script><script>eval(mod_pagespeed_BTu5elOhx_);</script>
		<script>
			eval(mod_pagespeed_E1D1URTX2p);
		</script>
		<script type="text/javascript">
			var woocommerce_params={"ajax_url":"\/listify\/wp-admin\/admin-ajax.php","ajax_loader_url":"\/\/demo.astoundify.com\/listify\/wp-content\/plugins\/woocommerce\/assets\/images\/ajax-loader@2x.gif"};var woocommerce_params={"ajax_url":"\/listify\/wp-admin\/admin-ajax.php","ajax_loader_url":"\/\/demo.astoundify.com\/listify\/wp-content\/plugins\/woocommerce\/assets\/images\/ajax-loader@2x.gif"};
		</script>
		<script src="//demo.astoundify.com/listify/wp-content/plugins/woocommerce/assets/js/frontend,_woocommerce.min.js,qver==2.2.10+jquery-cookie,_jquery.cookie.min.js,qver==1.3.1.pagespeed.jc.3mV1RdNelR.js"></script><script>eval(mod_pagespeed_Ty5JVqXFv6);</script>
		<script>
			eval(mod_pagespeed_TG3knWk9QG);
		</script>
		<script type="text/javascript">
			var wc_cart_fragments_params={"ajax_url":"\/listify\/wp-admin\/admin-ajax.php","fragment_name":"wc_fragments"};var wc_cart_fragments_params={"ajax_url":"\/listify\/wp-admin\/admin-ajax.php","fragment_name":"wc_fragments"};
		</script>
		<script type="text/javascript">
			jQuery(function(a){if("undefined"==typeof wc_cart_fragments_params)return!1;try{$supports_html5_storage="sessionStorage"in window&&null!==window.sessionStorage}catch(b){$supports_html5_storage=!1}if($fragment_refresh={url:wc_cart_fragments_params.ajax_url,type:"POST",data:{action:"woocommerce_get_refreshed_fragments"},success:function(b){b&&b.fragments&&(a.each(b.fragments,function(b,c){a(b).replaceWith(c)}),$supports_html5_storage&&(sessionStorage.setItem(wc_cart_fragments_params.fragment_name,JSON.stringify(b.fragments)),sessionStorage.setItem("wc_cart_hash",b.cart_hash)),a("body").trigger("wc_fragments_refreshed"))}},$supports_html5_storage){a("body").bind("added_to_cart",function(a,b,c){sessionStorage.setItem(wc_cart_fragments_params.fragment_name,JSON.stringify(b)),sessionStorage.setItem("wc_cart_hash",c)});try{var c=a.parseJSON(sessionStorage.getItem(wc_cart_fragments_params.fragment_name)),d=sessionStorage.getItem("wc_cart_hash"),e=a.cookie("woocommerce_cart_hash");if((null===d||void 0===d||""===d)&&(d=""),(null===e||void 0===e||""===e)&&(e=""),!c||!c["div.widget_shopping_cart_content"]||d!=e)throw"No fragment";a.each(c,function(b,c){a(b).replaceWith(c)}),a("body").trigger("wc_fragments_loaded")}catch(b){a.ajax($fragment_refresh)}}else a.ajax($fragment_refresh);a.cookie("woocommerce_items_in_cart")>0?a(".hide_cart_widget_if_empty").closest(".widget_shopping_cart").show():a(".hide_cart_widget_if_empty").closest(".widget_shopping_cart").hide(),a("body").bind("adding_to_cart",function(){a(".hide_cart_widget_if_empty").closest(".widget_shopping_cart").show()})});
		</script>
		<script type="text/javascript">
			var listifySettings={"ajaxurl":"https:\/\/demo.astoundify.com\/listify\/wp-admin\/admin-ajax.php","homeurl":"https:\/\/demo.astoundify.com\/listify\/","archiveurl":"https:\/\/demo.astoundify.com\/listify\/listings\/","is_job_manager_archive":"","l10n":{"closed":"Closed"}};var listifyListingGallery={"canUpload":"","gallery_title":"Add Images to Gallery","gallery_button":"Add to gallery","delete_image":"Delete image","default_title":"Upload","default_button":"Select this"};
		</script>
		<script type="text/javascript" src="https://demo.astoundify.com/listify/wp-content/themes/listify/js/app.min.js?ver=20141204"></script>
		<script type="text/javascript" src="https://s0.wp.com/wp-content/js/devicepx-jetpack.js?ver=201451"></script>
		<script src="https://demo.astoundify.com/listify/wp-content/themes,_listify,_inc,_integrations,_wp-job-manager-bookmarks,_js,_wp-job-manager-bookmarks.min.js,qver==1.1.1+plugins,_wp-job-manager-tags,_assets,_js,_tag-filter.js,qver==1.0.pagespeed.jc.mmqoXOoYnt.js"></script><script>eval(mod_pagespeed_eG4fcrpuTh);</script>
		<script>
			eval(mod_pagespeed_M3WbNzPRHO);
		</script>
		<script>
			Receiptful.setTrackingCookie();
		</script>
		<script type="text/javascript">
			window.NREUM||(NREUM={});NREUM.info={"beacon":"beacon-5.newrelic.com","licenseKey":"e20a3d19de","applicationID":"6656365","transactionName":"NQBaN0JUCEMDBkRZCQxKeQBEXAleTRFVXRYOBEwGHV0JXQc=","queueTime":0,"applicationTime":502,"ttGuid":"","agentToken":"","atts":"GUdNQQpOGxxABBIKHR8Y","errorBeacon":"bam.nr-data.net","agent":"js-agent.newrelic.com\/nr-476.min.js"}
		</script>
		<div style="display: none;" class="pac-container"></div>
		<script src="https://js-agent.newrelic.com/nr-476.min.js"></script>
		<div style="display: none;" class="pac-container"></div>
		<script src="https://beacon-5.newrelic.com/1/e20a3d19de?a=6656365&amp;pl=1419191821978&amp;v=476.c73f3a6&amp;to=NQBaN0JUCEMDBkRZCQxKeQBEXAleTRFVXRYOBEwGHV0JXQc%3D&amp;ap=502&amp;be=2527&amp;fe=11717&amp;dc=2863&amp;f=%5B%5D&amp;perf=%7B%22timing%22:%7B%22of%22:1419191821978,%22n%22:0,%22dl%22:2417,%22di%22:5133,%22ds%22:5389,%22de%22:5533,%22dc%22:14243,%22l%22:14244,%22le%22:14326,%22r%22:1,%22re%22:1,%22f%22:1,%22dn%22:1,%22dne%22:1,%22c%22:1,%22ce%22:1,%22rq%22:17,%22rp%22:2415,%22rpe%22:2416%7D,%22navigation%22:%7B%7D%7D&amp;at=GUdNQQpOGxxABBIKHR8Y&amp;jsonp=NREUM.setToken" type="text/javascript"></script><script src="http://js-agent.newrelic.com/nr-476.min.js"></script><script src="http://beacon-5.newrelic.com/1/e20a3d19de?a=6656365&amp;pl=1419238232412&amp;v=476.c73f3a6&amp;to=NQBaN0JUCEMDBkRZCQxKeQBEXAleTRFVXRYOBEwGHV0JXQc%3D&amp;ap=502&amp;f=%5B%5D&amp;perf=%7B%22timing%22:%7B%22of%22:1419238232412,%22n%22:0,%22u%22:69,%22ue%22:70,%22dl%22:68,%22di%22:2574,%22ds%22:3503,%22de%22:3554,%22dc%22:5826,%22l%22:5826,%22le%22:5839,%22r%22:0,%22re%22:0,%22f%22:0,%22dn%22:0,%22dne%22:0,%22c%22:0,%22ce%22:0,%22rq%22:0,%22rp%22:0,%22rpe%22:0%7D,%22navigation%22:%7B%22ty%22:1%7D%7D&amp;at=GUdNQQpOGxxABBIKHR8Y&amp;jsonp=NREUM.setToken" type="text/javascript"></script>

	    @yield('pagejavascript')
	    
	    <!--this page specific jquery-->
	    @yield('pagejquery')
	</body>
</html>