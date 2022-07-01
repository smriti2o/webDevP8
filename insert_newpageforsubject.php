<?php
include "header.php";
?>
<?php
session_start();
if ($_SESSION["power"] != "admin") {
  return_back();
}
?>
<?php
$subject_id = $_GET['subject_id'];
if (empty($subject_id)) {
  header("Location: display_subjectpages.php?message=you have to restart after a failed attempt!");
  exit();
}
echo "$subject_id";
$menu_name  = $_POST['menu_name'];
$position = $_POST['position'];
$visibility = $_POST['input_user'];
$content = $_POST['content'];
$conn = mysqli_connect('localhost', 'tushar', 'tushar', 'project');
$sql = "SELECT * FROM pages WHERE subject_id = '$subject_id'AND position = '$position'";
$result = mysqli_query($conn, $sql);
$ans = mysqli_fetch_all($result, MYSQLI_ASSOC);
if (!empty($ans)) {
  header("Location: display_subjectpages.php?message=error_position_or_menuname_is_same!");
  exit();
}
$sql = "INSERT INTO pages(subject_id,menu_name,position,visible,content) VALUES ('$subject_id','$menu_name','$position','$visibility','$content')";
if (mysqli_query($conn, $sql)) {
  echo "success!!!";
  header("Location: display_subjectpages.php?message=successfully created a new page now you need to go back");
} else {
  echo "connection error!!" . mysqli_error($conn);
}
?>
