<?php
/*
Plugin Name: AdServer Plugin
Plugin URI: https://github.com/Kytoh/YourlsPlugins/tree/master/AdServer_Plugin
Description: Ad System to set a landing page before send to the final page
Version: 1.0
Author: Kyto
Author URI: http://www.kevincala.com
*/

// Hook our custom function into the 'pre_redirect' event
yourls_add_action( 'pre_redirect', 'warning_redirection' );

// Our custom function that will be triggered when the event occurs
function warning_redirection( $args ) {
        $url  = $args[0];
        $code = $args[1];
  
        // Print the message
?>
  <html>
    <head>
      <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>

      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    </head>

    <body>
	<nav class="light-blue lighten-1" role="navigation">
		<div class="nav-wrapper container"><a id="logo-container" href="#" class="brand-logo"><img src="http://api.arrayzone.com/images/patrocinado-por-arrayzone.png"></a>
			<ul class="right hide-on-med-and-down">
				<li><a href="#">Navbar Link</a></li>
			</ul>

			<ul id="nav-mobile" class="side-nav">
				<li><a href="#">Navbar Link</a></li>
			</ul>
			<a href="#" data-activates="nav-mobile" class="button-collapse"><i class="material-icons">menu</i></a>
		</div>
	</nav>

	<div class="ad-placement googleads" name="ad" id="ablockercheck"></div>
	<div id="ablockermsg" style="display: none">AdBlocker Detected. 
	Please disable it to continue</div>

      <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
      <script type="text/javascript" src="js/materialize.min.js"></script>
    </body>
  </html>

<script>
$(document).ready(function()
{
   if(!$("#ablockercheck").is(":visible"))
   {
     $("#ablockermsg").show();
   }else{
    setTimeout(function () {
        window.location = $url;
    }, 7000);
}
   }
	   
});
</script>
<?php 
        // Now die so the normal flow of event is interrupted
        die();
				
}
?>