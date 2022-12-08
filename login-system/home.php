<?php
session_start();

if (isset($_SESSION['id']) && isset($_SESSION['email_id'])){
	

?>
<!DOCTYPE html>
<html>
<head>
	<title>HOME</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700&display=swap" rel="stylesheet">
</head>
<body>
	<h1>Hello, <?php echo $_SESSION['name'];  ?></h1>
	<a href="logout.php" class="da">Logout</a>
</body>
</html>

<?php
}else{
	header("Location: index.php");
	exit();
}
?>