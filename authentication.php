<?php
include('dbconfig.php');
include_once('examDAO.php');
@$email = $_POST['eadd'];
@$pass = sha1($_POST['pass']);

examDAO::validateLogIn($email,$pass);




?>