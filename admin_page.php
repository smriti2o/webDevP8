<?php  include "header_admin.php"; ?>
<?php 
	session_start(); 
	if($_SESSION["power"]!= "admin"){
		return_back(); 
	} 
	if (isset($_POST['logout'])) {	
		$_SESSION["power"] = "exit";
		header("Location: admin.php?message=Logout successfull!");
	}

?>

<style>
	.heading{
		color: maroon;
		margin-bottom: 20px;
	}

	.submit input{
		border: 0;
		background-color: #ffffcc;
		font-size: 20px;
		margin: 0;
		padding:0;
		color: maroon;
		cursor: pointer;
		text-decoration: underline;
	}
</style>
<div class="main">
<div class="sidebar">
	<br>
<br>
<br>
<br>

</div>
<div class="main_content" id="admin_main">
	<h1 class="heading">Admin Menu</h1>
	<p>Welcome to the Admin Area</p>
	<ul class="admin-privileges">
		<li>
			<a href="admin_websitecontent.php">Manage website contents</a>
		</li>
		<li>
			<a href="edit_showadmins.php">Manage admins</a>
		</li>
		<li>
			<form class="submit" method="post" action="admin_page.php">
				<input type="submit" name="logout" value = "Logout">
			</form>
		</li>
	</ul>

</div>
</div>

