<?php 
	header('Location: http://http://dyachkovskiy/r46/index.php');
	$connect = mysqli_connect('127.0.0.1', 'root', '', 'dyach_consutaltion');
	$query ="UPDATE tweet SET txt = ' " . $_POST['text'] .  " ',  WHERE id= ' " . $_POST['id'] . " ' ";
	$result = mysqli_query($connect, $query);
?>