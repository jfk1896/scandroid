<?php
session_start();                      //this will kill the session if the back button is clicked
session_destroy();                    //this will kill the session if the back button is clicked
session_start();
$id = session_id();
$_SESSION['id'] = $id;

$line = date('Y-m-d H:i:s') . " - $_SERVER[REMOTE_ADDR]";
file_put_contents('visitors.log', $line . PHP_EOL, FILE_APPEND);

//$_SERVER['REQUEST_URI'];

if (isset($_SESSION['id'])){
    //place stored session variables into local PHP variable
 //   $uid = $_SESSION['id'];
 //   $uname = $_SESSION['username'];
   ////////////////// $result = "Test Variables: <br/> Username: ".$uname. "<br/> Id: ".$uid;
} else {
    $result = " You need to be logged into - Test-My-APK! ";
    //header('Location: index.php');       //returns user to home page even if not logged in
    //header("location: index.php?error_message=$result");
    
    //this produces an error message and redirects users to the home screen
    echo '<script type="text/javascript">
            alert("Naughty! Naughty! you need to be logged into Test-My-APk!"); 
            window.location.href = "index.php";</script>';

}



?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">







<title>scandroid</title>

    <script src="//code.jquery.com/jquery-1.11.2.min.js"></script>
    <script src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
    
    <script src="js/bootstrap.min.js"></script>

    <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="css/styles.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="css/styleHome.css">
    <link rel="icon" type="image/ico" href="/scandroid/images/favicon.ico">




    


</head>


<body>

<div class="container" style="padding:40px 0">
<!--<h1>Scan-My-APK</h1>-->
<img src="images/BannerLogo2.jpg" id="Logo">
<!--<div class="wrapper"> -->
<!-- <h1>Test My APK Login </h1> -->
<!-- Testing <div id=resultMsg><?php if (isset($_POST['username'])) 
{ 
    echo $uname;} else {echo $result;
    //Insert go back link
    echo ("<a href=\"javascript:history.go(-1)\" title=\"Return to previous page\">&laquo; Go back!</a>");
} ?> 
</div> -->






        <!--================================================== -->
        
<div id="file" class="center box tab-pane active">
                      <!--class="margin-all-0"-->
      <form id="frm-file" class="margin-all-0" action="index.php" method="post" enctype="multipart/form-data">
    <div class="row">
        <div class="col-lg-6 col-sm-6 col-12">
       <!-- <div class="row" style ="width: 50%; display: inline-block;" >-->
            <h4><strong id="services" style="color: #4795e1;">scandroid</strong> is a free service that <strong id="services" style="color: #4795e1;">statically analyses the source code of Android APK files.</strong> 
            While utilising  <a href="https://www.virustotal.com/" target="_blank">VirusTotal</a>  to facilitate the quick detection of viruses, worms, trojans, and all kinds of malware.</h4>
            <div class="input-group" >
                <span class="input-group-btn">
                    <span class="btn btn-primary btn-file" >       <!--scan class action above-->
                        Choose File&hellip; 
                        <input id="file-choosen"  type="file" name="file1" >
                    </span>
                </span>
                
                <span id="file-name" class="form-control" style="-moz-user-select: none;text-align:left;">
           select a file
          </span>
                
                
            </div><!--end input-group-->
            <span class="help-block" style="width:75%; margin:5px auto;">
                By clicking 'Analyse', you consent to our 
                <a href="/scandroid/about/terms.php">Terms of Service</a> and allow scandroid to 
                share this file with the security community. See our 
                <a href="/scandroid/about/privacy.php">Privacy Policy</a> for details (maximum file size of 30MB).
            </span>
        </div>
    </div>
    
    
    
         <div>
        
        <input class="btn btn-primary btn-lg x2" type="button" value="Analyse" id="file-submit" onclick="uploadFile()"> <!--upload button -->
        </div> 
        
    <!--Setup progress bar and give it a width -->
    <div id="hashing">
        <progress id="progressBar" value="0" max="100" style="visibility:hidden; width: 500px; height: 25px; margin-top:3%"></progress>
        <h3 id="status1"></h3>        <!--holds the % number -->
        <p id="loaded_n_total"></p>
        <script src="scripts/progressBar.js"></script>
    </div>   
    
</form>  
   
        <!--================================================== -->



</div><!--end input-group-->

<script type="text/javascript"> 
    document.getElementById("file-choosen").onchange = function () {  //alert ("test");    
        var fullPath = document.getElementById("file-choosen").value;     //http://stackoverflow.com/questions/857618/javascript-how-to-extract-filename-from-a-file-input-control
        document.getElementById("file-name").innerHTML=fullPath;    
    }; 
 

  

</script>

<!--==============================================================================================-->



</div>
<!--=================================================================================-->

<div id="file-upload"></div>
<div id="report-data"></div>

</div>  <!--end div container-->


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



</body>
</html>

