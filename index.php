<?php include "header.php"; ?>
<script type="text/javascript">
	function run(subject_id) {
	
		var x = document.getElementById(subject_id)
		if (x.style.display === "none") {
			x.style.display = "block";
		} else {
			x.style.display = "none";
		}
	}
</script>
<style>
	.menu_name{
		margin: 20px;
		color: maroon;
		font-weight: bold;
	}

	.content{
		margin: 20px;
		font-size: 18px;
	}
</style>
<div class="main">
	<div class="sidebar">
		<?php
		$conn = mysqli_connect('localhost', 'tushar', 'tushar', 'project');
		$sql = "SELECT * FROM subjects";
		$result = mysqli_query($conn, $sql);
		$ans = mysqli_fetch_all($result, MYSQLI_ASSOC);
		$sql2 = "SELECT * FROM pages";
		$result2 = mysqli_query($conn, $sql2);
		$ans2 = mysqli_fetch_all($result2, MYSQLI_ASSOC);
		foreach ($ans as $subject) {
			if ($subject['visible'] == "Yes") {
		?>
				<a href="#">
					<h2 onclick="run(<?php echo $subject["id"]; ?>	)"><?php echo $subject["menu_name"]; ?></h2>
				</a>
				<ul id="<?php echo $subject["id"]; ?>" display="none">

					<?php
					foreach ($ans2 as $pages) {

						if ($subject["id"] == $pages["subject_id"]) {
					?>


							<a href="?id=<?php echo $pages['id'] ?>">
								<li><?php echo $pages['menu_name']; ?></li>
							</a>
							<?php echo $pages['content']; ?></p>



			<?php
						}
					}
			
					echo "</ul>";
				}
			}
			?>
	</div>
	<div class="main_content">
		<?php
		if (!empty($_GET['id'])) {
			$page_id = $_GET['id'];
			$conn = mysqli_connect('localhost', 'tushar', 'tushar', 'project');
			$sql = "SELECT * FROM pages WHERE id =$page_id";
			$result = mysqli_query($conn, $sql);
			$ans = mysqli_fetch_all($result, MYSQLI_ASSOC);
			if ($ans[0]['visible'] != "Yes") {
				echo "<h1>Wrong access!!</h1>";
				exit();
			}
		?>
			<div class="page">
				<h2 class="menu_name"><?php echo $ans[0]["menu_name"] ?></h2>
				<p class="content"><strong><?php echo $ans[0]["content"]; ?></strong></p>
			</div>
		<?php
		}
		?>
	</div>
</div>
