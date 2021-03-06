<?php
  session_start();

  //$student_id = $_POST['student'];

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

  $query = "SELECT student_name from students WHERE student_id = '{$_POST["student"]}'";
  $stmt = $db->prepare($query);
  $stmt->execute();
  $student = $stmt->fetchAll(PDO::FETCH_ASSOC);

  $assessment_query = "SELECT student_id, assessment_title, score, correct_answers FROM master_assessment INNER JOIN assessment_score ON master_assessment.assessment_id = assessment_score.assessment_id WHERE student_id = '{$_POST["student"]}' AND subject = '{$_POST["assessment_type"]}' AND assessment_period = '{$_POST["unit_number"]}'";
  $stmt = $db->prepare($assessment_query);
  $stmt->execute();
  $assessment_query = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>


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
    <title>Student</title>
  </head>
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
    <br>
    <h1>
      <?php 
        foreach($student as $stud)
        {
          $name = $stud['student_name'];
           echo $name . "'s " . $_POST["assessment_type"] . " Unit " . $_POST["unit_number"] . " Assessment Scores"; 
        }
      ?>      
    </h1>
    <br>
    <div id="shrink">
      <table id="stud_table" class="table table-sm table-bordered table-dark table-striped">
        <thead>
          <tr>
            <th scope="col">Assessment</th>
            <th scope="col">Score</th>
            <th scope="col">Correct Answers</th>
          </tr>
        </thead>
        <tbody>
        <?php
          for($i = 0; $i < sizeof($assessment_query); $i++) {
        ?>
          <tr>
            <td><?php echo $assessment_query[$i]['assessment_title']; ?></td>
            <td><?php echo $assessment_query[$i]['score']; ?></td>
            <td><?php echo $assessment_query[$i]['correct_answers']; ?></td>
          </tr>
        <?php    
              } 
        ?>
        </tbody>
      </table>
    </div>
  </body>
</html>
