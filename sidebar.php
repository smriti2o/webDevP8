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
<div class="sidenav">
	<?php
	foreach ($ans as $subject) {
		if ($subject['visible'] == "Yes" or 1 == 1) {
	?>

			<a href="?id=<?php echo $subject['id']; ?>"><?php echo $subject["menu_name"]; ?></a>
			<?php
			?>
			<ul>
				<?php
				foreach ($ans2 as $pages) {


					if ($subject["id"] == $pages["subject_id"]) {
				?>
						<a href="pages.php?id=<?php echo $pages['id'] ?>">
							<li><?php echo $pages['menu_name']; ?></li>
						</a>
		<?php
					}
				}
				echo "</ul>";
			}
		}
		?>
</div>

<h4><a href="new_subject.php">Add Subject</a></h4>
<?php include "footer.php"; ?> 

<div class="main">
	<?php
	if (!empty($_GET['update'])) {
		$id = $_GET['id'];
		$sql = "SELECT * FROM subjects WHERE id ='$id'";
		$result = mysqli_query($conn, $sql);
		
		$ans = mysqli_fetch_all($result, MYSQLI_ASSOC);
		if (!empty($ans)) {
			echo "Wrong id!";
			
			exit();
		}
		




	}


	?>
	<h1><?php echo $ans[0]['menu_name']; ?></h1>
	<p><?php echo $ans[0]['position']; ?><br><?php echo $ans[0]['visible']; ?></p>
	...
</div>
<style type="text/css">
	/* The sidebar menu */
	.sidenav {
		height: 100%;
		/* Full-height: remove this if you want "auto" height */
		width: 250px;
		/* Set the width of the sidebar */
		position: fixed;
		/* Fixed Sidebar (stay in place on scroll) */
		/* z-index: 1; */
		/* Stay on top */
		top: 0;
		/* Stay at the top */
		left: 0;
		background-color: #111;
		/* Black */
		overflow-x: hidden;
		/* Disable horizontal scroll */
		padding-top: 20px;
	}

	/* The navigation menu links */
	.sidenav a {
		padding: 6px 8px 6px 16px;
		text-decoration: none;
		font-size: 20px;
		color: #fff;
		display: block;
	}

	/* When you mouse over the navigation links, change their color */
	.sidenav a:hover {
		color: #f1f1f1;
	}

	/* Style page content */
	.main {
		margin-left: 160px;
		/* Same as the width of the sidebar */
		padding: 0px 10px;
	}

	/* On smaller screens, where height is less than 450px, change the style of the sidebar (less padding and a smaller font size) */
	@media screen and (max-height: 450px) {
		.sidenav {
			padding-top: 15px;
		}

		.sidenav a {
			font-size: 18px;
		}
	}
</style>