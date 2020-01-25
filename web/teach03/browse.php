
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
        if(array_key_exists('boss_disc', $_POST)) { 
            addToCart(); 
        } 
        else if(array_key_exists('button2', $_POST)) { 
            button2(); 
        } 
        function addToCart() { 
            echo "Hello World!";
        } 
        function button2() { 
            echo "This is Button2 that is selected"; 
        } 
    ?> 

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
      </div>
      <div class="col">
        <img class="discpic" src="beast.jpg">
         <p class="pdiscs">Beast- DX plastic<br><b>$9.00</b></p>
      </div>
      <div class="col">
        <img class="discpic" src="road_runner.jpg">
         <p class="pdiscs">Road Runner- Star plastic<br><b>$17.00</b></p>
      </div>
      <div class="col">
        <img class="discpic" src="wraith.jpg">
         <p class="pdiscs">Wraith- Star plastic<br><b>$17.00</b></p>
       </div>
    </div>
    <br>
    <h2>Fairway Drivers</h2>
    <br>
    <div class="row">
      <div class="col">
         <img class="discpic" src="banshee.jpg">
         <p class="pdiscs">Banshee- Champion plastic<br><b>$15.00</b></p>
      </div>
      <div class="col">
        <img class="discpic" src="eagle.jpg">
         <p class="pdiscs">Eagle- DX plastic<br><b>$9.00</b></p>
      </div>
      <div class="col">
        <img class="discpic" src="leopard.jpg">
         <p class="pdiscs">Leopard- DX plastic<br><b>$9.00</b></p>
      </div>
      <div class="col">
        <img class="discpic" src="teebird.jpg">
         <p class="pdiscs">Teebird- Star plastic<br><b>$17.00</b></p>
      </div>
    </div>
    <br>
    <h2>Putters</h2>
    <br>
    <div class="row">
      <div class="col">
         <img class="discpic" src="aviar.jpg">
         <p class="pdiscs">Aviar- DX plastic<br><b>$9.00</b></p>
      </div>
      <div class="col">
        <img class="discpic" src="dart.jpg">
         <p class="pdiscs">Dart- DX plastic<br><b>$9.00</b></p>
      </div>
      <div class="col">
        <img class="discpic" src="pig.jpg">
         <p class="pdiscs">Pig- DX plastic<br><b>$9.00</b></p>
      </div>
      <div class="col">
        <img class="discpic" src="slammer.jpg">
         <p class="pdiscs">Slammer- Champion plastic<br><b>$15.00</b></p>
      </div>
    </div>      
  </body>
</html>
