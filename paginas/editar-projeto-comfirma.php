<?php
	
	include "../admin/conecta.php";

	$id = $_POST['botaoProjeto'];
	$nome = $_POST['nomeProjeto'];
	$descricao = $_POST['descricao'];
	$conteudo = $_POST['conteudo'];
	$infoAdicional = $_POST['infoAdicional'];
	$area = $_POST['area'];
	$status = $_POST['status'];
			$update = mysql_query("UPDATE projeto
								   SET nomeProjeto = '$nome',
					   				   descricao = '$descricao',
					   				   infoAdicional ='$infoAdicional',
					   				   area ='$area',
					   				   status = $status
					   				    where idprojeto = $id;");

				

				echo "<meta HTTP-EQUIV='refresh' CONTENT='0;URL=meus-projetos.php'>";
		


?>