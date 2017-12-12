<?php 
session_start();

    //remove rows from the database and return to the home page
    $myHash = $_SESSION['hash'];
    
    include_once("dbConnect.php");         //connectst to the database *** need to use an update command if we want to allow rescans
    $reportsRemove = "DELETE FROM reports WHERE fileHash = '$myHash'";    //delete row from reports table useing myHash key
    $reportRemQuery = mysqli_query($dbCon, $reportsRemove);    //run the insert query    
    
    $filesRemove = "DELETE FROM files WHERE fileHash = '$myHash'";    //delete row from files table useing myHash key
    $fileRemQuery = mysqli_query($dbCon, $filesRemove);    //run the insert query
    
    header("Location: index.php");

?>