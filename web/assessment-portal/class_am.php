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
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type = "text/javascript">
      google.charts.load("current", {"packages":["corechart"]});
      
    </script>           

    <link rel="stylesheet" type="text/css" href="assessment.css">

    <title>Class</title>
  </head>
  <?php
      session_start();
      if(!isset ($_SESSION["assessment_array"])){
            $_SESSION["assessment_array"] = array();
      }
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

      if(isset($_POST['assessments']))
      {
          $assessments = "SELECT assessment_title 
                          FROM master_assessment  
                          WHERE subject = '{$_POST["subject"]}' 
                          AND assessment_period = '{$_POST["assessments"]}'
                          ORDER BY assessment_id";
          $stmt = $db->prepare($assessments);
          $stmt->execute();
          $assessments = $stmt->fetchAll(PDO::FETCH_ASSOC);

          // Select MT scores 
          $mt_scores = "SELECT count(score), assessment_title, assessment_score.assessment_id
                              FROM assessment_score
                              INNER JOIN master_assessment ON master_assessment.assessment_id = assessment_score.assessment_id 
                              WHERE subject = '{$_POST["subject"]}' AND assessment_period = '{$_POST["assessments"]}' AND score = 'MT'
                              GROUP BY assessment_title, assessment_score.assessment_id
                              ORDER BY assessment_score.assessment_id";
          $stmt = $db->prepare($mt_scores);
          $stmt->execute();
          $mt_scores = $stmt->fetchAll(PDO::FETCH_ASSOC);

            // Select NT scores 
          $nt_scores = "SELECT count(score), assessment_title, assessment_score.assessment_id
                              FROM assessment_score
                              INNER JOIN master_assessment ON master_assessment.assessment_id = assessment_score.assessment_id 
                              WHERE subject = '{$_POST["subject"]}' AND assessment_period = '{$_POST["assessments"]}' AND score = 'NT'
                              GROUP BY assessment_title, assessment_score.assessment_id
                              ORDER BY assessment_score.assessment_id";
          $stmt = $db->prepare($nt_scores);
          $stmt->execute();
          $nt_scores = $stmt->fetchAll(PDO::FETCH_ASSOC); 

          // Select BT scores 
          $bt_scores = "SELECT count(score), assessment_title, assessment_score.assessment_id
                              FROM assessment_score
                              INNER JOIN master_assessment ON master_assessment.assessment_id = assessment_score.assessment_id 
                              WHERE subject = '{$_POST["subject"]}' AND assessment_period = '{$_POST["assessments"]}' AND score = 'BT'
                              GROUP BY assessment_title, assessment_score.assessment_id
                              ORDER BY assessment_score.assessment_id";
          $stmt = $db->prepare($bt_scores);
          $stmt->execute();
          $bt_scores = $stmt->fetchAll(PDO::FETCH_ASSOC);
      }

      $num_assessments = sizeof($assessments);
   ?> 
  

    
    <script type="text/javascript">
        var i;
        for (i = 0; i <'<?php echo $num_assessments ?>'; i++ ){

                var mtArray = <?php echo json_encode($mt_scores); ?>;
                var ntArray = <?php echo json_encode($nt_scores); ?>;
                var btArray = <?php echo json_encode($bt_scores); ?>;

                //var id =  <?php echo $index; ?>; 
                var assessment_title = '<?php echo $assess_title; ?>';
                var mt = mtArray[i]['count'];
                console.log(mt);
                var nt = ntArray[i]['count'];
                console.log(nt);
                var bt = btArray[i]['count'];
                console.log(bt);

                console.log('piechart' + (id-1));
                console.log('piechart' + id);
                
               

                // Load google charts
                google.charts.setOnLoadCallback(drawChart);


                // Draw the chart and set the chart values
                function drawChart() {
                  var data = google.visualization.arrayToDataTable([
                  ["Score", "Count"],
                  ["MT", mt],
                  ["NT", nt],
                  ["BT", bt]
                ]);

                  // Title and set the width and height of the chart
                  var options = {"title":assessment_title, "width":400, "height":400};

                  // Display the chart inside the <div> element with id="piechart"
                 // if(id == 0)
                  //{
                    var chart = new google.visualization.PieChart(document.getElementById("piechart0"));
                   chart.draw(data, options);
                  //}
                  // else
                  // {
                  //   var chart = new google.visualization.PieChart(document.getElementById("piechart" + (id-1)).appendChild("piechart" + id));
                  //  chart.draw(data, options);
                  // }
                  
                }
      }
</script>

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
          <h2 id="centerform"><?php echo "Class " . $_POST['time'] . " Unit " . $_POST['assessments'] . " " . $_POST['subject'] . " ";?> Assessment Scores</h2>
          <div id="piechart0"></div>
        </div>
       <?php 
         $val = $mt_scores[0]['count'];
       echo $val . ' ' . $mt_scores[0][assessment_title];?>
       <br>
       <?php echo $mt_scores['count'] . ' ' . $mt_scores[1][assessment_title];?>  
       <br>
       <?php echo $mt_scores[2]['count'] . ' ' . $mt_scores[2][assessment_title];?>  
       <br>
       <?php echo $mt_scores[3]['count'] . ' ' . $mt_scores[3][assessment_title];?>       
      </div>
    </div> 
  </body>
</html>
