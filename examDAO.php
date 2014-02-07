<?php

class examDAO{
	public static function validateLogIn($eadd,$password){
		global $db;
		 $que = "SELECT * FROM examinee
		 		WHERE email_add = '{$eadd}'
		 		AND pass1 = '{$password}'";

		 	$result = mysql_query($que);
		 	if(mysql_num_rows($result) > 0){
		 		header('location:questionnaire.php');
		 	} else {
		 		echo "<script>alert('Log In invalid!');window.location.href='logInPage.php'</script>";
		 	}
	}

	public static function validateRegistration($fname,$lname,$eadd,$pass,$cpass){
		if($fname && $lname && $eadd && $pass && $cpass !== NULL){
			$que = "SELECT email_add FROM examinee
					WHERE email_add IN('{$eadd}')";
			$result = mysql_query($que);
			$count = mysql_num_rows($result);
			if($count == 0){
				if($pass == $cpass){
				echo 'YES!';
				$sql = "INSERT INTO examinee(firstname, lastname, email_add, pass1)
						VALUES ('$fname','$lname','$eadd','$pass')";

				mysql_query($sql);
				header('location:logInPage.php');
				} else {
					echo "<script>alert('Password did not match');window.location.href='signUp.php'</script>";
				}
			} else {
				echo "<script>alert('This email address is already in use');window.location.href='signUp.php'</script>";
			}
		} else {
			echo 'You need to fill the form';
		}
	}

	public static function getQuestion($id){
		$que = "SELECT question,a,b,c,d
				FROM questionnaire
				WHERE question_id = '$id'";
		$result = mysql_query($que);
		if(mysql_num_rows($result) > 0){
			$question = array();
			while($row = mysql_fetch_assoc($result)){
				$question[] = $row; 
			}
			return $question;
		}
	}

	public static function getAnswer($q_id, $answer){

		$query = "SELECT * FROM questionnaire WHERE question_id = '{$q_id}' AND answer = '{$answer}' ";
		$result = mysql_query($query);

		if(mysql_num_rows($result) > 0){
			return 1;
		}else{
			return 0;
		}

	}

	public static function getAllAnswer(){
		global $db;
		try{
			$query = "SELECT answer FROM questionnaire ORDER BY question_id";
			$result = mysql_query($query);
			$answers = array();
			while($row = mysql_fetch_assoc($result)){
				$answers[] = $row['answer'];
			}
			return $answers;
		} catch (Exeption $e) {
			error_log($e->getMessage());
		}

		return false;
	}

	public static function checkAnswers($answers) {
		$correct = self::getAllAnswer();

		if($correct === false) {
			error_log("Correct Answers Not Ready");
		}

		if (count($correct) != strlen($answers)) {
			error_log("Invalid Answers");
			return false;
		}
		$score = 0;
		for ($i = 0; $i < count($correct); $i++){
			if($correct[$i] == $answers[$i]){
				$score++;
			}
		}

		return $score;
	}
}



?>