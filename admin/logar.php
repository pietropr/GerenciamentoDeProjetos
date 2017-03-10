<?php
	ob_start();
	session_start();

	header ('Content-type: text/html; charset=UTF-8');
	if($_POST['entrar']) {

		//Recolhe usuario digitada no input
		$nome = $_POST['usuario'];

		//Recolhe senha digitada no input
		$senha = $_POST['senha'];

		include "conecta.php";

		//Query da verificação Aluno
		$query_aluno = mysql_query("SELECT idaluno, usuario, senha
									FROM aluno
									WHERE usuario = '$nome' and senha = '$senha'");

		//Query verificação professor
		$query_professor = mysql_query("SELECT idcontratante, usuario, senha
										FROM contratante
										WHERE usuario = '$nome' and senha = '$senha'");



		//Checa linhas da query aluno
		$checa_aluno = mysql_num_rows($query_aluno);

		//Checa linhas da query professor
		$checa_professor = mysql_num_rows($query_professor);



		//Se a verificação for verdadeira, executa o login do ALUNO
		if(!empty($checa_aluno)) {

			while($row= mysql_fetch_array($query_aluno)) {
				$row['idaluno'];
				$recebe_id = $row['idaluno'];

				
				
			}
			$_SESSION['id'] = $recebe_id;
			$_SESSION['usuario'] = $nome;
			$_SESSION['senha'] = $senha;


			echo "$_SESSION[usuario] <br>";
			echo "$_SESSION[senha] <br>";

			
			echo "É aluno com o id: $_SESSION[id]";
			header("Location: ../paginas/home-aluno.php");

				
		} else {
			echo"<script>window.alert('Dados inválidos');</script>";
			echo "<meta HTTP-EQUIV='refresh' CONTENT='2;URL=../index.php'>";
		}


		//Se a verificação for verdadeira, executa o login do PROFESSOR
		if(!empty($checa_professor)) {

			while($row= mysql_fetch_array($query_professor)) {
				$row['idcontratante'];
				$recebe_id = $row['idcontratante'];

				$_SESSION['usuario'] = $nome;
				$_SESSION['senha'] = $senha;
				$_SESSION['id'] = $recebe_id;
			}

			echo "É professor com o id: $recebe_id";
			header("Location: ../paginas/home-professor.php");

		}  else {
			echo"<script>window.alert('Dados inválidos');</script>";
			echo "<meta HTTP-EQUIV='refresh' CONTENT='2;URL=../index.php'>";
		}


	} else {
		echo "<center><h3>Aperte o botão</h3></center>";
	}



?>