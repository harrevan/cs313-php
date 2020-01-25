
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <!--Include Bootstrap compiled CSS. Most of the CSS in this page consists of built-in Bootstrap classes. -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <link rel="stylesheet" type="text/css" href="disc.css">
    
    <!--Include Bootstrap compiled JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous">
    </script> 
    <title>Disc Golf Distributor</title>
  </head>
  <?php
      session_start();
  ?>
  <body>
    <div class="jumbotron text-center">
      <div class="container">
        <h1>Disc Golf Distributor</h1>
        <p>Your most trusted disc supplier serving Southeastern Idaho.</p>
      </div>
    </div>

    <?php
         //$discs = array();
         if(!isset ($_SESSION["cart"])){
             $_SESSION["cart"] = array();
         }

         $champ = "$15.00";
         $dx = "$9.00";
         $star = "$17.00";
         $boss = "Boss- Champion plastic ". "Price: " . "<b>$champ</b>";
         $destroyer = "Destroyer- Champion plastic " . "Price: " .  "<b>$champ</b>";
         $beast = "Beast- DX plastic ". "<b>$dx</b>";
         $road_runner = "Road Runner- Star plastic " . "Price: " .  "<b>$star</b>";
         $wraith = "Wraith- Star plastic " . "<b>$star</b>";
         $banshee = "Banshee- Champion plastic " . "Price: " . "<b>$champ</b>";
         $eagle = "Eagle- DX plastic " . "Price: " . "<b>$dx</b>";
         $leopard = "Leopard- DX plastic " . "Price: " . "<b>$dx</b>";
         $teebird = "Teebird- Star plastic " . "Price: " .  "<b>$star</b>";
         $aviar = "Aviar- DX plastic " . "Price: " . "<b>$dx</b>";
         $dart = "Dart- DX plastic " . "Price: " . "<b>$dx</b>";
         $pig = "Pig- DX plastic " . "Price: " . "<b>$dx</b>";
         $slammer = "Slammer- Champion plastic " . "Price: " . "<b>$champ</b>";

         

  //$boss, $destroyer, $beast, $road_runner, $wraith, $banshee, $leopard, $teebird, $aviar, $pig, $slammer


         if(array_key_exists('boss_disc', $_POST)) { 
             addToCart($boss);
         } 
         else if(array_key_exists('destroyer_disc', $_POST)) { 
             addToCart($destroyer);
         } 
         else if(array_key_exists('beast_disc', $_POST)) { 
             addToCart($beast);
         } 
         else if(array_key_exists('road_runner_disc', $_POST)) { 
             addToCart($road_runner);
         } 
         else if(array_key_exists('wraith_disc', $_POST)) { 
             addToCart($wraith);
         } 
         else if(array_key_exists('banshee_disc', $_POST)) { 
             addToCart($banshee);
         } 
         else if(array_key_exists('eagle_disc', $_POST)) { 
             addToCart($eagle);
         } 
         else if(array_key_exists('leopard_disc', $_POST)) { 
             addToCart($leopard);
         } 
         else if(array_key_exists('teebird_disc', $_POST)) { 
             addToCart($teebird);
         } 
         else if(array_key_exists('aviar_disc', $_POST)) { 
             addToCart($aviar);
         } 
         else if(array_key_exists('dart_disc', $_POST)) { 
             addToCart($dart);
         } 
         else if(array_key_exists('pig_disc', $_POST)) { 
             addToCart($pig);
         } 
         else if(array_key_exists('slammer_disc', $_POST)) { 
             addToCart($slammer);
         } 

        function addToCart($value) { 
             $disc = $value;
             array_push($_SESSION["cart"], $disc);
         } 
    ?> 
    <div id="linkRight">
      <a href="cart.php">Shopping Cart</a>
    </div>  
    <h2>Distance Drivers</h2>
    <br>
    <div class="row">
      <div class="col">
         <img class="discpic" src="boss.jpg">
         <p class="pdiscs">Boss- Champion plastic<br><b>$15.00</b></p>
         <form method="post">
           <button type="submit" id="add" class="btn btn-info" name="boss_disc">Add To Cart</button>
         </form>
      </div>
      <div class="col">
        <img class="discpic" src="destroyer.jpg">
        <p class="pdiscs">Destroyer- Champion plastic<br><b>$15.00</b></p>
        <form method="post">
          <button type="submit" id="add" class="btn btn-info" name="destroyer_disc">Add To Cart</button>
        </form>
      </div>
      <div class="col">
        <img class="discpic" src="beast.jpg">
        <p class="pdiscs">Beast- DX plastic<br><b>$9.00</b></p>
        <form method="post">
          <button type="submit" id="add" class="btn btn-info" name="beast_disc">Add To Cart</button>
        </form>        
      </div>
      <div class="col">
        <img class="discpic" src="road_runner.jpg" >
        <p class="pdiscs">Road Runner- Star plastic<br><b>$17.00</b></p>
        <form method="post">
          <button type="submit" id="add" class="btn btn-info" name="road_runner_disc">Add To Cart</button>
        </form>        
      </div>
      <div class="col">
        <img class="discpic" src="wraith.jpg">
        <p class="pdiscs">Wraith- Star plastic<br><b>$17.00</b></p>
        <form method="post">
           <button type="submit" id="add" class="btn btn-info" name="wraith_disc">Add To Cart</button>
         </form>        
       </div>
    </div>
    <br>
    <h2>Fairway Drivers</h2>
    <br>
    <div class="row">
      <div class="col">
         <img class="discpic" src="banshee.jpg">
         <p class="pdiscs">Banshee- Champion plastic<br><b>$15.00</b></p>
         <form method="post">
           <button type="submit" id="add" class="btn btn-info" name="banshee_disc">Add To Cart</button>
         </form>   
      </div>
      <div class="col">
        <img class="discpic" src="eagle.jpg">
         <p class="pdiscs">Eagle- DX plastic<br><b>$9.00</b></p>
         <form method="post">
           <button type="submit" id="add" class="btn btn-info" name="eagle_disc">Add To Cart</button>
         </form>   
      </div>
      <div class="col">
        <img class="discpic" src="leopard.jpg">
         <p class="pdiscs">Leopard- DX plastic<br><b>$9.00</b></p>
         <form method="post">
           <button type="submit" id="add" class="btn btn-info" name="leopard_disc">Add To Cart</button>
         </form>   
      </div>
      <div class="col">
        <img class="discpic" src="teebird.jpg">
         <p class="pdiscs">Teebird- Star plastic<br><b>$17.00</b></p>
         <form method="post">
           <button type="submit" id="add" class="btn btn-info" name="teebird_disc">Add To Cart</button>
         </form>   
      </div>
    </div>
    <br>
    <h2>Putters</h2>
    <br>
    <div class="row">
      <div class="col">
         <img class="discpic" src="aviar.jpg">
         <p class="pdiscs">Aviar- DX plastic<br><b>$9.00</b></p>
         <form method="post">
           <button type="submit" id="add" class="btn btn-info" name="aviar_disc">Add To Cart</button>
         </form>   
      </div>
      <div class="col">
        <img class="discpic" src="dart.jpg">
         <p class="pdiscs">Dart- DX plastic<br><b>$9.00</b></p>
         <form method="post">
           <button type="submit" id="add" class="btn btn-info" name="dart_disc">Add To Cart</button>
         </form>   
      </div>
      <div class="col">
        <img class="discpic" src="pig.jpg">
         <p class="pdiscs">Pig- DX plastic<br><b>$9.00</b></p>
         <form method="post">
           <button type="submit" id="add" class="btn btn-info" name="pig_disc">Add To Cart</button>
         </form>   
      </div>
      <div class="col">
        <img class="discpic" src="slammer.jpg">
         <p class="pdiscs">Slammer- Champion plastic<br><b>$15.00</b></p>
         <form method="post">
           <button type="submit" id="add" class="btn btn-info" name="slammer_disc">Add To Cart</button>
         </form>   
      </div>
    </div>      
  </body>
</html>
