<?php
session_start();
?>

<!DOCTYPE html>
  <head>
    <title>Disc Golf Distributor Confirmation Page</title>
    <meta charset = "utf-8" />
    <link rel="stylesheet" type="text/css" href="disc.css">
  </head>
  <body>
    <h1>Disc Golf Distributor</h1>
    <?php
      // Set variables to session values
      $discs = array($_SESSION["post-data"]["item1"], $_SESSION["post-data"]["item2"], $_SESSION["post-data"]["item3"],
                     $_SESSION["post-data"]["item4"], $_SESSION["post-data"]["item5"], $_SESSION["post-data"]["item6"],
                     $_SESSION["post-data"]["item7"], $_SESSION["post-data"]["item8"], $_SESSION["post-data"]["item9"],
                     $_SESSION["post-data"]["item10"]);
      $name = $_SESSION["post-data"]["fullname"];
      $address = $_SESSION["post-data"]["address"];
      $city = $_SESSION["post-data"]["cityName"];
      $state = $_SESSION["post-data"]["stateName"];
      $zip = $_SESSION["post-data"]["zipCode"];
      $phone = $_SESSION["post-data"]["phoneNumber"];
      $cardType = $_SESSION["post-data"]["ccType"];
      $cardExpDate = $_SESSION["post-data"]["date"];
      $total = $_SESSION["post-data"]["price"];
      
      //Tests to make sure variable values are correct
      //echo "Name is " . $name . ".<br>";
      //echo "State is " . $state . ".<br>";
      //echo "Total is " . $total . ".<br>";
      //echo "Disc 1 is " . $discs[0] . "<br>";
      //echo "Disc 2 is " . $discs[1] . "<br>";
        
         
      // Check which submit button was clicked. Display appropriate message.
      if($_POST["cancel"]) {
        print("<p class='confirm'>Your purchase has been canceled. Please visit us again soon!</p>");
      } else {
        print("<p class='confirm'>Thank you. Your purchase has been submitted.</p>");
      }
    ?>      
  </body>
</html>