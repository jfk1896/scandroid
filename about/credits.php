<?php

?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">


<title>scandroid</title>

    <script src="//code.jquery.com/jquery-1.11.2.min.js"></script>
    <script src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
    
    <script src="/scandroid/js/bootstrap.min.js"></script>

    <link rel="stylesheet" type="text/css" href="/scandroid/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="/scandroid/css/styles.css">
    <link rel="stylesheet" href="/scandroid/css/font-awesome.min.css">
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
      <li class="active">
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
      <li>
        <a href="/scandroid/about/contact.php">
          Contact</a>
      </li>
    </ul>
  </div>

    

  <section id="credits" class="ltr">

    <div class="page-header">
      <h1>Credits &amp; Acknowledgements</h1>
    </div>

    <p>
      scandroid is a free service developed for educational purposes by a team 
      of highly motivated students.  Scandroid is an information aggregator, the 
      presented data is the output of various open-source programmes brough together
      by scandroids scanner application. Additional virus scans are run in parallel to 
      scandroid's static code analysis by utilizing two 
      <a href="https://www.virustotal.com/" target="_blank">virustotal.com</a> 
      public API Python scripts.
      
    </p>

    <p>
      This page acknowledges all companies and individuals that have integrated
      a product, tool or resource in scandroid, or have contributed somehow.
      scandroid is not tied to any of these companies or individuals in any
      way, hence, the results provided are not subjected to any type of bias.
      scandroid is not responsible for false positives generated by any of the
      resources it uses, false positive issues should be addressed directly with
      the company or individual behind the product under consideration.
    </p>
    
    
    
    <div class="rows">
      <div class="spanBox">

        <h3>File characterization tools &amp; datasets </h3>

        <ul>
          <li>
            <a href="https://code.google.com/p/xml-apk-parser/" target="_blank">
            APKParser.jar:</a> (Parse the APK file)
          </li>
          <li>
            <a href="https://code.google.com/p/dex2jar/" target="_blank">
            Dex2jar:</a> (convert Android .dex to Java .class format)
          </li>
          <li>
            <a href="https://github.com/kwart/jd-cmd" target="_blank">
            jd-cli:</a> (Java Decompiler)
          </li>
          <li>
            <a href="https://github.com/chrisallenlane/watchtower" target="_blank">
            Watchtower:</a> (Static Code Analysis tool)
          </li>
          
        </ul>


      </div>
      
      
      <div class="spanBox">
        <h3>Virus scans</h3>
        <ul>
          <li>
            <a href="https://www.virustotal.com/en/documentation/public-api/" target="_blank">
            vtscan.py:</a> (Uploads files to virustotal.com)
          </li>
          <li>
            <a href="http://code.activestate.com/recipes/146306/" target="_blank">
            postfile.py:</a> (Sends file to virustotal.com using POST with HTTPS)
          </li>
          
        </ul>
        
        </div>

      
    </div><!--end row-->


    


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