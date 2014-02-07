$(document).ready(function(){
	$('#firstname').on('blur',function(){
		var fname = $(this).val();
		if(fname.length > 0){
			$('#fname').html("");
		} else {
			$('#fname').html('Please enter your first name!');
		}
	});

	$('#lastname').on('blur',function(){
		var lname = $(this).val();
		if(lname.length > 0){
			$('#lname').html("");
		} else{
			$('#lname').html("Please enter your last name!");
		}
	});

	$('#eadd').on('blur',function(){
		var emailadd = $(this).val();
		if(emailadd.length > 0){
			$('#emailadd').html("");
		} else {
			$('#emailadd').html("Please enter your valid e-mail address!");
		}
	});

	$('#password').on('blur',function(){
		var pass = $(this).val();
		if(pass.length >= 8){
			$('#pass').html("");
		}else{
			$('#pass').html("Require atleast 8 characters!");
		}
	});

	$('#confirmpass').on('blur',function(){
		var cpass = $(this).val();
		var pass = $('#password').val();
		if(cpass.length >= 8 && cpass == pass){
			$('#cpass').html("");
		} else {
			$('#cpass').html("Password did not match!");
		}
	});

	$('#submit').on('click',function(){
		var fname = $('#firstname').val();
		var lname = $('#lastname').val();
		var emailadd = $('#eadd').val();
		var pass = $('#password').val();
		var cpass = $('#confirmpassword').val();

		if(fname.length > 0 && lname.length > 0 && emailadd.length > 0 && pass.length >= 8 && cpass.length >= 8 && pass == cpass){
			alert('Congratulations! Please Log In now!');
		} else {
			alert('Invalid Registration!');
			return false;
		}
	});
});