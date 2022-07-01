<?php include "header_admin.php"; ?>
<?php
session_start();
if ($_SESSION["power"] != "admin") {
	return_back();
}
if (!empty($_GET['id'])) {
	$id = $_GET['id'];

	$conn = mysqli_connect('localhost', 'tushar', 'tushar', 'project');
	$sql = "SELECT * FROM admin WHERE id =$id";
	$result = mysqli_query($conn, $sql);
	$ans = mysqli_fetch_all($result, MYSQLI_ASSOC);

	if (empty($ans)) {
	
		echo "Wrong id given!";
		exit();
	}
?>
	<div class="main">
		<div class="sidebar">
			<a href="admin_page.php">Main Menu</a>
		</div>
		<div class="main_content">
			<h3><?php echo $ans[0]["username"]; ?></h3>
			<br>
			<a href="?update=<?php echo $id ?>">Update</a>
			<br>
			<a href="?delete=<?php echo $id ?>">Delete</a>
		</div>
	</div>
<?php

	exit();
}
if (!empty($_GET['update'])) {
	$id = $_GET['update'];
	$conn = mysqli_connect('localhost', 'tushar', 'tushar', 'project');
	$sql = "SELECT * FROM admin WHERE id =$id";
	$result = mysqli_query($conn, $sql);
	$ans = mysqli_fetch_all($result, MYSQLI_ASSOC);
	if (empty($ans)) {
		echo "Wrong id given!";
		exit();
	}
?>
	<div class="main">
		<div class="sidebar">
			<a href="admin_page.php">Main Menu</a>
		</div>
		<div class="main_content">
			<form method="post" action="update_adminpassword.php?id=<?php echo $id; ?>">
				Password: <input type="text" name="password">
				Confirm Password:<input type="password" name="c_password">
				<input type="submit" name="sumbit">
			</form>
		</div>
	<?php
	exit();
}


if (!empty($_GET['delete'])) {
	$id = $_GET['delete'];
	$conn = mysqli_connect('localhost', 'tushar', 'tushar', 'project');
	$sql = "DELETE FROM admin WHERE id =$id";
	$result = mysqli_query($conn, $sql);
}

$conn = mysqli_connect('localhost', 'tushar', 'tushar', 'project');
$sql = "SELECT * FROM admin";
$result = mysqli_query($conn, $sql);
$ans = mysqli_fetch_all($result, MYSQLI_ASSOC);
if (empty($ans)) {
	echo "There are no users stored in the database!";
	exit();
}
	?>
	<div class="main">
		<div class="sidebar">
			<a href="admin_page.php">Main Menu</a>
		</div>
		<div class="main_content">
			<h1 style="color:maroon; margin-bottom:20px;">Manage Admins</h1>
			<?php
			foreach ($ans as $user) {
				if($user["username"] != ""){
					echo $user["username"];
					echo "<a href='?id="; 
					echo $user["id"];
					echo "'>&emsp;&emsp;&emsp;&emsp;&emsp;Edit</a>";
					echo "<br>";
				}
			}

			?>
			<br>
			<a href="admin_newadmin.php">Insert a new admin</a>
			<br>
		</div>
	</div>
