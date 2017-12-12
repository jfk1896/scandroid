<?php
session_start();

//$_SERVER['REQUEST_URI'];

if (isset($_SESSION['id'])){
    //place stored session variables into local PHP variable
    $uid = $_SESSION['id'];
    $uname = $_SESSION['username'];
    $result = "Test Variables: <br/> Username: ".$uname. "<br/> Id: ".$uid;
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
<script src="scripts/indexmin.js"></script>

<!--=================================================================================-->
<script type="text/javascript"> 

var myTimer;           //initialise the timer outside the function

/*function windowpop(url, width, height) {
    var leftPosition, topPosition;
    //Allow for borders.
    leftPosition = (window.screen.width / 2) - ((width / 2) + 10);
    //Allow for title and status bars.
    topPosition = (window.screen.height / 2) - ((height / 2) + 50);
    //Open the window.
    window.open(url, "Window2", "status=no,height=" + height + ",width=" + width + ",resizable=yes,left=" + leftPosition + ",top=" + topPosition + ",screenX=" + leftPosition + ",screenY=" + topPosition + ",toolbar=no,menubar=no,scrollbars=no,location=no,directories=no");
}*/

function ajax_json_data(){ 
    var databox = document.getElementById("databox");            //reference for html div
    var arbitrarybox = document.getElementById("arbitrarybox");   //reference for html div
    var hr = new XMLHttpRequest(); 
    hr.open("POST", "scanCheck.php"); 
    hr.setRequestHeader("Content-type", "application/x-www-form-urlencoded"); 
    
     document.getElementById('databox').style.visibility="visible";     //make the report button vissible
     document.getElementById('databox').style.height = "200px";
    
    
    
    
    
    
    hr.onreadystatechange = function() { 
        if(hr.readyState == 4 && hr.status == 200) 
        { 
          
            // variable d for data that the json object that comes back 
            var d = JSON.parse(hr.responseText); 
            ////////document.getElementById("databox").innerHTML = "Upload Failed1!";   
            //////target item directly like next line or loop using the following for loop
  //	          arbitrarybox.innerHTML = d.arbitrary.itemcount;  //itemcount should return 2 from arbitrary data at bottom on php page
            
            databox.innerHTML = "";                  //always empties each time a new request is made
            document.getElementById('myButton').style.visibility="hidden";
            document.getElementById('databox').style.visibility="visible";
            
            
            
            for(var o in d){                        //variable o object in data
            
                if(d[o].path)            //to grab an object place object inside the data variable has to have username property
                { 
                    // use paragraphs to display the returned data
                    //databox.innerHTML += '<p><a href="page.php?id='+d[o].path+'">'+d[o].path+'</a><br>';   //create a link using the returned variable
                  //databox.innerHTML += '<p><a href="'+d[o].path+'">'+d[o].path+'</a><br>';   //create a link using the returned variable
                  //databox.innerHTML += ''+d[o].path+'</p>'; 
                  
                  //databox.innerHTML += '<div id="active-tab">';                      
                  databox.innerHTML += '<table class="table table-striped" id="antivirus-results"><thead><tr><th class="header headerSortDown vt-width-30">Signature</th><th id="results-header" style="cursor:pointer;">Found</th><th>Date</th></tr></thead><tbody>'; //Table start
                  //databox.innerHTML += '';
                 // databox.innerHTML += '';
                 // databox.innerHTML += '';
                  
                  //databox.innerHTML += '<tr>';  //Row Start
                  databox.innerHTML += '<table class="table table-striped" id="antivirus-results"><tr><td class="ltr"><a href="'+d[o].path+'">'+d[o].path+'</a></td><td class="ltr text-green">'+d[o].path+'</td><td class="ltr">'+d[o].path+'</td></tr>'; //Column one
                  databox.innerHTML += '<table class="table table-striped" id="antivirus-results"><tr><td class="ltr"><a href="'+d[o].path+'">'+d[o].path+'</a></td><td class="ltr text-green">'+d[o].path+'</td><td class="ltr">'+d[o].path+'</td></tr>'; //Column one
                  databox.innerHTML += '<table class="table table-striped" id="antivirus-results"><tr><td class="ltr"><a href="'+d[o].path+'">'+d[o].path+'</a></td><td class="ltr text-green">'+d[o].path+'</td><td class="ltr">'+d[o].path+'</td></tr>'; //Column one
                  //databox.innerHTML += '<td class="ltr text-green">'+d[o].path+'</td>'; //Column one
                  //databox.innerHTML += '<td class="ltr">'+d[o].path+'</td>'; //Column one
                  //databox.innerHTML += '<tr>';  //Row Start
                  
                  //databox.innerHTML += '</tbody></table></div>'; //<br>';   //Table end
                    
                  
                  //databox.innerHTML += ''+d[o].path+'</p>';
                    
                    //<not working> databox.innerHTML += '<p><a href="'+d[o].path+'" onclick="location.href='+d[o].path';return false;">'+d[o].path+'</a><br>';   //create a link using the returned variable
                    //working>databox.innerHTML += '<p><a href="'+d[o].path+'" onclick="location.href='+d[o].path+';return false;">'+d[o].path+'</a><br>';   //create a link using the returned variable
   //currenntly hidden
   databox.innerHTML += '<p><a href="'+d[o].path+'" target="_blank" onclick="return windowpop('+d[o].path+', 545, 433)">'+d[o].path+'</a><br>';   //create a link using the returned variable
                  //  databox.innerHTML += '<p><a href="'+d[o].path+'" javascript="window.open('+d[o].path+', 'newwindow', 'width=300, height=250'); return false;">'+d[o].path+'</a><br>';   //create a link using the returned variable
                  // databox.innerHTML += '<p><a href="javascript:window.open('+d[o].path+','blank')">'+d[o].path+'</a><br>';
                    databox.innerHTML += ''+d[o].path+'</p>';                    
                    //databox.innerHTML += '<option value="'+d[o].username+'">'+d[o].username+'</option>'; //testing
                    //databox.innerHTML += '<p>'+d[o].id+'</p>'; 
                    //databox.innerHTML += '<p>'+d[o].username+'</p>';
                    
                    
     //databox.innerHTML += '<p><a href="'+d[o].path+'" target="_blank" onclick="return windowpop('+d[o].path+', 545, 433)">'+d[o].path+'</a><br></p>';              
    
       //databox.innerHTML += window.location='+d[o].path+'; <button onclick="'+d[o].path+'">Visit Page Now</button></p>';
    
                    
                   // report button
                    document.getElementById('databox1').style.visibility="visible";     //make the report button vissible
    //don't hide                document.getElementById('databox').style.visibility="hidden";     //make the report button vissible
                    document.getElementById('databox').style.height = "auto";
                    document.getElementById('myButton').style.visibility="visible";     //make the report button vissible
                    document.getElementById('myButton').onclick = function() {location.href=d[o].path;}   //change the report button link path
                    
                    clearTimeout(myTimer);  //this cancels the database query after 

                    /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
                    var xmlhttp = new XMLHttpRequest();
                    var url = "scanCheck1.php";

                    xmlhttp.onreadystatechange=function() {
                    if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                        myFunction(xmlhttp.responseText);
                        }
                    }
                    xmlhttp.open("GET", url, true);
                    xmlhttp.send();
                    
                    function myFunction(response) {
                        var arr = JSON.parse(response);
                        var i;
                        var out = '<table class="table table-striped" id="antivirus-results">';
                        
                        for(i = 0; i < arr.length; i++) {
                            out += '<tr><td class="ltr">' + 
                            arr[i].fileHash +
                            '</td><td class="ltr text-green">' +
                            arr[i].scanned +
                            '</td><td class="ltr">' +
                            arr[i].scanDate +
                            '</td></tr>';
                            }
                        //out += "</table>"
                        document.getElementById("databox2").innerHTML = out;
                        }
                    //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
               //  location.reload(true);   
               // window.location = 'reports.php';       //returns user to home page even if not logged in


                    
                   
                } else{ databox.innerHTML = "Please wait...";}   // displayed while report is being scanned
            }//else{ alert('error');}
        }
    }
    hr.send("limit=2");                       //variable and value we are sending to the php file
    
    //////////////////////////////////////////////////////////////////////////////////////////////////////////////
    ///////////////////////////////////change this to an animated gif when its working////////////////////////////
    /////////////////////////////////////////////////////////////////////////////////////////////////////////////
    databox.innerHTML = "requesting...";      //prints to screen while request is happening
    myTimer = setTimeout('ajax_json_data()',6000);   //set the timer to execute code after EVERY 6 seconds - immediate first time
    //clearTimeout(myVar);
    
    
    } 

    
    
    
