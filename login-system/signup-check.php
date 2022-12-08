<?php
session_start();
include "db_conn.php"; 
if (isset($_POST['emailID']) && isset($_POST['password']) && isset($_POST['name']) 
	&& isset($_POST['re_password'])){
	function validate($data){
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data;
	}
	$emailID = validate($_POST['emailID']);
	$pass = validate($_POST['password']);
	$name = validate($_POST['name']);
	$re_pass = validate($_POST['re_password']);
	
	$user_data = 'emailID='.$emailID. '&name='. $name;
	
	
	if (empty($emailID)){
		header("Location: signup.php?error=Email ID is required&$user_data");
		exit();
	}else if(empty($pass)){
		header("Location: signup.php?error=Password is required&$user_data");
		exit();
	}else if (empty($name)){
		header("Location: signup.php?error=Username is required&$user_data");
		exit();
	}
	else if ($pass  !== $re_pass){
		header("Location: signup.php?error=The confirmation password does not match.&$user_data");
		exit();
	}
	else if(empty($re_pass)){
		header("Location: signup.php?error=Re Password is required&$user_data");
		exit();
	}else{
		// hashing the password
		$pass = md5($pass);
		$sql = "SELECT * FROM users WHERE email_id='$emailID' ";
		
        $result = mysqli_query($conn, $sql);
		
		if (mysqli_num_rows($result) > 0){
			header("Location: signup.php?error=The email ID is taken. Please try another.&$user_data");
			exit();
		}else{
			$sql2 = "INSERT INTO users(email_id, password, name) VALUES('$emailID', '$pass', '$name')";
			$result2 = mysqli_query($conn, $sql2);
			if ($result2){
				header("Location: signup.php?success=Your account has been created successfully.");
				exit();
			}else{
				header("Location: signup.php?error=Unknown error occured.&$user_data");
				exit();
			}
		}
	}
	
}else{
	header("Location: signup.php");
	exit();
	
}