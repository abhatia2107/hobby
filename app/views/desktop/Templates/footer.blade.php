@section("footer")
<div class="container">
   <div class="row">
      <div class="footer-widget-column col-xs-12 col-sm-6 col-lg-7">
         <div class="textwidget">
            <p>
               Hobbyix<br>
               Stay active and live happy.               
            </p>            
         </div>
         <div class="copyright_text">
            Copyright Hobbyix 2015. All Rights Reserved  
         </div>
      </div>
      <div class="footer-widget-column col-xs-12 col-sm-3 col-lg-3 col-lg-offset-1">
         <h1 class="footer-widget-title">About Hobbyix</h1>
         <div class="menu-need-help-menu-container">
            <ul id="menu-need-help-menu" class="menu">                                 
               <li><span class="glyphicon glyphicon-dashboard"></span><a href="/feedbacks/create">Feedback</a></li>
               <li><span class="glyphicon glyphicon-list-alt"></span><a href="/terms">Terms Of Use</a></li>
                <li><span class="glyphicon glyphicon-user"></span><a href="/privacy">Privacy Policy</a></li>
                <li><span class="glyphicon glyphicon-question-sign"></span><a href="/aboutus">About Hobbyix</a></li>
                <!--<li><span class="glyphicon glyphicon-globe"></span><a href-link="/blog">Hobbyix Blog</a></li> -->
            </ul>
         </div>
      </div>
      <div class="footer-widget-column col-xs-12 col-sm-3 col-lg-3" style="display:none">
         <h1 class="footer-widget-title">Stay Connected</h1>
         <div class="menu-social-widget-menu-container">
            <ul id="menu-social-widget-menu" class="menu">                                 
               <li><span class="glyphicon fa fa-fw fa-twitter"></span><a href-link="$adminAccounts->twitter_link">Twitter</a></li>
               <li><span class="glyphicon fa fa-w fa-facebook"></span><a href-link="$adminAccounts->facebook_link">Facebook</a></li>
               <li><span class="glyphicon fa fa-fw fa-google-plus"></span><a href-link="$adminAccounts->google_plus_link">Google+</a></li>
               <li><span class="glyphicon fa fa-fw fa-instagram"></span><a href-link="$adminAccounts->instagram_link">Instagram</a></li>
               <!--<li><span class="glyphicon fa fa-fw fa-vimeo-square"></span><a href-link="$adminAccounts->vimeo_link">Vimeo</a></li>-->
            </ul>
         </div>
      </div>
   </div>
</div>            
@show