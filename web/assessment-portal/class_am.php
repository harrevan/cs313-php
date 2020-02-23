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

    <title>Class</title>
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

      if(isset($_POST['assessments']) && isset($_POST['time']) && isset($_POST['subject']))
      {   
          $_SESSION['time'] = $_POST['time'];
          $_SESSION['assessments'] = $_POST['assessments'];
          $_SESSION['subject'] = $_POST['subject'];
       
          $assessments = "SELECT assessment_title 
                          FROM master_assessment  
                          WHERE subject = '{$_POST["subject"]}' 
                          AND assessment_period = '{$_POST["assessments"]}'
                          ORDER BY assessment_id";
          $stmt = $db->prepare($assessments);
          $stmt->execute();
          $assessments = $stmt->fetchAll(PDO::FETCH_ASSOC);

         $scores = "SELECT count(score), assessment_title, score
                             FROM assessment_score
                             INNER JOIN master_assessment ON master_assessment.assessment_id = assessment_score.assessment_id 
                             WHERE subject = '{$_POST["subject"]}' AND assessment_period = '{$_POST["assessments"]}'
                             GROUP BY assessment_title, score";
         $stmt = $db->prepare($scores);
         $stmt->execute();
         $scores = $stmt->fetchAll(PDO::FETCH_ASSOC);
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
    <div id="centerform">
      <form id="assessment_selection" method="post">
        <label><b>Select Class Time:</b> </label>
        <select id="time" name="time">
          <option value="">Select</option>
          <option value="AM">AM</option>
          <option value="PM">PM</option>
        </select> 
        <script type="text/javascript">
          document.getElementById('time').value = "<?php echo $_SESSION['time'];?>";
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
          document.getElementById('assessments').value = "<?php echo $_SESSION['assessments'];?>";
        </script>  

        <label><b>Select Assessment Type:</b> </label>
        <select id="subject" name="subject">
          <option value="">Select</option>
          <option value="ELA">ELA</option>
          <option value="MATH">Math</option>
        </select> 
        <script type="text/javascript">
          document.getElementById('subject').value = "<?php echo $_SESSION['subject'];?>";
        </script>  

        <br><br>
        <input type=submit value="See Students and Assessments">
      </form>
    </div>  
    <br>
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
          <h2 id="centerform"><?php echo "Class " . $_POST['time'] . " Unit " . $_POST['assessments'] . " " . $_POST['subject'] . " ";?> Assessment Scores</h2>
          <table class="table table-sm table-bordered table-dark table-striped">
            <thead>
              <tr>
                <th scope="col">Assessment Title</th>
                <th scope="col">MT Total</th>
                <th scope="col">NT Total</th>
                <th scope="col">BT Total</th>
              </tr>
            </thead>
            <tbody>  
            <?php
              for($i = 0; $i < sizeof($assessments); $i++)
              {
                echo "<tr><td>" . $assessments[$i]['assessment_title'] . "</td>";
                $mt_temp =0;
                $nt_temp =0;
                $bt_temp =0;
                for($j = 0; $j < sizeof($scores); $j++)
                {
                  if($scores[$j]['assessment_title'] == $assessments[$i]['assessment_title'])
                  {
                    if($scores[$j]['score'] == 'MT')
                    {
                      $mt_temp += $scores[$j]['count'];
                    }
                    if($scores[$j]['score'] == 'NT')
                    {
                      $nt_temp += $scores[$j]['count']; 
                    }
                    if($scores[$j]['score'] == 'BT')
                    {
                      $bt_temp += $scores[$j]['count']; 
                    }
                  }

                }
                // Disply class totals
                echo "<td>" . $mt_temp . "</td>";
                echo "<td>" . $nt_temp . "</td>";
                echo "<td>" . $bt_temp . "</td></tr>";
              }
            ?>
          </tbody>
        </table>
        <p>*This table displays the number of students that achived a score of MT, NT, or BT per assessment.</p>
      </div>
    </div> 
  </body>
</html>
