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
    <a href="cart.php">Back to Cart</a>
    <div class="centerAll">
      <h2 class="heading">Checkout</h2>	
      <hr>
    </div>
      <div>
        <form action="confirmation.php" method="post">
          <label>First Name</label>
          <br>
          <input type="text" id="name" name="firstName" placeholder="William">
          <br><br>
          <label>Last Name</label>
          <br>
          <input type="text" id="name" name="lastName" placeholder="Wallace">
          <br><br>
           <label>Phone Number</label>
          <br>
          <input type="text" id="phone" placeholder="123-123-1234" name="phoneNumber">
          <br><br>
          <label>Billing Address</label>
          <br>
          <input type="text" id="adress" name="address" placeholder="115 John Adams Street">
          <br><br>
          <label>City</label>
          <br>
          <input type="text" placeholder="Idaho Falls" name="cityName">
          <br><br>
          <label>State</label>
          <br>
          <input type="text" id="state" placeholder="ID" name="stateName">
          <br><br>
          <label>Zip Code</label>
          <br>
          <input type="text" id="zipc" placeholder="83401" name="zipCode">
          <br><br>
          <input type="submit" id="add" class="btn btn-info" value="Complete Purchase">
        </form>
      </div>    	
  </body>
</html>