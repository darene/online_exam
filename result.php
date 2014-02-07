<?php
	session_start();
	include('dbconfig.php');
	include_once('examDAO.php');
	$answers = $_SESSION['answers'];
	$result = ExamDAO::checkAnswers($answers)
?>

<html>
<head>
	<title>La Verdad Online Examination</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/cssko.css">
</head>
<body>
	<div class = 'well well1'><img src="1.png" width='90px' height='90px'>&nbsp;La Verdad Online Examination</div>
	<div class = 'nav-collapse collapse'>
		<div class = 'pull-right' style = 'font-family: times new roman;font-size:20px;margin-right:100px' >
			<a href="logOut.php" style = 'margin-top:10px margin-right:100px'>Logout</a>
		</div>
	</div>
	<div class = 'span12'>
		<div class = 'column container' id = "container">
			<div class = "row">
				<h1>Your score is:  <?=$result?></h1>
			</div>
			<div class = "row">
				<?php
					if($result > 7){
						echo "<h2>Congratulation!!<br> You pass the Exam!!!</h2>";
					}else {
						echo "<h2>You failed the Exam!!!</h2>";
					}
			?>
			</div>
		</div>
	</div>
</body>
<script type="text/javascript" src = "js/jquery.1.10.2.js"></script>
</html>