<?php 
$conn = mysqli_connect('localhost','tushar','tushar','project');
	$uname = $_POST['uname'];
	$pass = $_POST['password'];
	function return_back(){
		header("Location: admin.php");
	}
	$hash = password_hash($pass, PASSWORD_DEFAULT);
	$sql = "SELECT * FROM admin WHERE username = '$uname'";
	$result = mysqli_query($conn,$sql);

	$ans = mysqli_fetch_all($result,MYSQLI_ASSOC);
	if(empty($ans)){
		return_back();
	}
	$hashed_password = $ans[0]['hashed_password'];
	if (!empty($hashed_password)){
		$re = password_verify($pass, $hashed_password);
		if($re){
			session_start();
			$_SESSION["power"] = "admin";
			header("Location: admin_page.php");
		}
		else{
			return_back();	
		}
	}

