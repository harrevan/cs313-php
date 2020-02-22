<?php
	session_start();

	if(isset($_POST['time']))
	{
		$_SESSION['time'] = $_POST['time'];
	}

	if(isset($_POST['assessments']))
	{
		$_SESSION['assessments'] = $_POST['assessments'];
	}

	if(isset($_POST['subject']))
	{
		$_SESSION['subject'] = $_POST['subject'];
	}

	if(isset($_POST['student_name']) && !empty($_SESSION['time'])
		&& isset($_POST['assessment']) && !empty($_SESSION['assessment'])
		&& isset($_POST['score']) && !empty($_SESSION['score'])
		&& isset($_POST['answers']) && !empty($_SESSION['answers']))
	{

		$student_id = htmlspecialchars($_POST['student_name']);
		$assessment_id = htmlspecialchars($_POST['assessment']);
		$score = htmlspecialchars($_POST['score']);
		$correct_answers = htmlspecialchars($_POST['answers']);

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


		$stmt = $db->prepare('INSERT INTO assessment_score(student_id, assessment_id, score, correct_answers) SELECT :student_id, :assessment_id, :score, :correct_answers ON CONFLICT (student_id, assessment_id) DO UPDATE SET score = excluded.score, correct_answers = excluded.correct_answers');
		$stmt->bindValue(':student_id', $student_id, PDO::PARAM_INT);
		$stmt->bindValue(':assessment_id', $assessment_id, PDO::PARAM_INT);
		$stmt->bindValue(':score', $score, PDO::PARAM_STR);
		$stmt->bindValue(':correct_answers', $correct_answers, PDO::PARAM_INT);
		$stmt->execute();

	}

	$new_page = "student_scores.php";
	header("Location: $new_page");
	die();

?>