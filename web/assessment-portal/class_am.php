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
   <body id="home_body">
    <div>
      <nav class="navbar navbar-expand-md bg-dark navbar-dark">
        <ul class="navbar-nav">
          <li class="nav-item active">
            <a class="nav-link" href="portal_home.php">Portal Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="class_am.php">
              Class- AM
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="class_pm.php">
              Class- PM
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="student_scores.php">Enter Student Scores</a>
          </li>          
        </ul>
      </nav>  
    </div>

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

    <?php
     // function displayAssessmentData() {
       // foreach ($db->query("SELECT assessment_title FROM master_assessment WHERE assessment_period='{$_POST["assessments"]}'") as $row)
        //{
         // echo $row['assessment_title'] . '<br>';
        //}
      //}
    ?> 

    <br>
    <div id="centerform">
      <form id="assessment_selection" method="post">
        <label><b>Select Assessment Group:</b> </label>
        <select name="assessments">
          <option>Select</option>
          <option value="1">Unit 1 Assessments</option>
          <option value="2">Unit 2 Assessments</option>
          <option value="3">Unit 3 Assessments</option>
          <option value="4">Unit 4 Assessments</option>
          <option value="5">Unit 5 Assessments</option>
          <option value="6">Unit 6 Assessments</option>
        </select> 
        <label><b>Select Class Time:</b> </label>
        <select name="time">
          <option>Select</option>
          <option value="AM">AM</option>
          <option value="PM">PM</option>
        </select> 

        <br>
        <input type=submit value="See Assessments">
      </form>
    </div>  
    <br><br>
    <div class="container">
      <div class="row justify-content-lg-center">
        <div class="col col-lg-auto">
          <h2><?php echo $_POST['time'] . " ";?>Students</h2>
          <form action="students.php">
            <?php
              foreach ($db->query("SELECT student_name FROM students WHERE class_time='{$_POST["time"]}'") as $row)
              {?>
                <input type="radio" name="stud" value="<?php echo $row['student_name']; ?>"> <?php echo $row['student_name'];?>
                <br>
            <?php
              }
            ?>
            <br>
            <input type="submit" value="See Student Data">
          </form>
        </div>
        <div class="col col-lg-auto">
          <h2 class="centerform">Unit <?php echo " " . $_POST['assessments'] . " ";?>Class Assessment Scores</h2>  
            <?php
              foreach ($db->query("SELECT assessment_title FROM master_assessment WHERE assessment_period='{$_POST["assessments"]}'") as $row)
              {
                echo $row['assessment_title'] . "<br>" . "Scores: Coming next week once user can enter data into database" . "<br>";
              }
            ?>
                
          
        </div>
      </div>
    </div> 
  </body>
</html>
