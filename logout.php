<?php
session_start();
session_destroy();
if (isset($_SESSION['username'])) { 
    $msg = "Log out successful";
    header('Location: index.php');       //returns user to home page if logout successfull
} else {
    $msg = "<h2>Could not Log out try again</h2>";
    header('Location: index.php');       //returns user to home page even if not logged in
}
?>

<html>
<body>

<!--Code for testing logout -->
<!--<?php echo $msg; ?><br>
<p><a href="/Test">Click here</a> to return to our home page </p> -->



</body>
</html>
