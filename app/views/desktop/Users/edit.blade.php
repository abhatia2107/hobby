@extends('Layouts.layout')
@section('content')
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v2.3&appId=417226411769220";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

	<div class="fb-like" data-href="https://www.facebook.com/pages/HOBBYIX/836049089804962" data-layout="standard" data-action="like" data-show-faces="true" data-share="true"></div>
@stop