</script> 
<!--=================================================================================-->

<!-- error message if you try to open user page without logging in -->

<!--<script> 
function _(el){
    return document.getElementById(el);   /*get element will be required a lot - using a return
                                            function means it can be called with and _ symbol */
}

function uploadFile(){
    //create variable using the document.get element (_) to the file named in the html (file1)
    //And target its files array first element
    var file = _("file1").files[0];
    //***for testing**** view the name-size and type even before the upload button is pushed
    //alert(files.name+" | "+file.size+" | "+ file.type);
    
    var formdata = new FormData();    //new form data object instance
    formdata.append("file1", file);   //add to file1 and reference the object file above

    //build the ajax request
    var ajax = new XMLHttpRequest();
    
    //need to add event listeners for the different events
    //Also need to write 4 functions for the below handlers -progress-complete-error-abort
    ajax.upload.addEventListener("progress", progressHandler, false);  /*called everytime there is
                                                                       new loaded bytes. Also
                                                                       the upload event so it can 
                                                                       be monitored as it uploads*/
    ajax.addEventListener("load", completeHandler, false);
    ajax.addEventListener("error", errorHandler, false);
    ajax.addEventListener("abort", abortHandler, false);
    
    /*open the ajax and pass it two parameters post and the php parser file that will be used
    to upload the file to the server*/
    ajax.open("POST", "file_upload_parser.php");
    ajax.send(formdata);     //we are going to send form data that has the file appended to it above
  
}
//pass event argument to the progressHandler
function progressHandler(event){
    //document.get element    for testing how much loaded and total
    _("loaded_n_total").innerHTML = "Uploaded "+event.loaded+" bytes of "+event.total;
    var percent = (event.loaded / event.total) * 100;
    _("progressBar").value = Math.round(percent);
    _("status").innerHTML = Math.round(percent)+"% uploaded... Please wait"; 

}

