<!DOCTYPE html>
<html lang='en'>
	<head>
		<title>Registration</title>
		<?php
		    $this->load->view('partials/meta.php');
		?>
	</head>
	<body>
		<div id="wrapper">
			<fieldset id="login">
				<legend>Login</legend>
				<div id="panel">
					<form action='/login' method='post'>
						<label class='left'>Email:</label><input class='right' type='email' name='email' placeholder='your email'/>
						<label class='left'>Password:</label><input class='right' type='password' name='password'></input>
						<div class='clear'></div>
						<input type='hidden' name='login' value='login'/>
						<input class='right' type='submit' value='Login'/>
					</form>
				</div>
			</fieldset>
			<?php
			    $this->load->view('partials/flash_messages.php');
			?>
			<fieldset id="register">
				<legend>Registration</legend>
				<div id="panel">
					<form action='/students/welcome' method='post'>
						<label class='left'>First Name:</label><input class='right' type='text' name='first_name' placeholder='your first name'/>
						<label class='left'>Last Name:</label><input class='right' type='text' name='last_name' placeholder='your last name'/>
						<label class='left'>Email:</label><input class='right' type='email' name='email' placeholder='your email'/>
						<label class='left'>Password:</label><input class='right' type='password' name='password'></input>
						<label class='left'>Confirm Password:</label><input class='right' type='password' name='confirm_password'></input>
						<div class='clear'></div>
						
						<input type='hidden' name='register' value='register'/>
						<input class='right' type='submit' value='Register'/>
					</form>
				</div>
			</fieldset>
		</div>
	</body>
</html>
