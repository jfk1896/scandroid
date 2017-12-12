<?php
session_start();
if (isset($_SESSION['id'])){
    //place stored session variables into local PHP variable
    $id = $_SESSION['id'];
    //$uname = $_SESSION['username'];
    //$result = "Test Variables: <br/> Username: ".$uname. "<br/> Id: ".$uid;
} else {
    $result = " Illegal session! ";
    //header('Location: index.php');       //returns user to home page even if not logged in
    //header("location: index.php?error_message=$result");
    
    //this produces an error message and redirects users to the home screen
    echo '<script type="text/javascript">
            alert("Naughty! Naughty! you need to be logged into Test-My-APk!"); 
            window.location.href = "index.php";</script>';            

}

//Make sure file not empty
if (!empty($_FILES["file1"]["name"])) {

//specify the file and it's array elements to get specifics about the file
//using the same elements from the formdata.append contained in the user.php script
$fileName = $_FILES["file1"]["name"];     //The file name
$fileTmpLoc = $_FILES["file1"]["tmp_name"];     //The file in PHP temp directory
$fileType = $_FILES["file1"]["type"];     //The file type
$fileSize = $_FILES["file1"]["size"];     //The size of the file in bytes
$fileErrorMsg = $_FILES["file1"]["error"];     //  0=false and 1=true
//$myhash = md5_file($_FILES['file1']['file1']);
if (($fileSize > 31457280)){               
        echo 'File too large. File must be less than 30 megabytes.';  
        exit(); 
    }


//====================================================================
/*hash the uploaded file " "
$file_path = "Temp-APK/$fileName";              //might need this later
explode returns the blank delimiter if the nothing in the second parameter*/
//-----$result = explode(" ", exec("echo -n $fileName | md5sum"));   //executes md5sum saving it to an array
//$result = explode(" ", exec("echo | md5sum $fileName "));   //executes md5sum saving it to an array


//echo "Hash = ".$result[0]."<br />";

//-----$myHash = $result[0];
//$myHash = serialize($result);
//////////////////echo "Hash = $myHash","<br />";


$md5file = md5_file($fileTmpLoc);
$myHash = $md5file;


// It only has chars (A-F) and integers, and not greater than 32 characters in length
if( preg_match('/^[a-f0-9]{32}$/', $myHash) ){
    $_SESSION['hash'] = $myHash;
    
}    
    else{
        echo 'Apologies something went wrong with the upload!';            //Error message if not a valid Md5
        exit();       
    } 


                              //create a session hash


//============Need to look up the reports table here==================
//=======================If scanned already===========================
//=============update the users file with the hash ===================
//====================================================================
    
    include_once("dbConnect.php");
    
    $sqlHash = "SELECT fileHash FROM files WHERE fileHash ='$myHash' AND scanned = '1'";    
    $reportExist = mysqli_query($dbCon, $sqlHash);
    
    //count the number of row to see if the file does not exists
    $rNum = mysqli_num_rows($reportExist);
    if($rNum == 0){
  
     //echo "I'm not scanned";
     //exit(); 
    
    
   
//====================================================================


//http://stackoverflow.com/questions/10456113/php-check-file-extension-in-upload-form
//only allow apk extentions
$allowed =  array('apk','apk');            //allowed extentions      
$filename = $_FILES['file1']['name'];       //set the paramaters
$ext = pathinfo($filename, PATHINFO_EXTENSION);       //variable to hold the extention
if(!in_array($ext,$allowed) ) {
    echo 'Only apk files may be uploaded';            //Error message if not a valid extention
    exit();                                           //exit the upload script
}



//if the file is in the temporary location
//pass to parameters - the $fileTmpLoc where the file is currently and then the dest location
if (move_uploaded_file($fileTmpLoc, "scanner/uploads/$fileName")){    //keep orginal name or change $fileName
   
   chmod("scanner/uploads/$fileName", 0777);
   //  window.location = 'reports.php'; 
   
    //Use database connect script
    include_once("dbConnect.php");         //connectst to the database *** need to use an update command if we want to allow rescans
    $sqlfile = "INSERT INTO files (fileHash, fileName, scanned) VALUES ('$myHash', '$fileName', '0');";    //insert file to DB useing myHash key
    $query = mysqli_query($dbCon, $sqlfile);    //run the insert query
    
    
    $sqlRep = "INSERT INTO reports (fileHash) VALUES ('$myHash');";    //insert file to DB useing myHash key
    $query = mysqli_query($dbCon, $sqlRep);    //run the insert query
    
    echo "Click view report to commence scanning: </br> ";
    
     echo "<a href='reports.php' id='dynLink' >View Report</a>"; ///Dynamic link auto clicked by JS function
     
    
    
   
}//end move file 
else {
    echo "move_uploaded_file function failed";
}


}//end if checking if report already scanned  
else {
  

   // if previously scanned this link is created and auto clicked to show the report
    echo "<a href='reports.php' id='dynLink' >View Report</a>";


    //echo "$fileName was previously scanned! ";
     }





}//end if file not choosen
else{
             
    echo "ERROR: You must browse for a file before clicking upload!";
    exit();
}

?>
