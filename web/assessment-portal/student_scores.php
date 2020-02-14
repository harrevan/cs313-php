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

  $select_students = $db->prepare('SELECT student_id, student_name FROM students');
  $select_students->bindValue(':student_id', $student_id, PDO::PARAM_INT);
  $select_students->bindValue(':student_name', $student_name, PDO::PARAM_STR);
  $stmt->execute();
  $student_rows = $select_students->fetchAll(PDO::FETCH_ASSOC);

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
    <div class="container">
      <h2>Enter Student Scores</h2>
      <form action="">
        <div class="form-group">
          <label for="students">Student Name</label>
          <input type="text" class="form-control" id="students" name="stud" list="student_names">
          <datalist id="student_names">
             <?php
              foreach ($student_rows as $student)
                $name = $student['student_name']
                $id = $student['student_id']
              {?>
                <option name="student" value="<?php echo $id;?>"><?php echo $name;?></option>
                <br>
            <?php
              }
            ?>  
          </datalist>
        </div>
        <div class="form-group">
          <label for="pwd">Password:</label>
          <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="pwd">
        </div>
        <div class="checkbox">
          <label><input type="checkbox" name="remember"> Remember me</label>
        </div>
        <button type="submit" class="btn btn-default">Submit</button>
      </form>
    </div>


  </body>
</html>

          <form action="students.php" method="post">
            <?php
              foreach ($db->query("SELECT student_name FROM students WHERE class_time='{$_POST["time"]}'") as $row)
              {?>
                <input type="radio" name="stud" value="<?php echo $row['student_name']; ?>"><?php echo $row['student_name'];?>
                <br>
            <?php
              }
            ?>