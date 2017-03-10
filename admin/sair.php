<?php
	ob_start();
	session_start();

	
	unset($_SESSION['usuario']);
	unset($_SESSION['senha']);
	unset($_SESSION['id']);
		 
	echo "<meta HTTP-EQUIV='refresh' CONTENT='1;URL=../index.php'>";


?>