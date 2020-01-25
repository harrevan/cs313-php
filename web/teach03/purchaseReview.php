<?php
// Start the session
session_start();
?>

<!DOCTYPE html>
  <head>
    <title>Disc Golf Distributor Purchase Review</title>
    <meta charset = "utf-8" />
    <link rel="stylesheet" type="text/css" href="disc.css">
  </head>
  <body>
    <h1>Disc Golf Distributor</h1>
    <?php
      // Get form values
      $discs = array($_POST["item1"],$_POST["item2"],$_POST["item3"],$_POST["item4"],$_POST["item5"],
                       $_POST["item6"],$_POST["item7"],$_POST["item8"],$_POST["item9"],$_POST["item10"]);
      $numItems = count($discs);
      $name = $_POST["fullname"];
      $address = $_POST["address"];
      $city = $_POST["cityName"];
      $state = $_POST["stateName"];
      $zip = $_POST["zipCode"];
      $phone = $_POST["phoneNumber"];
      $cardType = $_POST["ccType"];
      $cardExpDate = $_POST["date"];
      $total = $_POST["price"];
    
      
      // Store post values in a single session variable
      // source: https://stackoverflow.com/questions/14465464/storing-all-post-data-in-session
      $_SESSION["post-data"] = $_POST;
    
      
      // Add plastic type to cost for printing
      if($plastic == 8.99){
        $plastic = "DX plastic - \$8.99"; 
      } else if($plastic == 16.99){
        $plastic = "Champion plastic - \$16.99";
      } else {
        $plastic = "Star plastic - \$19.99";
      }
    ?>  
    <h2 id="newHead">Purchase Review Form</h2>  
    <div id="pReview">
      <h3>1. Customer Information</h3>
      <?php
        print("<p class='pPRev'>$name <br/> $address <br/> $city, $state $zip <br/> $phone</p>");
      ?>
      <hr>
      <h3>2. Payment Method</h3>
      <?php
        // Print card type, month name, and full expiration year
        $date = explode("/", $cardExpDate);
        if ($date[0] == 12){
          print("<p class='pPRev'><b>Card type: </b>$cardType<br/><b>Expiration Date: </b> December 20$date[1]</p>");
        } else if($date[0] == 11){
          print("<p class='pPRev'><b>Card type: </b>$cardType<br/><b>Expiration Date: </b> November 20$date[1]</p>");
        }
        else if($date[0] == 11){
          print("<p class='pPRev'><b>Card type: </b>$cardType<br/><b>Expiration Date: </b> November 20$date[1]</p>");
        }
        else if($date[0] == 10){
          print("<p class='pPRev'><b>Card type: </b>$cardType<br/><b>Expiration Date: </b> October 20$date[1]</p>");
        }
        else if($date[0] == 9){
          print("<p class='pPRev'><b>Card type: </b>$cardType<br/><b>Expiration Date: </b> September 20$date[1]</p>");
        }
        else if($date[0] == 8){
          print("<p class='pPRev'><b>Card type: </b>$cardType<br/><b>Expiration Date: </b> August 20$date[1]</p>");
        }
        else if($date[0] == 7){
          print("<p class='pPRev'><b>Card type: </b>$cardType<br/><b>Expiration Date: </b> July 20$date[1]</p>");
        }
        else if($date[0] == 6){
          print("<p class='pPRev'><b>Card type: </b>$cardType<br/><b>Expiration Date: </b> June 20$date[1]</p>");
        }
        else if($date[0] == 5){
          print("<p class='pPRev'><b>Card type: </b>$cardType<br/><b>Expiration Date: </b> May 20$date[1]</p>");
        }
        else if($date[0] == 4){
          print("<p class='pPRev'><b>Card type: </b>$cardType<br/><b>Expiration Date: </b> April 20$date[1]</p>");
        }
        else if($date[0] == 3){
          print("<p class='pPRev'><b>Card type: </b>$cardType<br/><b>Expiration Date: </b> March 20$date[1]</p>");
        }
        else if($date[0] == 2){
          print("<p class='pPRev'><b>Card type: </b>$cardType<br/><b>Expiration Date: </b> February 20$date[1]</p>");
        }
         else{
          print("<p class='pPRev'><b>Card type: </b>$cardType<br/><b>Expiration Date: </b> January 20$date[1]</p>");
        }    
      ?>
      <hr>
      <h3>3. Items In Cart</h3>
      <?php
        for($i = 0; $i < $numItems; $i++) {
            print("<p class='pPRev'>$discs[$i]</p>");        
        }      
      ?>
      <hr>
      <h3>4. Total</h3>
      <?php
        print("<p class='pPRev'><b>Order total:</b> \$$total</p>");
      ?>
      <div id="formCSS">
        <form action="confirmationPage.php" method="post" id="confirmation">
          <input type="Submit" name="confirm" value="Confirm" />
          <input type="Submit" name="cancel" value="Cancel" />
        </form>
      </div>
      <hr>
    </div>     
  </body>
</html>




