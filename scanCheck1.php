<?php
session_start();
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");


$hash = $_SESSION['hash'];


    // It only has chars (A-F) and integers, and not greater than 32 characters in length
    if( preg_match('/^[a-f0-9]{32}$/', $hash) ){
        $hash = $hash;
    
    }    
    else{
        $hash = '11111111111111111111111111111111';     
    } 



$conn = new mysqli("localhost", "root", "project()bn311", "scandroid");


$result = $conn->query("SELECT * FROM reports INNER JOIN files ON reports.fileHash = files.fileHash WHERE files.fileHash = '$hash' AND files.scanned = '1'");

$outp = "[";
while($rs = $result->fetch_array(MYSQLI_ASSOC)) {
    if ($outp != "[") {$outp .= ",";}
    $outp .= '{"fn":"'  . $rs["fileName"] . '",';
    $outp .= '"fv":"'  . $rs["version"] . '",';
    $outp .= '"fp":"'  . $rs["package"] . '",';
    $outp .= '"fd":"'   . $rs["fileHash"] . '",';
    $outp .= '"ft":"'. $rs["dateTime"] . '",';
    $outp .= '"jf":"'. $rs["javaFiles"] . '",';
    
    $outp .= '"File_access_group":"'  . $rs['File_access_group'] . '",';
    $outp .= '"DB_access_group":"'  . $rs['DB_access_group'] . '",';
    $outp .= '"External_process_group":"'  .  $rs['External_process_group'] . '",';
    $outp .= '"Http_redirect_group":"'  . $rs['Http_redirect_group'] . '",';
    $outp .= '"Keystore_group":"'  . $rs['Keystore_group'] . '"}';
}
$outp .="]";

$conn->close();

echo($outp);
?>