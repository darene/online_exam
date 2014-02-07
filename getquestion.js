$(document).ready(function(){
	var question_id = 1;
	var answer_id = 0;
	var answer;
	var total = 0;
	$('#submit').click(function(){
		if($('#radio1').is(':checked')){
			answer = $('#radio1').val();
		} else if($('#radio2').is(':checked')){
			answer = $('#radio2').val();
		} else if($('#radio3').is(':checked')){
			answer = $('#radio3').val();
		} else if($('#radio4').is(':checked')){
			answer = $('#radio4').val();
		} else {
			alert('Panget si Jocel!!!!!!');
			return false;
		}

		if (question_id < 10){
			question_id++;
			answer_id++;
			$.ajax({
				url: 'backendAJAX.php',
				type: 'POST',
				data: {question_id:question_id,answer:answer,answer_id:answer_id},
				dataType:'JSON',


				success: function(response){
					if(response.score == 1){
						total = total + 1;
					}
					alert(total);
					$('#questionPage').html(response.question);
					$('#a').html("<input type ='radio' id ='radio1' name = 'choice' value ='" + response.choiceA + "'>" + response.choiceA);
					$('#b').html("<input type ='radio' id ='radio2' name = 'choice' value ='" + response.choiceB + "'>" + response.choiceB);
					$('#c').html("<input type ='radio' id ='radio3' name = 'choice' value ='" + response.choiceC + "'>" + response.choiceC);
					$('#d').html("<input type ='radio' id ='radio4' name = 'choice' value ='" + response.choiceD + "'>" + response.choiceD);
				}
			});
		} else {
			$.ajax({
				url: 'backendAJAX2.php',
				type: 'POST',
				data: {answer:answer},
				dataType:'JSON',


				success: function(response){
					if(response.score == 1){
						total = total + 1;
					}
					$('#container').hide(1000).show(1000).html("<h1> Your Score is "+ total + "</h1>");

					
				}
			});
		}
	});
});