<?php
session_start();
?>

<?php
$_SESSION["cart"];
// Echo session variables that were set on previous page
  foreach ($_SESSION["cart"] as $disc) {
  	  echo $disc;
  }
?>


