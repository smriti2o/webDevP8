<?php 
	session_start(); 
	if($_SESSION["power"] != "admin"){
		return_back(); 
	}
	$uname = $_POST['uname'];
	$pass = $_POST['password'];
	$c_pass = $_POST["C_password"];
	if($pass != $c_pass){
		header("Location: admin_newadmin.php?message=password doesnt match");
		exit();
	}
	$conn = mysqli_connect('localhost','tushar','tushar','project');
	$sql = "SELECT * FROM admin WHERE username = '$uname'";
	$result = mysqli_query($conn,$sql);
	$ans = mysqli_fetch_all($result,MYSQLI_ASSOC);
	if(!empty($ans)){
		header("Location: admin_newadmin.php?message=choose a unique username");
		exit();
	}
	$hash = password_hash($pass, PASSWORD_DEFAULT);
	$sql = "INSERT INTO admin(username,hashed_password) VALUES('$uname','$hash')";
	if(mysqli_query($conn,$sql)){
		header("Location: admin_newadmin.php?message=successfully added that account in admins");
	}
	else{
		echo "connection error!!". mysqli_error($conn);
	}
