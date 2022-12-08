<!DOCTYPE html>
<html>
<head>
	<title>LOGIN FORM</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700&display=swap" rel="stylesheet">
</head>
<body>
	<form action="login.php" method="post">
		<h2>LOGIN FORM</h2>
		<?php if (isset($_GET['error'])){ ?>
		<p class="error"><?php echo $_GET['error']; ?></p>
		<?php } ?>
		<label>Email ID</label>
		<input type="text" name="emailID" value="" size="50" maxlength="255" placeholder="Email ID" required title="Please type your Email ID"  required="required" /><br>
		
		<label>Password</label>
		<input type="password" name="password" id="Show" value="" size="50" maxlength="255" placeholder="Password" required title="Please type your password" required="required" />
		<div class="password_area">	
			<label class="show-pw">Show Password</label>
			<input class="check" name="" type="checkbox" onclick="myFunction()" ><br>
		</div>
		
		<label>Preferred User Name</label>
		<input type="text" name="name" value="" size="50" maxlength="255" placeholder="Preferred user name" required title="Please type your preferred user name" required="required" /><br>
		
		<button type="submit">Login</button>
		<a href="signup.php" class="ca">Create an account</a>
	</form>
	<script type="text/javascript">
		function myFunction(){
			var show = document.getElementById('Show');
			if (show.type=='password'){
				show.type='text';
			}	
			else{
				show.type='password';
			}
		}
	</script>
	
</body>
</html>