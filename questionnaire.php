<?php

include('dbconfig.php');
include_once('examDAO.php');

define('Question_NUMBER', 10);

$que_num = (isset($_POST['q_num'])) ? $_POST['q_num']+1 : 1;

$answers = (isset($_POST['answers'])) ? $_POST['answers'] : '';

$answer = (isset($_POST['choice'])) ? $_POST['choice'] : '';

$answers .= $answer;

if($que_num > Question_NUMBER){
	session_start();
	$_SESSION['answers'] = $answers;
	header('location:result.php');
}

$Questions = examDAO::getQuestion($que_num);
foreach ($Questions as $value):
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
	<div class = 'nav-collapse collapse'></div>
	<div class = 'span12'>
		<div class = 'column' id = "container">
		<form action = "<?= $_SERVER['PHP_SELF']?>" method = "POST">
		<table><center><tr><td><div  id = "questionPage"><?php echo $value['question']; ?></div></td></tr>
			<input type = "hidden" name = 'answers' value = "<?= $answers?>">
			<input type = "hidden" name = 'q_num' value = "<?= $que_num?>">
		<tr><td><input type ='radio' id ='radio1' name = 'choice' value = 'a'><?php echo $value['a']; ?></td></tr>
		<tr><td><input type = 'radio' id = 'radio2' name = 'choice' value = 'b'><?php echo $value['b']; ?></td></tr>
		<tr><td><input type = 'radio' id = 'radio3' name = 'choice' value = 'c'><?php echo $value['c']; ?></td></tr>
		<tr><td><input type = 'radio' id = 'radio4' name = 'choice' value = 'd'><?php echo $value['d']; ?></td></tr>

		<tr><td><input type = "submit" id = "submit" class = 'btn btn-primary' style = 'height:30px;width:80px;margin-left:450px' value = 'submit'></td></tr>
		</center></table>
		</form>
</div></div>
</body>
<script type="text/javascript" src = "js/jquery.1.10.2.js"></script>
<script type="text/javascript">
$(document).ready(function(){
	$('#submit').click(function(event){
		if($('#radio1').is(':checked')){
			return true;
		}else if($('#radio2').is(':checked')){
			return true;
		}else if($('#radio3').is(':checked')){
			return true;
		}else if($('#radio4').is(':checked')){
			return true;
		}else{
			alert("You need to answer first!");
			return false;
		}
	});
});

</script>
</html>
<?php endforeach?>