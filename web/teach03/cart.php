<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
     <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="disc.css">
    <title>Cart</title>
  </head>  
  <body>
    <div class="jumbotron text-center">
      <div class="container">
      <h1>Disc Golf Distributor</h1>
      <p>Your most trusted disc supplier serving Southeastern Idaho.</p>
      </div>
    </div>	

    <div class="centerAll">
      <h2 class="heading">Shopping Cart</h2>	
      <hr>
      <?php
      $index = 0;
      foreach ($_SESSION["cart"] as $disc) {
  	  echo "$disc <br><br>";
  	  echo"<form method='post'>";
      echo"<button type='submit' id='remove' class='btn btn-info' name='button.$index' >Remove item</button>";
      echo"</form>";
      echo'button'.$index;
      echo"<hr>";
      $index++;
      }

      foreach($_POST as $name => $content) { // Most people refer to $key => $value
   echo "The HTML name: $name <br>";
   echo "The content of it: $content <br>";
}

      for($i = 0; $i < sizeof($_SESSION["cart"]); $i++){

           //echo "sizeof($_SESSION["cart"])<br>";
          if(array_key_exists("button_".$i, $_POST)) { 
              echo"REMOVED" . $i;
          } 
      }
      ?>  
    </div>	
  </body>
</html>