//pass event argument to the completeHandler which is tied to the load event
function completeHandler(event){
    _("status").innerHTML = event.target.responseText;  //response back from php file     
    _("progressBar").value = 0;   //document.get element and set the progress back to zero

}

//pass event argument to the errorHandler to report error message
function errorHandler(event){
    _("status").innerHTML = "Upload Failed!";  //response back from php file     
 
}

//pass event argument to the abortHandler which is like a cancel listener
function abortHandler(event){
    _("status").innerHTML = "Upload Aborted!";  //response back from php file     
 
}


//src="scripts/progressBar.js">
</script> -->




<title>Test-My-APK</title>

    <link rel="stylesheet" type="text/css" href="css/bmin20140201.css">



<style type="text/css">


body {
    font-family: "Helvetica Neue",Helvetica,Arial,sans-serif;
    font-size: 13px;
    line-height: 20px;
    color: #333;
}
html {
    font-size: 100%;
}

html {
    font-family: "Helvetica Neue",Helvetica,Arial,sans-serif;
}
h1 {
    font-size: 24px;
    text-align: center;
}
#status {
    font-size: 18px;
    text-align: center;
    float: bottom;
}

#wrapper {
    position: absolute;
    width: 100%;
    top: 30%;
    margin-top: -50px;/* half of the form height*/
}
#resultMsg {
    position: absolute;  /* needs this to keep the output as a block*/
    font-weight:bold;  /* this works*/
    left:600px;    /* this works*/
    margin: 25px; /* this works*/

}
#logoutPos{

   position:fixed;
   right:30px;
   top:30px;
}

