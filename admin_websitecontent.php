<?php include "header_admin.php"; ?>
<?php
session_start();
if ($_SESSION["power"] != "admin") {
	return_back();
}
$conn = mysqli_connect('localhost', 'tushar', 'tushar', 'project');
$sql = "SELECT * FROM subjects";
$result = mysqli_query($conn, $sql);
$ans = mysqli_fetch_all($result, MYSQLI_ASSOC);

?>

<?php
$conn = mysqli_connect('localhost', 'tushar', 'tushar', 'project');
$sql = "SELECT * FROM subjects";
$result = mysqli_query($conn, $sql);
$ans = mysqli_fetch_all($result, MYSQLI_ASSOC);
$sql2 = "SELECT * FROM pages";
$result2 = mysqli_query($conn, $sql2);
$ans2 = mysqli_fetch_all($result2, MYSQLI_ASSOC);
?>

<style>
	.add-sub{
		display: block;
		margin-top: 40px;
	}
</style>

<div class="main">
	<div class="sidebar">
		<a href="admin_page.php">Main Menu</a>
		<?php
		foreach ($ans as $subject) {
			if ($subject['visible'] == "Yes" or 1 == 1) {
		?>

				<a href="?update=<?php echo $subject['id']; ?>">
					<h2><?php echo $subject["menu_name"]; ?></h2>
				</a>
				<?php
				?>
				<ul>
					<?php
					foreach ($ans2 as $pages) {


						if ($subject["id"] == $pages["subject_id"]) {
					?>
							<a href="display_pagewithid.php?id=<?php echo $pages['id'] ?>">
								<li><?php echo $pages['menu_name']; ?></li>
							</a>
			<?php
						}
					}
					echo "</ul>";
				}
			}
			?>

		<a class="add-sub" href="new_subject.php">+ Add Subject</a>
	</div>
	<div class="main_content">
		<?php
		if (!empty($_GET['update'])) {
			$id = $_GET['update'];
			$sql = "SELECT * FROM subjects WHERE id ='$id'";
			$result = mysqli_query($conn, $sql);
			$ans = mysqli_fetch_all($result, MYSQLI_ASSOC);
			if (empty($ans)) {
				echo "Wrong id!";
				exit();
			}
			echo "<h1>Menu name: " . $ans[0]['menu_name'] . "</h1>";
			echo "<p>Position: " . $ans[0]['position'] . "<br> Visibility: " . $ans[0]['visible'] . "</p>";
			echo "<a href='update_subjectfromid.php?id= $id'> Update</a><br>";
			echo "<a href='create_newpageforsubject.php?id= $id'>Insert a new page</a>";
		}
		?>
		<p>Please select a subject or a page.</p>
	</div>
</div>
