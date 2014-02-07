<?php
include('dbconfig.php');
include('examDAO.php');

$answer = $_POST['answer'];
$answer_id = $_POST['answer_id'];
$id = $_POST['question_id'];
$questions = examDAO::getQuestion($id);
$score = examDAO::getAnswer($answer_id, $answer);

$row = mysql_fetch_array($questions);
	$que = $row['question'];
	$a = $row['a'];
	$b = $row['b'];
	$c = $row['c'];
	$d = $row['d'];

echo json_encode(
		array(
			'status' => 'success',
			'question' => $que,
			'choiceA' => $a,
			'choiceB' => $b,
			'choiceC' => $c,
			'choiceD' => $d,
			'score' => $score
			)
	);



?>