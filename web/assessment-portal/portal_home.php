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
    <nav class="navbar navbar-expand-md navbar-dark fixed-top" id="banner">
      <div class="container">
      <!-- Home -->
      <a class="navbar-brand" href="#"><span>Home</span></a>

      <!-- Toggler/collapsibe Button -->
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
        <span class="navbar-toggler-icon"></span>
      </button>

      <!-- Navbar links -->
      <div class="collapse navbar-collapse" id="collapsibleNavbar">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a class="nav-link" href="#">Link</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Link</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Link</a>
          </li> 
         <!-- Dropdown -->
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
            Dropdown link
          </a>
          <div class="dropdown-menu">
            <a class="dropdown-item" href="#">Link 1</a>
            <a class="dropdown-item" href="#">Link 2</a>
            <a class="dropdown-item" href="#">Link 3</a>
          </div>
        </li>
        </ul>
      </div>
      </div>
    </nav>

    <div class="linkRight">
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
    </div>
    <br>
      </div>
    </div>      
  </body>
</html>