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
    <a href="browse.php">Back to cart</a>
    <a href="confirmation.php" class="linkRight">Checkout</a>
    <div class="centerAll">
      <h2 class="heading">Checkout</h2>	
      <hr>
    </div>
      <div class="inline">
        <label>First Name</label>
        <br>
        <input type="text" id="name" name="firstName" placeholder="William">
        <span class="error" id="fname">Please enter your first name</span>
        <br>
        <label>Last Name</label>
        <br>
        <input type="text" id="name" name="lastName" placeholder="Wallace">
        <span class="error" id="lname">Please enter your last name</span>
        <br>
         <label>Phone Number</label>
        <br>
        <input type="text" id="phone" placeholder="123-123-1234" name="phoneNumber">
        <span class="error" id="ph">Please enter your phone number</span>
        <br>
        <label>Billing Address</label>
        <br>
        <input type="text" id="adress" name="address" placeholder="115 John Adams Street">
        <span class="error" id="addy">Please enter your street address</span>
        <br>
        <label>City</label>
        <br>
        <input type="text" placeholder="Idaho Falls" name="cityName">
        <span class="error" id="city">Please enter your city</span>
        <br>
        <label>State</label>
        <br>
        <input type="text" id="state" placeholder="ID" name="stateName">
        <span class="error" id="st">Please enter your state abbreviation in the format: AL</span>
        <br>
        <label>Zip Code</label>
        <br>
        <input type="text" id="zipc" placeholder="83401" name="zipCode">
        <span class="error" id="zip">Please enter your 5 digit zip code</span>
      </div>    	
  </body>
</html>