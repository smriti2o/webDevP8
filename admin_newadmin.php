<?php
include "header.php";
?>
<?php
session_start();
if ($_SESSION["power"] != "admin") {
	return_back();
}
if (!empty($_GET['message'])) {
	$message = $_GET['message'];
	echo htmlspecialchars($message); 
}
?>
<div class="main">
	<div class="sidebar">
		<a href="admin_page.php">Main Menu</a>
	</div>
	<div class="main_content">
		<form action="add_newadmin.php" method="post">
			<table width="500px" height="250px" cellpadding="2px" cellspacing="2px" align="center">
				<tr>
					<td>Enter username:</td>
					<td><input type="text" name="uname"></td>
				</tr>
				<tr>
					<td>Enter password:</td>
					<td><input type="password" name="password"></td>
				</tr>
				<tr>
					<td>Confirm password:</td>
					<td><input type="password" name="C_password"></td>
				</tr>
			</table>
			<input type="submit" value="Submit">
		</form>
	</div>
</div>
