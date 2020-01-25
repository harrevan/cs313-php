<?php
session_start();
?>

<?php
$discs = $_SESSION["cart"];
// Echo session variables that were set on previous page
  foreach ($discs as $disc) {
  	  echo $disc;
  }
?>


