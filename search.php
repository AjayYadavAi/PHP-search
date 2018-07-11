<!DOCTYPE html>
<html>
<head>
<title></title>
</head>
<boby>
<form action="search.php" method="get">
	<label for="search">
		<input type="text" name="keywords" autocomplete='off'>
	</label>
	<input type="submit" value="submit">
</form>
</boby>
</html>
<?php
include_once('search.php');
$con = new mysqli("avatar.com",'root','','second_db');
if(isset($_GET['keywords'])){
	$keywords = mysqli_real_escape_string($con,$_GET['keywords']);
	$query = mysqli_query($con,"SELECT details from list where details like '%$keywords%'");
	echo 'Total results : '.mysqli_num_rows($query);
	while($data = mysqli_fetch_array($query)){
		echo '<div><a href="#">'.$data['details'].'</a></div>';
	}
}
?>