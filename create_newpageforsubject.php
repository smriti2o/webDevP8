<?php 
	include "header.php";
?>
<?php 
	session_start(); 
	if($_SESSION["power"]!= "admin"){
		return_back(); 
	}
	if(!empty($_GET['message'])) {
      $message = $_GET['message'];
      echo htmlspecialchars($message);
  	}
?>
<?php 
	$id =$_GET["id"];
?>
<div class="main">
<div class="sidebar">
  <a href="admin_page.php">Main Menu</a>
  <br>
</div>
<div class="main_content">
<form action="insert_newpageforsubject.php?subject_id=<?php echo "$id"; ?>" method="post">
	<table width="500px" height="250px"border="2px" cellpadding="2px" cellspacing="2px" align="center">
	    <tr>
	      <td>Page name:</td>
	      <td><input type="text" name="menu_name" ></td>
	    </tr>
	    <tr>
	      <td>Position:</td>
	      <td><input type="number" name="position"></td>
	    </tr>
	    <tr>
	      <td>Visible:</td>
	      <td>Yes<input type="radio" name="input_user" value = "Yes"> No<input type="radio" name="input_user" value="No"></td>
	    </tr>
	    <tr>
	      <td>Content:</td>
	    	<td>
	    	<textarea rows="5"  name="content">
			</textarea>
			</td>
	    </tr>
  	</table>
  <input type="submit" value="Submit">
</form>
</div>
</div>
<h3><a href="admin_websitecontent.php">Return back</a></h3>
