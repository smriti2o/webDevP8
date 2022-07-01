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
<?php
$id = $_GET["id"];
$conn = mysqli_connect('localhost', 'tushar', 'tushar', 'project');
$sql = "SELECT * FROM pages WHERE subject_id ='$id'";
$result = mysqli_query($conn, $sql);
$ans = mysqli_fetch_all($result, MYSQLI_ASSOC);
if (empty($ans)) {
	header("Location: display_subjectpages.php?message=there are no pages for is $id");
	exit();
}

?>
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
			<a href="delete_pagewithid.php?id=<?php echo $value['id']; ?>">Delete</a>
		</li>

	</ul>
<?php } ?>
</div>
<h3><a href="display_subjectpages.php">Return back</a></h3>
