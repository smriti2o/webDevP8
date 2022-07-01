<?php include 'header_admin.php'; ?>
<?php
if (empty($_GET['id'])) {

	echo "Please Retry!<br>";
	echo "<a href='index.php'>Go back</a>";
	exit();
}
$page_id = $_GET['id'];
$page_name  = $_POST['page_name'];
$position = $_POST['position'];
$visibility = $_POST['input_user'];
$content = $_POST['content'];
if (empty($visibility)) {
	header("Location: display_pagewithid.php?message=fill the form completely");
	exit();
}

$conn = mysqli_connect('localhost', 'tushar', 'tushar', 'project');
$sql = "SELECT * FROM pages WHERE id =$page_id";
$result = mysqli_query($conn, $sql);
$ans = mysqli_fetch_all($result, MYSQLI_ASSOC);
if (empty($ans)) {
	echo "wrong id!";
	exit();
}
$sql = "UPDATE pages SET menu_name = '$page_name', position = '$position',visible = '$visibility',content = '$content' WHERE id = $page_id";
$result = mysqli_query($conn, $sql);
if ($result != 0) {
	echo "Page has been changed !";
	header("Location: display_pagewithid.php?message=Page has been changed!");
	exit();
}
header("Location: display_pagewithid.php?message=There has been some errors so please retry!");
?>