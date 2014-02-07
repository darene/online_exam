<html>
<head>
	<title>LogIn Page</title>
</head>
<!-- <body>
	<form action = 'authentication.php' method = 'POST'>
		<input type = 'text' name = 'eadd' id = 'eadd' placeholder = 'E-mail Address'>
		<input type = 'text' name = 'eadd' id = 'pass' placeholder = 'Password'>

	</form>

</body> -->

<title>La Verdad Online Examination</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/cssko.css">
</head>
<body>
	<div class = 'well well1'><img src="1.png" width='90px' height='90px'>&nbsp;La Verdad Online Examination</div>
	<div class = 'nav-collapse collapse'>
		<div class = 'pull-right' style = 'font-family: times new roman;font-size:20px;margin-right:100px' >
			<a href="signUp.php" style = 'margin-top:10px margin-right:100px'>Sign Up</a>
			<a href="logInPage.php" style = 'margin-top:10px'>&nbsp;Log In</a></div>
	</div></div>
	<div class = 'span12'>
		<div class = 'login_column'>
	<form action = 'authentication.php' method = 'POST'>
		<table>
		<tr><td><input type = 'email' name = 'eadd' id = 'eadd' style = 'height:30px' placeholder = 'E-mail Address'></td>
			<td id = 'emailadd'></td></tr>
		<tr><td><input type = 'password' name = 'pass' id = 'pass' style = 'height:30px' placeholder = 'Password'></td>
			<td id = 'pass'></td></tr>

		<tr><td><input type = 'submit' class = 'btn btn-primary' style = 'height:30px;width:80px' value = 'Log In' id = 'submit'></td></tr>
		</table>
	</form>
</div></div>
</body>
</html>