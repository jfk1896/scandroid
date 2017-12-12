<?php

?>


<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">


<!-- include Google hosted jQuery Library 
<script src="//code.jquery.com/jquery-1.11.2.min.js"></script>
<link rel="stylesheet" href="emailStyle.css">-->

<!-- Start jQuery code 
<script type="text/javascript"></script>-->







<title>scandroid</title>

    <script src="//code.jquery.com/jquery-1.11.2.min.js"></script>
    
    <script src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
    
    <script src="/scandroid/js/bootstrap.min.js"></script>

    
    <link rel="stylesheet" type="text/css" href="/scandroid/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="/scandroid/css/styles.css">
    <link rel="stylesheet" href="/scandroid/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="/scandroid/css/emailStyle.css">
    <link rel="icon" type="image/ico" href="/scandroid/images/favicon.ico">
    
    
 

</head>
<body>

<div class="container" style="padding:40px 0; margin-bottom:0;">
<div class="wrapper">

<a href="/scandroid/index.php"><img src="/scandroid/images/BannerLogo2.jpg" id="Logo-small" alt="scandroid"></a>
   
  

  <div class="margin-top-1" style="clear:both;">
    <ul class="nav nav-pills">
      <li>
        <a href="/scandroid/about/about.php">
          About</a>
      </li>
      <li>
        <a href="/scandroid/about/team.php">
          Team</a>
      </li>
      <li>
        <a href="/scandroid/about/credits.php">
          Credits</a>
      </li>
      <li>
        <a href="/scandroid/about/terms.php">
          ToS</a>
      </li>
      <li>
        <a href="/scandroid/about/privacy.php">
          Privacy</a>
      </li>
      <li>
        <a href="/scandroid/about/usage.php">
          Usage</a>
      </li>
      <li class="active">
        <a href="/scandroid/about/contact.php">
          Contact</a>
      </li>
    </ul>
  </div>

    

  <section id="contact" class="ltr">

    <div class="page-header">
      <h1>Get in Touch</h1>
    </div>

    <div class="rows">
      <div class="span8">
        <p>
          Feel free to contact us with service questions, media
          requests, bug reports and any other inquiry that you may have. This
          is also the place to ask for further information about our security
          events and privileged access to scandroid's resources.
        </p>
        <p>
          The following form is equivalent to writing an e-mail to
          <a href="mailto:scandroid311@gmail.com?subject=General question">
          scandroid311@gmail.com</a>.,
          some subject suggestions have been embedded in the corresponding drop
          down list, do not hesitate to contact us regarding
          any other subject that you may consider relevant.
        </p>

    		

    		
  
	<div id="form-messages"></div>
		
		<form id="ajax-contact" method="post" action="mailer.php">
			<!--<div class="field">
				<label for="subject">Subject:</label>
				<input type="text" id="subject" name="subject" required>
			</div>-->
			
			
			<div class="field">
			    <label for="subject">Subject:</label>
                            <select type="text" id="subject" name="subject" required>
<option value="General question">General question</option>
<option value="Suggestions and ideas">Suggestions and ideas</option>
<option value="Bug report">Bug report</option>
<option value="I have accidentally uploaded something private">I have accidentally uploaded something private</option>
<option value="Other topic">Other topic</option>
                           </select>
                  
                        </div>
			
			
			
			
			
			

			<div class="field">
				<label for="email">Email:</label>
				<input type="email" id="email" name="email" required>
			</div>

			<div class="field">
				<label for="message">Message:</label>
				<textarea id="message" name="message" required></textarea>
			</div>

			<div class="field">
				<button type="submit" id="submit_btn">Send</button>
			</div>
		</form>
	</div>
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  


      </div>
  </section>

  
  
</div><!--end wrapper-->
</div><!--end container-->

<!--footer and Social Media              navbar-bottom controls the color-->
<div class="navbarss navbar-inversess navbarss-fixed-bottom navbar-bottom" sytle="width=100%;" roles="navigation">
    <div class ="containersss">
                
    	<h1 class="text-center navbar-test">Social Media Network</h1>
	<div class="row" style="padding:1% 0;">
	  <!--fontawesome icons-->
	  <div class="col-sm-1 col-sm-offset-2 col-xs-4 text-center navbar-test">
	  <a href="https://github.com/" target="_blank"><i class="fa fa-github fa-4x"></i></a> 
	  </div>
	  <div class="col-sm-1 col-xs-4 text-center navbar-test">
	  <a href="https://foursquare.com/" target="_blank"><i class="fa fa-foursquare fa-4x"></i></a>
	  </div>
	  <div class="col-sm-1 col-xs-4 text-center navbar-test">
	  <a href="https://www.facebook.com/" target="_blank"><i class="fa fa-facebook fa-4x"></i></a>
	  </div>
	  <div class="col-sm-1 col-xs-4 text-center navbar-test">
	  <a href="https://www.pinterest.com" target="_blank"><i class="fa fa-pinterest fa-4x"></i></a>
	  </div>
	  <div class="col-sm-1 col-xs-4 text-center navbar-test">
	  <a href="https://plus.google.com" target="_blank"><i class="fa fa-google-plus fa-4x"></i></a>
	  </div>
	  <div class="col-sm-1 col-xs-4 text-center navbar-test">
	  <a href="https://twitter.com/?lang=en" target="_blank"><i class="fa fa-twitter fa-4x"></i></a>
	  </div>
	  <div class="col-sm-1 col-xs-4 text-center navbar-test">
	  <a href="https://dribbble.com/" target="_blank"><i class="fa fa-dribbble fa-4x"></i></a>
	  </div>
	  <div class="col-sm-1 col-xs-4 text-center navbar-test">
	  <a href="https://instagram.com/" target="_blank"><i class="fa fa-instagram fa-4x"></i></a>
	  </div>    
	</div><!--/row-->  
	
	<div class="navbar-text pull-left">
            <p>&copy; 2015 scandroid.</p>	
        </div>
        
    </div>
</div>

<div class="navbar navbar-default navbar-fixed-top" >
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse" >
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
    <!--  <a class="navbar-brand" href="#">New scan</a>-->
    </div>
    <div class="collapse navbar-collapse">
      <ul class="nav navbar-nav">
        <li><a href="/scandroid/index.php">Analyse Another File</a></li>
        <!--<li><a href="#about">About</a></li>
        <li><a href="#contact">Contact</a></li>-->
        <li><a href="/scandroid/index.php"><i class="fa fa-home fa-2x pull-right"></i></a></li>
      </ul>
    </div><!--/.nav-collapse -->
  </div>
</div><!--End Navbar  -->




</body>
</html>