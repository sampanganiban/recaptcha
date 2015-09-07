<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Registration Form</title>
</head>
<body>

	<?php

		// If the user has submitted the form
		if( isset($_POST['register-account']) ) {

			// We need the recaptcha library
			require 'recaptchalib.php';
			
			$privateKey = '6LcIcQwTAAAAAObJvz_03s18Q1fd6_VFPOMJYTEO';
			
			$result = recaptcha_check_answer (
												$privateKey, 
												$_SERVER['REMOTE_ADDR'],
												$_POST['recaptcha_challenge_field'],
												$_POST['recaptcha_response_field']
											 );
			// If the user was correct
			if($result->is_valid) {
				die('Capture is valid :)');
			} else {
				$message = 'Capture was wrong :(';
			}
		}

	?>

	<h1>Register an Account</h1>

	<form action="index.php" method="post">
		
		<div>
			<label for="username">Username: </label>
			<input type="text" id="username" name="username">
		</div>
		
		<div>
			<label for="password">Password: </label>
			<input type="password" id="password" name="password">
		</div>

		<?php

			// Require the recaptcha library
			require_once('recaptchalib.php');
			
			$publickey = '6LcIcQwTAAAAAA7QhKrwY7UMUOZBdaBcuQ2gagyr';
			
			echo recaptcha_get_html($publickey);

		?>
		
		<input type="submit" value="Register!" name="register-account">

		<?php

			if( isset($message) ) {
				echo $message;
			}
		?>

	</form>



















	
</body>
</html>