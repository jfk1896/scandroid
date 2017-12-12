<?php 
session_start();
header("Content-Type: application/json"); 
if(isset($_POST['limit'])){ 
    
    require_once("dbConnect.php");
    
    if (isset($_SESSION['id'])){
    
    $hash = $_SESSION['hash'];       
    }
    
    
    // It only has chars (A-F) and integers, and not greater than 32 characters in length
    if( preg_match('/^[a-f0-9]{32}$/', $hash) ){
        $hash = $_SESSION['hash'];
    
    }    
    else{
        $hash = '11111111111111111111111111111111';     
    } 
    
    
    

    
    
       
    
    $limit = preg_replace('#[^0-9]#', '', $_POST['limit']);  //filter everything but numbers
    //require_once("dbConnect.php"); 
    
    
    //$hash = '900b111f79365e7a9fd69c3060b7d9ee';
    
//====================================================================
//====================================================================
//********** Path needs to be taken from the reports table ***********
//====================================================================
//====================================================================    
    $i = 0; 
    $jsonData = '{';     
    $sqlString = "SELECT * FROM reports INNER JOIN files ON reports.fileHash = files.fileHash WHERE files.fileHash = '$hash' AND files.scanned = '1'"; 
//    $sqlString = "SELECT files.fileHash, reports.newFileInputStream, reports.newFileOutputStream, reports.newFileReader, reports.newFileWriter, reports.newFile, reports.createStatement, reports.execute, reports.executeQuery, reports.StatementExecute, reports.StatementExecuteQuery,reports.RuntimeGetRuntime, reports.RuntimeExec, reports.Process, reports.sendRedirect, reports.setStatus, reports.addHeader, reports.getParameter, reports.getHeader, reports.KeyStore, reports.PrivateKey, reports.SamlAuthToken, reports.plink, files.fileName, files.dateTime, files.package, files.version, files.scanned, reports.newFileInputStream + reports.newFileOutputStream + reports.newFileReader + reports.newFileWriter + reports.newFile AS `total1`, reports.createStatement + reports.execute + reports.executeQuery + reports.StatementExecute + reports.StatementExecuteQuery AS `total2`, reports.RuntimeGetRuntime + reports.RuntimeExec + reports.Process AS `total3`, reports.sendRedirect + reports.setStatus + reports.addHeader + reports.getParameter + reports.getHeader AS `total4`, reports.KeyStore + reports.PrivateKey + reports.SamlAuthToken AS `total5` FROM reports INNER JOIN files ON reports.fileHash = files.fileHash WHERE files.fileHash = '$hash' AND files.scanned = '1'"; 
    $reportCheck = mysqli_query($dbCon, $sqlString);
    while ($row = mysqli_fetch_array($reportCheck)) {
    $fileHash = $row['fileHash'];
    $newFileInputStream = $row['newFileInputStream'];
    $newFileOutputStream = $row['newFileOutputStream'];
    $newFileReader = $row['newFileReader'];
    $newFileWriter = $row['newFileWriter'];
    $newFile = $row['newFile'];
    $File_access_group = $row['File_access_group'];
    
    $createStatement = $row['createStatement'];
    $execute = $row['execute'];
    $executeQuery = $row['executeQuery'];
    $StatementExecute = $row['StatementExecute'];
    $StatementExecuteQuery = $row['StatementExecuteQuery'];
    $DB_access_group = $row['DB_access_group'];
    
    $RuntimeGetRuntime = $row['RuntimeGetRuntime'];
    $RuntimeExec = $row['RuntimeExec'];    
    $Process = $row['Process'];
    $External_process_group = $row['External_process_group'];
    
    $sendRedirect = $row['sendRedirect'];
    $setStatus = $row['setStatus'];    
    $addHeader = $row['addHeader'];
    $getParameter = $row['getParameter'];
    $getHeader = $row['getHeader'];
    $Http_redirect_group = $row['Http_redirect_group'];
    
    $KeyStore = $row['KeyStore'];
    $PrivateKey = $row['PrivateKey'];
    $SamlAuthToken = $row['SamlAuthToken'];
    $Keystore_group = $row['Keystore_group'];
    
    $plink = $row['plink'];
    $javaFiles = $row['javaFiles'];
    $fileHash = $row['fileHash'];
    $fileName = $row['fileName'];
    $dateTime = $row['dateTime'];
    $package = $row['package'];
    $version = $row['version'];
    $scanned = $row['scanned'];
    
    $error = $row['error'];
    
   
    $jsonData .= '"article'.$i.'":{ "err":"'.$error.'","fg":"'.$File_access_group.'","dg":"'.$DB_access_group.'","eg":"'.$External_process_group.'","hg":"'.$Http_redirect_group.'","kg":"'.$Keystore_group.'","fileHash":"'.$fileHash.'","f1":"'.$newFileInputStream.'","f2":"'.$newFileOutputStream.'","f3":"'.$newFileReader.'","f4":"'.$newFileWriter.'","f5":"'.$newFile.'","d1":"'.$createStatement.'","d2":"'.$execute.'","d3":"'.$executeQuery.'","d4":"'.$StatementExecute.'","d5":"'.$StatementExecuteQuery.'","e1":"'.$RuntimeGetRuntime.'","e2":"'.$RuntimeExec.'","e3":"'.$Process.'","h1":"'.$sendRedirect.'","h2":"'.$setStatus.'","h3":"'.$addHeader.'","h4":"'.$getParameter.'","h5":"'.$getHeader.'","k1":"'.$KeyStore.'","k2":"'.$PrivateKey.'","k3":"'.$SamlAuthToken.'","plink":"'.$plink.'","javaFiles":"'.$javaFiles.'","fileHash":"'.$fileHash.'","fileName":"'.$fileName.'","dateTime":"'.$dateTime.'","package":"'.$package.'","version":"'.$version.'","scanned":"'.$scanned.'"},';
    } 
    $jsonData = chop($jsonData, ",");
    

    $jsonData .= '}'; 
    echo ($jsonData); 
   
} 

?>