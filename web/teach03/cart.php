<?php
session_start();
?>

<?php
// Echo session variables that were set on previous page
  foreach ($_SESSION["cart"] as $disc) {
  	  echo $disc;
  }
?>


