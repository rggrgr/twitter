
	<meta charset="utf-8">	
	<form action="change1.php" method="POST">
		<?php
			echo ' <input name = "text" value = " ' . $_POST['txt'] . ' " > ';
			echo ' <input type = "hidden" name = "id" value = " ' . $_POST['id1'] . ' " > ';
			echo ' <button> save </button> ';	
		?>
	</form>
