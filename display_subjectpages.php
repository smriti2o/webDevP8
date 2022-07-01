<?php include "header.php" ?>
<?php
session_start();
if ($_SESSION["power"] != "admin") {
	return_back();
}
if (!empty($_GET['message'])) {
	$message = $_GET['message'];
	echo htmlspecialchars($message);
}
$conn = mysqli_connect('localhost', 'tushar', 'tushar', 'project');
$sql = "SELECT * FROM subjects";
$result = mysqli_query($conn, $sql);
$ans = mysqli_fetch_all($result, MYSQLI_ASSOC);
?>


<div class="main">
	<div class="sidebar">
		<?php foreach ($ans as $value) {
			if ($value['visible'] != 'Yes') {
				continue;
			}

		?>
			<ul>
				<li>
					<?php
					echo htmlspecialchars($value['menu_name']);
					?>
					-->
					<?php echo htmlspecialchars($value['position']);
					?>
					-
					<?php
					echo htmlspecialchars($value['visible']);
					?>
					<br>
					<a href="delete_subjectfromid.php?id=<?php echo $value["id"]; ?>">Delete subject</a>
					<br>
					<a href="update_subjectfromid.php?id=<?php echo $value["id"]; ?>">Update subject</a>
					<br>
					<a href="create_newpageforsubject.php?id=<?php echo $value["id"]; ?>">Create page under this subject</a>
					<br>
					<a href="display_pagesofsubjectid.php?id=<?php echo $value["id"]; ?>">See the pages under this</a>
				</li>

			</ul>
		<?php } ?>
	</div>
	<div class="main_content">
		<h3><a href="admin_page.php">Return back</a></h3>
	</div>
</div>
