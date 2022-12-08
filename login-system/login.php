<?php
session_start();
include "db_conn.php"; 
if (isset($_POST['emailID']) && isset($_POST['password']) && isset($_POST['name'])){
	function validate($data){
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data;
	}
	$emailID = validate($_POST['emailID']);
	$pass = validate($_POST['password']);
	$name = validate($_POST['name']);
	
	
	if (empty($emailID)){
		header("Location: index.php?error=Email ID is required");
		exit();
	}else if(empty($pass)){
		header("Location: index.php?error=Password is required");
		exit();
	}else if (empty($name)){
		header("Location: index.php?error=Username is required");
		exit();
	}else{
		// hashing the password
		$pass = md5($pass);
		
		
		$sql = "SELECT * FROM users WHERE email_id='$emailID' AND password='$pass' AND name='$name'";
		
		$result = mysqli_query($conn, $sql);
		
		if (mysqli_num_rows($result) === 1){
			$row = mysqli_fetch_assoc($result);
			if($row['email_id'] === $emailID && $row['password'] === $pass && $row['name'] === $name){
				$_SESSION['email_id'] = $row['email_id'];
				$_SESSION['name'] = $row['name'];
				$_SESSION['id'] = $row['id'];
				header("Location: home.php");
				exit();
			}else{
				header("Location: index.php?error=Incorrect input");
				exit();
			}
		}else{
			header("Location: index.php?error=Incorrect input");
			exit();
		}
	}
	
}else{
	header("Location: index.php");
	exit();
	
}