div#databox { 
    padding:12px; 
    background: #F3F3F3; 
    border:#CCC 1px solid; 
    width: 900px;                     /*550px;*/ 
    height:310px; 
} 

div#databox1 { 
    padding:12px; 
    background: #F3F3F3; 
    border:#CCC 1px solid; 
    width:550px; 
    height:310px; 
} 

input[type="file"],input[type="image"],input[type="submit"],input[type="reset"],input[type="button"],input[type="radio"],input[type="checkbox"]{
	width:auto
}

select,input[type="file"]{
	height:30px;
	*margin-top:4px;
	line-height:30px
}


#frm-contact input[type="text"],#frm-contact select,#frm-contact textarea{
	width:350px
}


div#box{
	width:600px
}





div.file-chooser span.file-name{       /*Most importatnt positions the input box*/
	display:block;
	float:left;
	overflow:hidden;
	padding:0 10px;
	white-space:nowrap;
	border-right:1px solid #bbb;
	color:#777;
	font-size:11px;
	width:330px;
	height:24px;
	line-height:24px;
	margin:2px 0 2px 2px;
}

div.file-chooser input{   /*this changes the input box from the original format*/
	/*border:medium none;*/
	border:1px solid #bbb;
	bottom:0;
	height:20px;
	line-height:20px;
	width:460px;
	position:absolute;
	left:0;
	top:0;
	cursor:pointer;
	opacity:0;                  /*This hides the selected file name from appearing*/
	outline:0;
	filter:alpha(opacity=0);
	-khtml-opacity:0;
	-moz-opacity:0;
}

.fileinput-button{
	position:relative;
	overflow:hidden;
	float:left;
	margin-right:4px
}


.fileinput-button input{
	position:absolute;
	top:0;
	right:0;
	margin:0;
	opacity:0;
	filter:alpha(opacity=0);
	transform:translate(-300px,0) scale(4);
	font-size:23px;
	direction:ltr;
	cursor:pointer
}


div.file-chooser,div.url-chooser,span.action{
	background-image:url("/Test/static/img/sprite.png");
	background-repeat:no-repeat
}   /*This seems to have no effect*/

div.file-chooser,div.url-chooser{
	background-position:left -297px;
	height:28px;
	width:460px;
	overflow:hidden;
	position:relative
}





span.action{                /*changes the choose button*/
	background-position:right -409px;
	height:24px;
	line-height:24px;
	background-color:#fff;
	font-size:11px;
	font-weight:bold;
	text-align:center;
	text-shadow:0 1px 0 #fff;
	width:107px;
	display:inline;
	float:left;
	overflow:hidden;
	padding:2px 0;
	cursor:pointer
}

div.file-chooser:hover,div.url-chooser:hover{
	background-position:left -353px
}

div.file-chooser:hover span.action,div.url-chooser:hover span.action{
	background-position:right -437px
}

/*=================================================*/




.center {
    text-align: center;
    margin-left: auto;
    margin-right: auto;
}



</style>

</head>


<body>

<!--<div class="wrapper"> -->
<!-- <h1>Test My APK Login </h1> -->
<div id=resultMsg><?php if (isset($_POST['username'])) 
{ 
    echo $uname;} else {echo $result;
    //Insert go back link
    echo ("<a href=\"javascript:history.go(-1)\" title=\"Return to previous page\">&laquo; Go back!</a>");
} ?> 
</div>



<form align="right" name="form1" method="post" action="logout.php">
  <label id="logoutPos">
  <input name="submit2" type="submit" id="submit2" value="log out">
  </label>
</form>

<!--<div class="wrapper"> -->
<!-- <h1>Test My APK Login </h1> -->
<!--<?php
if (isset($_POST['username']))
//echo $result
//echo "<div style=\"float:bottom;\">" . $result . "</div>";
//echo "<span class=\"resultMsg\">$result</span>";
//echo "(<div style='float: right;'>", $result, "</div>)";
//echo "<span style=\"font-size:14px; color:#538b01;\">".$result."</span>";

