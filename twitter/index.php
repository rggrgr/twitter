<!DOCTYPE html>
<html>
<head>
	<title>twitter</title>
	<meta charset="utf-8">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
</head> 
<body class="bg-light">
	<!--Навигация-->
<div class="header d-flex container-fluid bg-white col-12 mb-2">
	<div class="col-4">
		<a href="#">Главная</a>
		<a href="#">Уведомления</a>
		<a href="#">Сообщения</a>
	</div>
	<div class="col-4" style="text-align: center;">
		<img src="Twitter-logo.png" class="" style="height:30px">
	</div>
	<form class="form-inline my-2 my-lg-0">
	    <input class="form-control mr-sm-2 rounded-pill" type="search" placeholder="Search" aria-label="Search">
	    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
	</form>

</div>
	<!--Контент-->
<div class="col-12">
	<div class="container d-flex">
		<!--Левая колонка-->
		<div class="col-3">
			<div class="card col-12 bg-white">
	  			<div>
	  				<img class="col-12" src="background.jpg">
	  			</div>
	  			<div class="d-flex col-12">
	  				<div class="col-4">
	  					<img class="rounded-circle" src="avatar.jpg">
	  				</div>
	  				<div class="col-8">
	  					<a href="#">@Test</a>
	  					<a href="#">Test</a>
	  				</div>
	  			</div>
			</div>
			<div class="col-12 bg-white d-flex">
				<div class="col-6"><a href="">Твиты: 228</a></div>
				<br>
				<div class="col-6"><a href="">Читаемые: 228</a></div>
			</div>
			<div class="col-12 bg-white">
				<hr>
				<?php 
					
					$connect1 = mysqli_connect('127.0.0.1', 'root', '', 'dyach_consutaltion');
				?>
				<h3>
					Актуальные темы для вас
				</h3>
					<?php 
						$tweet = mysqli_query($connect1, "SELECT * FROM actual");
						$actual_tweet = $tweet->num_rows;

						for ($i=0; $i < $actual_tweet; $i++) { 	
					 ?>
					 	<h5 style="font-size: 16px;">
					 		<?php 
					 			$link = $tweet->fetch_assoc();
					 			echo '<a href = " ' .  $link['links'] . ' " > ' . $link['heshteg'] . '</a>'
					 		?>
					 	</h5>
					 	<p style="font-size: 12px;">
					 		<?php 
					 			echo 'Твитов: ' . $link['count_tweet'];
					 		 ?>
					 	</p>
					<?php } ?>
				
			</div>
		</div>

		<!--Средняя колонка-->
		<div class="col-6" style="">
			<div class="col-12">
				<div class="mb-2">
					<form action="b.php" method="POST">
						<div class="row">
							<div class="mr-2">
								<input name="post_text" class="h-100" placeholder=""> </input>
							</div>
							<div>
								<button class="btn btn-primary">Твитнуть</button>
							</div>
						</div>
					</form>
				</div>
			</div>
			<!--Пост1-->
			<?php
				  $query = mysqli_query($connect1, "SELECT * FROM tweet ORDER BY id DESC");	
				  $num = $query->num_rows;
				  for ($i=0; $i < $num; $i++) { 
				  		
			?>
			<div style="" class="row bg-white">
				<div class="col-2" style="text-align: center;">
					<a href="#" style="" class="">
						<?php 
							$logo = $query->fetch_assoc();
							echo '<img class= "rounded-circle" src="' . $logo['logo'] . '">';
						 ?>	
					</a>
				</div>
				<div class="col-10">
					<h5>
						<?php 
							echo $logo['title'];
						?>
					</h5>
					<p><?php
					echo $logo['txt']; 
					 ?></p>
					<?php
						echo '<img class="w-100 border" src="' . $logo['img'] . '">'
					 ?>
					<div class="row mb-2" style="text-align: center;">
						<div class="col-3">
							<img src="comment.png">
						</div>
						<div class="col-3">
							<img src="envelope.png">
						</div>
						<div class="col-3">
							<img src="like.png">
						</div>
						<div class="col-3">
							<img src="retweet.png">
						</div>
					</div>
					<div class="mb-2">
						<form action="delete.php" method="POST">
							<button class="btn btn-primary"> delete </button>
							<?php 
								$id = $logo['id'];
								echo ' <input type="hidden" name="id" value=" ' . $id . ' "> ';
							?>
						</form>
					</div>
					<div>
						<form action="change.php" method="POST">
							<button class="btn btn-primary"> change </button>
							<?php 
								echo ' <input type="hidden" name="id1" value=" ' . $id . ' "> ';
								echo ' <input type="hidden" name="txt" value=" ' . $logo['txt'] . ' "> ';
							?>
						</form>
					</div>
				</div>
			</div>
				<!--Конец 1 поста-->
				<?php 
					}
				 ?>
		</div>
		
				<!--Правая колонка-->
	<div style="" class="col-3">
		<div class="bg-white">
			<div class="col-12 row">
				<h4 style="margin-right: 2%">Кого читать</h4>
				<li><a href="#" style="font-size: 13px; margin-left: -16%">Обновить</a></li>
				<li><a href="#" style="font-size: 13px; margin-left: -18%">Все</a></li>
			</div>
			<div class="row ">
				<?php 
					$reading = mysqli_query($connect1, "SELECT * FROM who_read");
					$num1 = $reading->num_rows;
					for ($i=0; $i <$num1 ; $i++) { 
						$post = $reading->fetch_assoc();	
				?>
				<div class="col-3">
						<?php echo ' <img class = "w-100 p-2 rounded-circle" src = " ' . $post['avatar'] . ' " > ' ?>
				</div>
				<div class="col-9 ">
					<h6 style="margin-bottom: 2%; margin-top: 2%">
							<?php echo $post['name'] . $post['@'] ?>	
					</h6>
					<button class="btn btn-outline-primary rounded p-1">Читать</button>
				</div>
				<?php } ?>
			</div>
		</div>
	</div>
		</div>
	</div>
</body>
</html>