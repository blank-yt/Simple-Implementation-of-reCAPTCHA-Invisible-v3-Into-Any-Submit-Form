<!DOCTYPE HTML>
<!-- DO NOT FORGET TO CHANGE !YOUR_SECRET_KEY! to YOUR SECRET KEY FROM GOOGLE ADMIN CONSOLE - row 17 -->
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>reCAPTCHA v3 | response</title>
	</head>
	<body>
		<?php
			foreach ($_POST as $key => $value) {
				echo 'key: '.$key.' value: '.$value.'<br />';
			}

			if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['recaptcha_response'])) {
				$recaptcha_url = 'https://www.google.com/recaptcha/api/siteverify';
				$recaptcha_secret = '!YOUR_SECRET_KEY!';
				$recaptcha_response = $_POST['recaptcha_response'];

				$recaptcha = file_get_contents($recaptcha_url.'?secret='.$recaptcha_secret.'&response='.$recaptcha_response);
				$recaptcha = json_decode($recaptcha);

				foreach ($recaptcha as $key => $value) {
					echo 'object: '.$key.' value: '.$value.'<br />';
				}

				if($recaptcha->score >= 0.5) { // BOTS GET LOW SCORE; READ ABOUT SCORE HERE: https://developers.google.com/recaptcha/docs/v3
					echo 'verification succesful';
				} else {
					echo 'verification failed';
					exit;
				}
			}
		?>
  </body>
</html>
