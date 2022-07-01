<?php 

	session_start(); 
	if($_SESSION["power"]!= "admin"){
	}

	$id = $_GET['id'];
	echo $id;
$conn = mysqli_connect('localhost','tushar','tushar','project');
	$sql = "SELECT * FROM pages WHERE id ='$id'";
	$result = mysqli_query($conn,$sql);
	$ans = mysqli_fetch_all($result,MYSQLI_ASSOC);
	if(empty($ans)){
		header("Location: display_pagesodsubject.php?message=there are no pages for this $id");
		exit();
	}
	$sql = "DELETE FROM pages WHERE id ='$id'";
	$result = mysqli_query($conn,$sql);
