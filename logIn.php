<?php
include('dbconfig.php');
include_once('examDAO.php');

$fname = $_POST['firstname'];
$lname = $_POST['lastname'];
$eadd = $_POST['eadd'];
$pass1 = $_POST['password'];
$pass = sha1($pass1);
$cpass1 = $_POST['confirmpass'];
$cpass = sha1($cpass1);

examDAO::validateRegistration($fname,$lname,$eadd,$pass,$cpass);
?>
