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
        if(!isset ($_SESSION["assessment_array"])){
            $_SESSION["assessment_array"] = array();
        }      
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
              Classes
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
        $assessments_mt = "SELECT count(score), assessment_title 
                            FROM assessment_score 
                            INNER JOIN students ON students.student_id = assessment_score.student_id 
                            INNER JOIN master_assessment ON master_assessment.assessment_id = assessment_score.assessment_id 
                            WHERE class_time = 'PM' AND score = 'MT' 
                            GROUP BY assessment_title";
        $stmt = $db->prepare($assessment_mt);
        $stmt->execute();
        $assessments_mt = $stmt->fetchAll(PDO::FETCH_ASSOC);


    ?> 

    <?php
      $_SESSION["subject"] = $_POST["subject"];
      $_SESSION["assessment_unit"] = $_POST["assessments"];
    ?> 

    <br>
    <div id="centerform">
      <form id="assessment_selection" method="post">
        <label><b>Select Class Time:</b> </label>
        <select id="time" name="time">
          <option value="">Select</option>
          <option value="AM">AM</option>
          <option value="PM">PM</option>
        </select> 
        <script type="text/javascript">
          document.getElementById('time').value = "<?php echo $_POST['time'];?>";
        </script>  

        <label><b>Select Assessment Unit:</b> </label>
        <select id="assessments" name="assessments">
          <option value ="">Select</option>
          <option value="1">Unit 1 Assessments</option>
          <option value="2">Unit 2 Assessments</option>
          <option value="3">Unit 3 Assessments</option>
          <option value="4">Unit 4 Assessments</option>
          <option value="5">Unit 5 Assessments</option>
          <option value="6">Unit 6 Assessments</option>
        </select> 
        <script type="text/javascript">
          document.getElementById('assessments').value = "<?php echo $_POST['assessments'];?>";
        </script>  

        <label><b>Select Assessment Type:</b> </label>
        <select id="subject" name="subject">
          <option value="">Select</option>
          <option value="ELA">ELA</option>
          <option value="MATH">Math</option>
        </select> 
        <script type="text/javascript">
          document.getElementById('subject').value = "<?php echo $_POST['subject'];?>";
        </script>  

        <br><br>
        <input type=submit value="See Assessments">
      </form>
    </div>  
    <br><br>
    <div class="container">
      <div class="row">
        <div class="col-3">
          <h2><?php echo $_POST['time'] . " ";?>Students</h2>
          <form action="students.php" method="post">
            <?php
              foreach ($db->query("SELECT student_id, student_name FROM students WHERE class_time='{$_POST["time"]}'") as $row)
              {?>
                <input type="radio" name="student" value="<?php echo $row['student_id']; ?>"><?php echo $row['student_name'];?>
                <br>
            <?php
              }
            ?>
            <br>
            <input type="hidden" name="assessment_type" value="<?php echo $_POST["subject"]?>">
            <input type="hidden" name="unit_number" value="<?php echo $_POST["assessments"]?>">
            <input type="submit" value="See Student Data"><br>
          </form>
        </div>
        <div class="col-9">
          <h2 id="centerform"><?php echo "Unit " . $_POST['assessments'] . " " . $_POST['subject'] . " ";?> Assessment Scores</h2>  
            <?php
              unset($_SESSION["assessment_array"]);
              $_SESSION["assessment_array"] = array();
              foreach ($db->query("SELECT assessment_id FROM master_assessment WHERE assessment_period='{$_POST["assessments"]}' AND subject='{$_POST["subject"]}'") as $row)
              {
                array_push($_SESSION["assessment_array"], $row['assessment_id']);    
                echo $row['assessment_title'] . "<br>" . "  Scores: coming next week" . "<br>";
              }
            ?>           
          
        </div>
      </div>
    </div> 
  </body>
</html>
