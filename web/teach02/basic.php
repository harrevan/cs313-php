<html>
<body>

Welcome <?php echo $_POST["name"]; ?><br>
Email: <a href="mailto:"<?php echo $_POST["email"]; ?> ><br>
Major: <?php echo $_POST["major"]; ?><br>
Comments: <?php echo $_POST["comment"]; ?><br>
Continents:
<?php
foreach($_POST["continent"] as $selected){
    echo $selected."</br>";
	
}
?>

</body>
</html>