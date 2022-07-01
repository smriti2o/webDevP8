<?php include 'header.php'; ?>

<style>
  #login_heading{
    color: maroon;
    margin-bottom: 30px;
  }
  form input{
    margin-bottom: 30px;
  }
  form label{
    margin-right: 20px;
  }
</style>

<div class="main">
<div class="sidebar">
</div>
<div class="main_content">
<?php 
  if(!empty($_GET['message'])) {
      $message = $_GET['message'];
      echo "<h2>";
      echo htmlspecialchars($message);
      echo "</h2>";
  }
?>
<br>
  <h1 id="login_heading">Login</h1>
  <form action="login_checker.php" method="post">
    <label for="username">Username:</label>
    <input type="text" id="username" name="username"><br>
    <label for="pwd">Password:</label>
    <input type="password" id="pwd" name="pwd"><br>
    <input type="submit" value="Submit">
  </form> 
</div>
</div>