//echo '<div class=\"resultMsg\">';
//echo $result;
//echo '</div>';
?>   -->

<!-- <\div>  -->

   <!--End of wrapper -->


<h2>HTML File Upload Progress Bar</h2>

<!--setup form - encryption type and method-->
<!-- ///<form id="upload_form" action="user.php" enctype="multipart/form-data" method="post">
   <input type="file" name="file1" id="file1" style = "border: 1px dashed #BBB; width: 400px;"><br>  ///-->           
<!-- ///    <input type="button" value="Upload File" id="file-submit" onclick="uploadFile()">///--> <!--upload button -->
    <!--Setup progress bar and give it a width -->
 <!-- ///   <progress id="progressBar-" value="0" max="100" style="width: 300px;"></progress>
    <h3 id="status"></h3>   ///-->     <!--holds the % number -->
 <!-- ///   <p id="loaded_n_total"></p>
    <script src="scripts/progressBar.js"></script>

</form>///-->

<!--==============================================================================================-->
<div id="file" class="center box tab-pane active">
      <form id="frm-file" class="margin-all-0" action="user.php" method="post" enctype="multipart/form-data">
          <div class="file-chooser center">
          <input id="file-choosen" type="file" name="file1" size="50">        <!--onchange="myFunction()-->
          <span id="file-name" class="file-name" style="-moz-user-select: none;text-align:left;">
           select a file
          </span>
          <span class="action" style="-moz-user-select:none; " >
            Choose File
          </span>
        
        </div>
        
     <div>   
        <input type="button" value="Upload File" id="file-submit" onclick="uploadFile()"> <!--upload button -->
    <!--Setup progress bar and give it a width -->
        <progress id="progressBar" value="0" max="100" style="width: 300px;"></progress>
        <h3 id="status1"></h3>        <!--holds the % number -->
        <p id="loaded_n_total"></p>
        <script src="scripts/progressBar.js"></script>
     </div>   
        


</form>

</div>

<script type="text/javascript"> 
    document.getElementById("file-choosen").onchange = function () {  //alert ("test");    
        var fullPath = document.getElementById("file-choosen").value;     //http://stackoverflow.com/questions/857618/javascript-how-to-extract-filename-from-a-file-input-control
        document.getElementById("file-name").innerHTML=fullPath;    
    }; 
 

  

</script>

<!--==============================================================================================-->




<!--///////////////////////////////////////////////////-->
<!--///////Session Hash doesn't update **delete later**/////-->
<!--///////////////////////////////////////////////////-->
<!--<div id="file-upload"><?php if (isset($_SESSION['hash'])){
    if (isset($_SESSION['id']))
        $myHash = $_SESSION['hash'];     //***session hash passed from file_upload_parser
echo $myHash; }?></div> ///////////////////////////////////////////////////-->


<!-- <body onload="report();">

<script type="text/javascript"> 
function report()
{
document.getElementById('division').innerHTML= event.target.responseText; 
}
</script>   -->

<!--=================================================================================-->
<h2>Timed JSON Data Request Random Items Script</h2> 
<div id="databox"></div> <div id="arbitrarybox"></div> <script>ajax_json_data();</script> 
<!--=================================================================================-->
<!--<div id="databox1" style="visibility:hidden">-->
<div id="databox1" style="visibility:visible">

<table class="table table-striped" id="antivirus-results">
<thead>
<tr>
<th class="header headerSortDown vt-width-30">Signature</th>
<th id="results-header" style="cursor:pointer;">Found</th>
<th>Date</th></tr></thead>
<tbody id="databox2"></tbody>
</table>


<!--Test button made visible when a report is returned-->
<input id="myButton" style="visibility:hidden" type="button" value="report"> 


<!--================================================================-->
<script>

</script>

      
<!--================================================================-->



</div>
<!--=================================================================================-->

<div id="file-upload"></div>
<div id="report-data"></div>


</body>
</html>

