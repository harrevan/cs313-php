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

    <script type="text/javascript">
      function reveal(){
        if(document.getElementById("hidden") == 'none'){
          document.getElementById("hidden").style.display = 'block';
        }
      }
    </script>

    <link rel="stylesheet" type="text/css" href="assessment.css">

    <title>Student Scores</title>
  </head>
  <?php
      session_start();

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

  if(isset($_GET["time"]))
  {
    $select_students = $db->query("SELECT student_id, student_name FROM students  WHERE class_time='{$_GET["time"]}'");
    $student_rows = $select_students->fetchAll(PDO::FETCH_ASSOC);
    $select_assessments = $db->query("SELECT assessment_id, assessment_title FROM master_assessment");
    $assessment_rows = $select_assessments->fetchAll(PDO::FETCH_ASSOC);

  }

?> 

<?php
  $_SESSION["subject"] = $_POST["subject"];
  $_SESSION["assessment_unit"] = $_POST["assessments"];

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
    <div id="centerform">
      <form id="assessment_selection" method="get" onsubmit="reveal();">
        <label><b>Select Class Time:</b> </label>
        <select id="time" name="time">
          <option value="">Select</option>
          <option value="AM">AM</option>
          <option value="PM">PM</option>
        </select> 
        <script type="text/javascript">
          document.getElementById('time').value = "<?php echo $_GET['time'];?>";
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
          document.getElementById('assessments').value = "<?php echo $_GET['assessments'];?>";
        </script>  

        <label><b>Select Assessment Type:</b> </label>
        <select id="subject" name="subject">
          <option value="">Select</option>
          <option value="ELA">ELA</option>
          <option value="MATH">Math</option>
        </select> 
        <script type="text/javascript">
          document.getElementById('subject').value = "<?php echo $_GET['subject'];?>";
        </script>  
        <br><br>
        <input type=submit value="See Assessments">
      </form>
    </div>  
    <div class="container">
      <h2>Enter Student Scores</h2>
      <form action="">
        <div class="form-group">
          <label for="students">Student Name</label>
          <input type="text" class="form-control" name="student_name" list="student_names">
          <datalist id="student_names">
             <?php
              foreach ($student_rows as $student)
              {
                $name = $student['student_name'];
                $id = $student['student_id'];
                ?>
                <option name="student" value="<?php echo $id;?>"><?php echo $name;?></option>
            <?php
              }    
            ?> 
          </datalist>
        </div>
        <div class="form-group">
          <label for="pwd">Assessment</label>
          <input type="text" class="form-control" name="assessment" list="assessments">
          <datalist id="assessments">
             <?php
              foreach ($assessment_rows as $assessment)
              {
                $title = $assessment['assessment_title'];
                $id = $assessment['assessment_id'];
                ?>
                <option name="student" value="<?php echo $name;?>"><?php echo $name;?></option>
                <input type="hidden" name="assessment_id" value="<?php echo $id;?>">      
            <?php
              }
            ?> 
          </datalist>
        </div>

        <button type="submit">Enter Score</button>
      </form>
    </div>


  </body>
</html>