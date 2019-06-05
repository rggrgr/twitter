<?php 
	header('Location: http://dyachkovskiy/twitter/index.php');
	$connect = mysqli_connect('127.0.0.1', 'root', '', 'dyach_consutaltion');
	mysqli_query($connect, "INSERT INTO tweet(logo, title, acc_link, img, acc_name, txt) VALUES ('avatar.jpg',  'title', '@lorem', 'habr.jpg', 'Mary Jane',  '  " .  $_POST['post_text'] . " ' ) ");

?>