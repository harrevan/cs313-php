<?php
session_start();
?>

<?php
// Echo session variables that were set on previous page
echo  $_SESSION["cart"][0];
echo  $_SESSION["cart"][1];
?>


