<?php
session_start();

if (isset($_SESSION['hash'])){
    //place stored session variables into local PHP variable
    $id = $_SESSION['hash'];
  
} else {
    $result = " You need to be logged into - scandroid! ";
    //header('Location: index.php');       //returns user to home page even if not logged in
    //header("location: index.php?error_message=$result");
    
    //this produces an error message and redirects users to the home screen
    echo '<script type="text/javascript">
            alert("Please select a valid apk file"); 
            window.location.href = "index.php";</script>';

}






?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<!--<script src="scripts/indexmin.js"></script>-->
 <script src="https://code.jquery.com/jquery-1.10.2.js"></script>
 <script src="js/bootstrap.min.js"></script> <!--need this for mibile drop down menue-->

<!--=================================================================================-->
  <script src="js/report.js" type="text/javascript"></script>


<title>scandroid</title>

    <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="css/styles.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="icon" type="image/ico" href="/scandroid/images/favicon.ico">



</head>


<body>

<div class="container" style="padding:40px 0; margin-bottom:0;">
<!--<h1>Scan-My-APK</h1>-->
<a href="/scandroid/index.php"><img src="images/BannerLogo2.jpg" id="Logo"></a>
<!-- <h1>Test My APK Login </h1> -->
<!--<div id=resultMsg><?php if (isset($_POST['username'])) 
{ 
    echo $uname;} else {echo $result;
    //Insert go back link
    echo ("<a href=\"javascript:history.go(-1)\" title=\"Return to previous page\">&laquo; Go back!</a>");
} ?> 
</div> -->





<div class="wrapper"> 

<div id="loading" style="width 100%;">
    
    <img src="images/preloader.gif" id="loading1">
    <h4>Application scanning, please be patient!</h4>
</div>



<!--File details-->
<div id="reportInfo" style="background:#ffffff; width: 100%; border:#CCC 1px solid; height:310px;"><!--New div start-->

<div id="databox1" style="visibility:visible; width: 55%; height:300px; float:left; background:#ffffff;">
    <table class="table table-striped" id="antivirus-results">
    <thead>
        <tr>
        <th class="header headerSortDown1 vt-width-1" ></th>      <!--make the width equal to 1 to indent background colour of hiddent text-->
        <th class="header headerSortDown vt-width-30" style="text-align: left; color:#070a41;" COLSPAN = 2 ><h2>Vulnerability Report:</h2></th></tr></thead>
        <!--<th id="results-header" style="cursor:pointer;">Found</th></tr></thead>
<        th>Date</th></tr></thead>-->
        <tbody id="databox2"></tbody>
    </table>
    <!--Test button made visible when a report is returned-->
    <input id="myButton" style="visibility:visible" type="button" value="report">
   
</div>
<!--===================This is the morris pie chart=============================-->
<div class="container-fluid" style="width:45%; float:left;  ">
  <div class="row">
    <div class="col-md-6" style="width:100%;">
        <div id="donut-example" style="height: 300px;"></div>
    </div>
  </div>
</div>

</div><!--New div end-->
</div><!--New div end-->


<br class="clearBoth" style="clear:both;"/>

</br>
<div id="databox">
<table class="table table-striped" id="antivirus-results">
<thead>
<tr>

<th class="header headerSortDown vt-width-30" style="color:#070a41;"><h3>Signature</h3></th>
<th class="header headerSortDown1 vt-width-1" style="background:#F3F3F3;"></th>     <!--make the width equal to 1 to indent background colour of hiddent text-->
<th id="results-header" style="cursor:pointer; color:#070a41;"><h3>Found</h3></th>
<th id="results-header" style="cursor:pointer; color:#070a41;"><h3>Information</h3></th></tr></thead>
<tbody id="databox3"></tbody>
</table>



</div> 

<div id="arbitrarybox"></div> <script>ajax_json_data();</script> 
<!--=================================================================================-->
<!--<div id="databox1" style="visibility:hidden">-->


</div>   <!-- End Databox1 Wrapper -->
<!--=================================================================================-->
</div>   <!-- End container -->
<!--=================================================================================-->

<!--================================================================-->
<div id="p0" style="display:none;">test</div>
<!--================================================================-->
<!--<div id="report-data"></div>-->




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

