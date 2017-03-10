<?php

	include '../admin/restrito.php';
	include '../admin/conecta.php';

		$idprojeto = $_POST['idprojeto'];
		$usuario = $_POST['usuario'];


		$query = mysql_query("SELECT * FROM equipe WHERE idprojeto = $idprojeto");
			while ($linha = mysql_fetch_array($query)) {
				$linha['idequipe'];
				$idequipe = $linha['idequipe'];
			}


			$query_membros = mysql_query("SELECT nomeMembros FROM membros WHERE nomeMembros = '$usuario' AND idequipe = $idequipe");
			$num_row = mysql_num_rows($query_membros);

		if($num_row > 0) {
			echo "<script style='background-color: #ff0000'>alert('Ja tem um usuario cadastrado nesse projeto');</script>";
			echo "<meta HTTP-EQUIV='refresh' CONTENT='1;URL=projetos-aluno.php'>";
		}
		

		if ($num_row == 0) {
			$insert = mysql_query("INSERT INTO membros (nomeMembros,idaluno,idequipe) VALUES ('$usuario', $_SESSION[id], $idequipe)");
			echo "<script style='background-color: #ff0000'>alert('Cadastrado');</script>";
			echo "<meta HTTP-EQUIV='refresh' CONTENT='1;URL=projetos-aluno.php'>";
		}
		
			if(isset($insert)) {
				echo "Deu certo";
			}else {
				echo "Erro";
			}


		
	
?>