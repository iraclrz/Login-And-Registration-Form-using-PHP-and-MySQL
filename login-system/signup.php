<!DOCTYPE html>
<html>
<head>
	<title>REGISTER</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700&display=swap" rel="stylesheet">
</head>
<body>
	<form action="signup-check.php" method="post">
		<h2>REGISTER</h2>
		<?php if (isset($_GET['error'])){ ?>
			<p class="error"><?php echo $_GET['error']; ?></p>
		<?php } ?>
		
		<?php if (isset($_GET['success'])){ ?>
			<p class="success"><?php echo $_GET['success']; ?></p>
		<?php } ?>
		
		<label>Preferred User Name</label>
		<?php if (isset($_GET['name'])){ ?>
			<input type="text" name="name" value="<?php echo $_GET['name']; ?>" size="50" maxlength="255" placeholder="Preferred User name" required title="Please type your preferred user name" required="required" /><br>
		<?php }else{ ?>
			<input type="text" name="name" value="" size="50" maxlength="255" placeholder="Preferred user name" required title="Please type your preferred user name" required="required" /><br>
		<?php }?>
		
		<label>Email ID</label>
		<?php if (isset($_GET['emailID'])){ ?>
			<input type="text" name="emailID" value="<?php echo $_GET['emailID']; ?>" size="50" maxlength="255" placeholder="Email ID" required title="Please type your email ID" required="required" /><br>
		<?php }else{ ?>
			<input type="text" name="emailID" value="" size="50" maxlength="255" placeholder="Email ID" required title="Please type your email ID" required="required" /><br>
		<?php }?>
		
		
		<label>Password</label>
		<input type="password" name="password" id="Show" value="" size="50" maxlength="255" placeholder="Password" required title="Please type your password" required="required" />
		<div class="password_area">	
			<label class="show-pw">Show Password</label>
			<input class="check" name="" type="checkbox" onclick="myFunction()" ><br>
		</div>
		
		<label>Re-enter Password</label>
		<input type="password" name="re_password" id="Show2" value="" size="50" maxlength="255" placeholder="Re-enter Password" required title="Please re-enter your password" required="required" />
		<div class="password_area">	
			<label class="show-pw">Show Password</label>
			<input class="check" name="" type="checkbox" onclick="myFunction2()" ><br>
		</div>
		<button type="submit">Register</button>
		<a href="index.php" class="ca">Already have an account?</a>
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
		function myFunction2(){
			var show = document.getElementById('Show2');
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