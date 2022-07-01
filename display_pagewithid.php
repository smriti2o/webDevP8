<?php include 'header_admin.php'; ?>
<?php
if (!empty($_GET['message'])) {
	$message = $_GET['message'];
	echo htmlspecialchars($message);
	echo "<a href='admin_page.php'>Go back</a>";
	exit();
}
if (empty($_GET['id'])) {

	echo "Please Retry!<br>";
	echo "<a href='index.php'>Go back</a>";
	exit();
}
$page_id = $_GET['id'];


$conn = mysqli_connect('localhost', 'tushar', 'tushar', 'project');
$sql = "SELECT * FROM pages WHERE id =$page_id";
$result = mysqli_query($conn, $sql);
$ans = mysqli_fetch_all($result, MYSQLI_ASSOC);
if ($ans[0]['visible'] != "Yes") {
	echo "<h1>Wrong access!!</h1>";
	echo "<a href='index.php'>Go back</a>";
	exit();
}
?>

<style>
	.edit input{
		margin-bottom: 20px;
		margin-top: 10px;
	}
</style>

<div class="main">
	<div class="sidebar">
		<a href="admin_page.php">Main Menu</a><br>
		<a href='admin_websitecontent.php'>Go back</a>
		<br>
	</div>
	<div class="main_content">
		<form class="edit" action="update_pageswithid.php?id=<?php echo $ans[0]['id']; ?>" method="post">
				<label>Menu name:</label>
				<input type="text" name="page_name" value="<?php echo $ans[0]["menu_name"] ?>"><br>
				<label>Position:</label>
				<input type="number" name="position" value="<?php echo $ans[0]["position"]; ?>"><br>
				<label>Visible:</label>
				
				<input type="radio" name="input_user" value="Yes">
				<label>Yes</label>
				<input type="radio" name="input_user" value="No">
				<label>No</label><br>
				<label>Content:</label><br>
				<textarea rows="5" name="content">
					<?php echo $ans[0]["content"]; ?>
				</textarea><br>
				<input type="submit" name="submited" value="Edit Page"></input>
		</form>
	</div>
</div>
