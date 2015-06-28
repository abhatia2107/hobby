@extends('Layouts.layout')
	<div class="fb-share-button" data-href="https://hobbyix.com" data-layout="button_count"></div>
@section('pagejquery')
	<div id="fb-root"></div>
	<script type="text/javascript">
		(function(d, s, id) {
		  var js, fjs = d.getElementsByTagName(s)[0];
		  if (d.getElementById(id)) return;
		  js = d.createElement(s); js.id = id;
		  js.src = "//connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v2.3&appId=1061701537179263";
		  fjs.parentNode.insertBefore(js, fjs);
		}(document, 'script', 'facebook-jssdk'));
		FB.ui({
		  method: 'share_open_graph',
		  action_type: 'og.likes',
		  action_properties: JSON.stringify({
		      object:'https://developers.facebook.com/docs/',
		  })
		}, function(response){});
   	</script>
@stop