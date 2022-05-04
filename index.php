<!DOCTYPE HTML>
<!-- DO NOT FORGET TO CHANGE !YOUR_SITE_KEY! to YOUR SITE KEY FROM GOOGLE ADMIN CONSOLE (TWICE IN THIS CASE) - row 8 & 11 -->
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>reCAPTCHA v3</title>
		<script src="https://www.google.com/recaptcha/api.js?render=!YOUR_SITE_KEY!"></script>
		<script>
			grecaptcha.ready(function() {
				grecaptcha.execute('!YOUR_SITE_KEY!', { action: 'submit' }).then(function(token) {
					var recaptchaResponse = document.getElementById('recaptchaResponse');
					recaptchaResponse.value = token;
				});
			});
		</script>
		<style>
		/*.grecaptcha-badge {
			visibility: hidden;
		}*/
		</style>
	</head>
	<body>
		<h2>reCAPTCHA v3</h2><br />
		<form action="response.php" method="post">
			<label for="nick">Nick:</label>
			<input type="nick" name="nick" />
			<br /><br />
			<input type="hidden" name="recaptcha_response" id="recaptchaResponse" />
			<br />
			<button type="submit">Submit me</button>
		</form>
  </body>
</html>
