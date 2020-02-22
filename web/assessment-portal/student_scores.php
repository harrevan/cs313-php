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

      if(isset($_SESSION['time']) && !empty($_SESSION['time']))//&& isset($_POST["assessments"]) && isset($_POST["subject"]))
      {
        $select_students = $db->query("SELECT student_id, student_name FROM students  WHERE class_time='{$_SESSION["time"]}'");
        $student_rows = $select_students->fetchAll(PDO::FETCH_ASSOC);
        
      }
      
      if(isset($_SESSION['assessments']) && !empty($_SESSION['assessments']) && isset($_SESSION['subject']) && !empty($_SESSION['subject']))
      {
        $select_assessments = $db->query("SELECT assessment_id, assessment_title FROM master_assessment WHERE assessment_period = '{$_SESSION["assessments"]}' AND subject = '{$_SESSION["subject"]}'");
        $assessment_rows = $select_assessments->fetchAll(PDO::FETCH_ASSOC);
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
    <br>
    <div class="container">
      <h2>Enter Student Scores</h2>
      <form action="submit_scores.php" method="post">
        <div class="form-group">
          <label><b>Select Class Time:</b> </label>
          <select id="time" name="time" onchange="this.form.submit()">
            <option value="">Select</option>
            <option value="AM">AM</option>
            <option value="PM">PM</option>
          </select> 
          <script type="text/javascript">
            document.getElementById('time').value = "<?php echo $_SESSION['time'];?>";
          </script>  
        </div>
        <div class="form-group">
          <label><b>Select Assessment Unit:</b> </label>
          <select id="assessments" name="assessments" onchange="this.form.submit()">
            <option value ="">Select</option>
            <option value="1">Unit 1 Assessments</option>
            <option value="2">Unit 2 Assessments</option>
            <option value="3">Unit 3 Assessments</option>
            <option value="4">Unit 4 Assessments</option>
            <option value="5">Unit 5 Assessments</option>
            <option value="6">Unit 6 Assessments</option>
          </select> 
          <script type="text/javascript">
            document.getElementById('assessments').value = "<?php echo $_SESSION['assessments'];?>";
          </script>  
        </div>
        <div class="form-group">
          <label><b>Select Assessment Type:</b> </label>
          <select id="subject" name="subject" onchange="this.form.submit()">
            <option value="">Select</option>
            <option value="ELA">ELA</option>
            <option value="MATH">Math</option>
          </select> 
          <script type="text/javascript">
            document.getElementById('subject').value = "<?php echo $_SESSION['subject'];?>";
          </script>  
        </div>
        <div class="form-group">
          <label>Student Name:</label>
          <select class="selectpicker" name="student_name" id="stud_name">
            <option>Select</option>
            <?php
             foreach ($student_rows as $student)
             {
               $name = $student['student_name'];
               $id = $student['student_id'];
               ?>
               <option value="<?php echo $id;?>"><?php echo $name;?></option>
           <?php
             }    
           ?> 
          </select> 
        </div>
        <div class="form-group">
          <label>Assessment:</label>
          <select class="selectpicker" name="assessment" id="assess_id">
            <option>Select</option>
            <?php
             foreach ($assessment_rows as $assessment)
             {
               $title = $assessment['assessment_title'];
               $a_id = $assessment['assessment_id'];
               ?>
               <option value="<?php echo $a_id; ?>"><?php echo $title;?></option>     
            <?php
              }
            ?> 
          </select>           
        </div>
        <div class="form-group">
          <label>Assessment Score:</label>
          <select class="selectpicker" name="score">
            <option>Select</option>
            <option value="MT">Met Target</option>
            <option value="NT">Near Target</option> 
            <option value="BT">Below Target</option>      
          </select>         
        </div>
        <div class="form-group">
          <label>Correct Answers:</label>
          <input class="form-control" type="number" value="0" name="answers">  
        </div>
        <button type="submit">Enter Score</button>
      </form>
    </div>

  </body>
</html>
