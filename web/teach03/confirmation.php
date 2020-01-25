<?php
    session_start();
    $first_name = filter_var($_POST["firstName"], FILTER_SANITIZE_STRING);
    $last_name = filter_var($_POST["lastName"], FILTER_SANITIZE_STRING);
    $phone = filter_var($_POST["phoneNumber"], FILTER_SANITIZE_NUMBER_INT);
    $address = filter_var($_POST["address"], FILTER_SANITIZE_STRING);
    $city = filter_var($_POST["cityName"], FILTER_SANITIZE_STRING);
    $state = filter_var($_POST["stateName"], FILTER_SANITIZE_STRING);
    $phone = filter_var($_POST["zipCode"], FILTER_SANITIZE_NUMBER_INT);
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
    <a href="browse.php">Back to cart</a>
    <div class="centerAll">
      <h2 class="heading">Purchase Confirmed!</h2>	
      <h3>You have purchased the following items:</h3>
      <?php
          foreach ($_SESSION["cart"] as $disc) {
          echo "$disc <br><br>";
        }
      ?>
      <hr>
      <h3>Your address information: </h3>
      <p>Name: <?php echo $first_name . ' ' . $last_name ?></p>
      <p>Phone: <?php  ?></p>
      <p>Address: <?php  ?></p>

	
  </body>
</html>