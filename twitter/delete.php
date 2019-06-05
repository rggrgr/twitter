<?php 
	header('Location: http://dyachkovskiy/twitter/index.php');
	$connect = mysqli_connect('127.0.0.1', 'root', '', 'dyach_consutaltion');
	$id = $_POST['id'];
	$query ="DELETE FROM tweet WHERE id = ' " . $id . " ' ";
	$result = mysqli_query($connect, $query);
?>

