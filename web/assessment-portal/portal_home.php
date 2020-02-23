<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <!--Include Bootstrap compiled CSS. Most of the CSS in this page consists of built-in Bootstrap classes. -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">  
    <!--Include Bootstrap compiled JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous">
    </script> 

    <link rel="stylesheet" type="text/css" href="assessment.css">

    <title>Assessment Portal</title>
  </head>
  <?php
      session_start();
  ?>
  <body id="home_body">
    <div>
      <nav class="navbar navbar-expand-md bg-dark navbar-dark">
        <ul class="navbar-nav">
          <li class="nav-item active">
            <a class="nav-link" href="portal_home.php">Portal Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="class_am.php">
              Classes/Students
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="student_scores.php">Enter Student Scores</a>
          </li>          
        </ul>
      </nav>  
    </div>
    <div class="jumbotron text-center">
      <div class="container">
      <h1>Kindergarten Assessment Portal</h1>
      </div>
    </div>      

    <div id="demo" class="carousel slide" data-ride="carousel">

      <!-- Indicators -->
      <ul class="carousel-indicators">
        <li data-target="#demo" data-slide-to="0" class="active"></li>
        <li data-target="#demo" data-slide-to="1"></li>
        <li data-target="#demo" data-slide-to="2"></li>
      </ul>

      <!-- The slideshow -->
      <div class="carousel-inner div_back_color">
        <div class="carousel-item active">
          <img class="d-block w-100" src="kids.png">
        </div>
        <div class="carousel-item">
          <img class="d-block w-100" src="teaching.png">
        </div>
        <div class="carousel-item">
          <img class="d-block w-100" src="coloring.png">
        </div>
      </div>

      <!-- Left and right controls -->
      <a class="carousel-control-prev" href="#demo" data-slide="prev">
        <span class="carousel-control-prev-icon"></span>
      </a>
      <a class="carousel-control-next" href="#demo" data-slide="next">
        <span class="carousel-control-next-icon"></span>
      </a>
    </div>    
  </body>
</html>
