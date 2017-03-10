<?php
	ob_start();
	session_start();
	
	header ('Content-type: text/html; charset=UTF-8');
	if(!isset($_SESSION['usuario']) and !isset($_SESSION['senha'])) {


		echo'<div align="center">
			 	<div class="" align="center">
					<label>Você não tem permissão para acessar a página.<label> 
					<br />
					<a href="../index.php">Clique aqui para realizar a autenticação</a>.
			    </ div>
			 </ div>';
		die;
	}
?>