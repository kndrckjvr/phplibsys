/*
	jQuery document ready.
*/
$(document).ready(
	function() {
		//setTimeout(function(){
			$('#loader').css('display', 'none');
			$('#load').css('display', 'block');
		//}, 2000);
	}
);

$(document).ready(function() {
	$('#password').keyup(function() {
		$('#result').html(checkStrength($('#password').val()))
	});
});
/*
$(document).ready(function() {
	$('#password2').keyup(function() {
		$('#result').html(checkStrength($('#password2').val()))
	});
});
*/

$(document).ready(function() {
	$('#password2').keyup(function() {
		$('#result2').html(matchPassword( $('#password').val() ,$('#password2').val() ))
	});
});


$(document).ready(function() {
	$('#password').keyup(function() {
		$('#result2').html(matchPassword( $('#password').val() , $('#password2').val()))
	});
});

/*
function matchPassword(){
	var pass1 = document.getElementById("password").value;
	var pass2 = document.getElementById("password2").value;
	var ok = true;
	if(pass1 != pass2){
       	document.getElementById('result2').innerHTML = 'NOT MATCHED';
	}
	else{
       	document.getElementById('result2').innerHTML = 'MATCHED';
	}
}
*/

function matchPassword(password1,password2){
	//var submitUpdate = document.createElement('submit');
	if(!(password1 == "" && password2 == "")){
		if(password1 == password2){
			if(password1.length>=6){
				$('#submitUpdate').prop('disabled', false);
				$('#result2').removeClass()
				$('#result2').addClass('good')
				return 'Password is match'
			}
			else{
				$('#result').html(checkStrength(password1));
				$('#result2').removeClass()
				$('#result2').addClass('good')
				return 'Password is match'
			}
		}
		else{
			$('#submitUpdate').prop('disabled', true);
			$('#result2').removeClass()
			$('#result2').addClass('short')
			return 'Password is not match'

		}
	}
	else{
			$('#submitUpdate').prop('disabled', false);
			$('#result').html("").removeClass();
			$('#result2').html("").removeClass();

	}
	
}

function checkStrength(password) {
	var strength = 0;
	if (password.length < 6) { 
		$('#submitUpdate').prop('disabled', true);
		$('#result').removeClass()
		$('#result').addClass('short')
		return 'Too short' 
	}
	if (password.length > 7) strength += 1
	if (password.match(/([a-z].*[A-Z])|([A-Z].*[a-z])/))  strength += 1
	if (password.match(/([a-zA-Z])/) && password.match(/([0-9])/))  strength += 1 
	if (password.match(/([!,%,&,@,#,$,^,*,?,_,~])/))  strength += 1
	if (password.match(/(.*[!,%,&,@,#,$,^,*,?,_,~].*[!,%,&,@,#,$,^,*,?,_,~])/)) strength += 1
	if (strength < 2 ) {
		$('#result').removeClass()
		$('#result').addClass('weak')
		return 'Weak'			
	}	else if (strength == 2 ) {
		$('#result').removeClass()
		$('#result').addClass('good')
		return 'Good'		
	}	else {
		$('#result').removeClass()
		$('#result').addClass('strong')
		return 'Strong'
	}
}

function hasNum(string) {
	return /\d/.test(string);
}

function isValidEmail(email) {
  var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
  return re.test(email);

}

function checkInputs() {
	var strength = checkStrength(document.getElementById('password').value);
	var fname = document.getElementById('fname').value;
	var lname = document.getElementById('lname').value;
	var email = document.getElementById('email').value;
	if((strength == 'Good' || strength == 'Strong')&& !hasNum(fname) && !hasNum(lname) && isValidEmail(email)) {
		return true;
	} else {
		var msg = "";
		if(hasNum(fname)) {
			msg += "Your First Name has a number.\n";
		}
		if(hasNum(lname)){
			msg += "Your Last Name has a number.\n";
		}
		if(strength == 'Too short' || strength == 'Weak') {
			msg += "Your password is too weak";
		}
		if(!isValidEmail(email)) {
			msg += "Your email is not valid";
		}
		alert(msg);
		return false;
	}
}

function checkInputsBook() {
	var author = document.getElementById('author').value;
	if(!hasNum(author)) {
		alert("You have successfully added the book!");
		return true;
	} else {
		var msg = "";
		if(hasNum(author))
			msg += "Book Author has a number.\n";
		alert(msg);
		return false;
	}
}

$(document).ready(function() {
    setInterval(timestamp, 1);
});

function timestamp() {
    $.ajax({
        url: 'http://localhost/librarymanagementsystem/timestamp.php',
        success: function(data) {
            $('#timestamp').html(data);
        },
    });
}