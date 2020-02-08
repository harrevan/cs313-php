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

    <title>Class-AM</title>
  </head>
  <?php
      session_start();
      $_SESSION["selected_student"] = "";
  ?>
  <body>
    <?php
      try
      {
        $dbUrl = getenv('DATABASE_URL');

        $dbOpts = parse_url($dbUrl);

        $dbHost = $dbOpts["host"];
        $dbPort = $dbOpts["port"];
        $dbUser = $dbOpts["user"];
        $dbPassword = $dbOpts["pass"];
        $dbName = ltrim($dbOpts["path"],'/');

        $db = new PDO("pgsql:host=$dbHost;port=$dbPort;dbname=$dbName", $dbUser, $dbPassword);

        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      }
      catch (PDOException $ex)
      {
        echo 'Error!: ' . $ex->getMessage();
        die();
      }
    ?>  


    <div class="container">
      <div class="row">
        <div class="col-*3*">
          <h2>Students</h2>
          <form>
            <?php
              foreach ($db->query("SELECT student_name FROM students WHERE class_time='AM'") as $row)
              {?>
                <input type="radio" value="<?php echo $row['student_name']; ?>"> <?php echo $row['student_name'];?>
                <span class="checkmark"></span>
                <br>
            <?php
              }
            ?>
          </form>
          
        </div>
        <div class="col-*9*">
          <h2>Class Assessment Scores</h2>  
          
        </div>
      </div>
<!--       <div class="row">
        <div class="col-*-*"></div>
        <div class="col-*-*"></div>
        <div class="col-*-*"></div>
      </div>
      <div class="row">
        ...
      </div> -->
    </div>

   <!-- <div class="row">
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
    </div>    -->  
  </body>
</html>
