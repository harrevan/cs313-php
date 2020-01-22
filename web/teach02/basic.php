<html>
<body>

Welcome <?php echo $_POST["name"]; ?><br>
Email: <?php echo $_POST["email"]; ?><br>
Major: <?php echo $_POST["major"]; ?><br>
Comments: <?php echo $_POST["comment"]; ?><br>
Continents:
<?php
for($i=0; $i < 7; $i++)
{
	 echo $_POST["continent"][$i] . " ";
}
?>

</body>
</html>