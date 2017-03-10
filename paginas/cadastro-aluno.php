<?php

	include "../admin/conecta.php";


	if($_POST['botao']) {

		$nome = $_POST['nome'];
		$cpf = $_POST['cpf'];
		$telefone = $_POST['telefone'];
		$cidade = $_POST['cidade'];
		$estado = $_POST['estado'];
		$usuario = $_POST['usuario'];
		$senha = $_POST['senha'];
		$email = $_POST['email'];

	 	if($_POST['botao']) {

			$verifica = mysql_query("SELECT usuario
									 FROM aluno
									 WHERE usuario = '$usuario'");

			$verifica_2 = mysql_query("SELECT usuario
									 FROM contratante
									 WHERE usuario = '$usuario'");


			if(empty($nome) || empty($cpf) || empty($telefone) || empty($cidade) || empty($estado) || empty($usuario) || empty($senha) || empty($email)) {

					echo "<script type='text/javascript'>alert('Verifique todos os campos')</script>";
					
			} else {

				if(mysql_num_rows($verifica) || mysql_num_rows($verifica_2)  > 0 ) {

					echo "<script type='text/javascript'>alert('Já existe um cadastro com esse usuário!');</script>";
					echo "<meta HTTP-EQUIV='refresh' CONTENT='2;URL=../paginas/cadastro-aluno.php'>";
					
				}else {

					$sql = mysql_query("INSERT INTO aluno (nomeAluno, cpfAluno, telefone, cidade, estado, usuario, senha, emailAluno)
									    VALUES ('$nome','$cpf','$telefone', '$cidade', '$estado', '$usuario', '$senha' , '$email');");


					echo "<script type='text/javascript'>window.alert('Parabéns, você foi cadastrado!');</script>";
					echo "<meta HTTP-EQUIV='refresh' CONTENT='2;URL=../index.php'>";
					
				}
			}
	 	}
	}


?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Cadasto de Alunos</title>
	<link rel="stylesheet" type="text/css" href="../estilos/bootstrap/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="../estilos/bootstrap/css/bootstrap-theme.css">
	<link rel="stylesheet" type="text/css" href="../estilos/styles.css">
	<script src="../js/jquery-1.12.3.min.js" type="text/javascript" charset="utf-8"></script>
	<script type="text/javascript" charset="utf-8">
		jQuery(function($) {
			$(document).ready(function() {
	   			$('input.repete').blur(function(){
					if($('input.senha').val() != $('input.repete').val()) {
						$('b').html("Senha não confere");

					} else {
						$('b').html(' ');
					}

				
				});

			});



		});

	</script>
</head>
<body>

<div class="container-fluid">
	<div class="row">
		<div class="col-md-4"></div>
		<div class="col-md-4" style="margin-top: 80px">

			<fieldset>
				<legend>Cadastro Aluno</legend>
			</fieldset>
			<div class="alert alert-warning" role="alert">
				<strong>ATENÇÃO!</strong> Todos os campos são obrigatórios.
			</div>
			
			<form action="cadastro-aluno.php" method="POST">
				<p><input type="text" name="nome" placeholder="Nome" class="form-control nome"></p>
				<p><input type="text" name="cpf" placeholder="CPF" class="form-control cpf"></p>
				<p><input type="text" name="telefone" placeholder="Telefone" class="form-control telefone"></p>
				<p><input type="text" name="cidade" placeholder="Cidade" class="form-control cidade"></p>
				<p><input type="text" name="email" placeholder="Email" class="form-control email"></p>
				<p><input type="text" name="estado" placeholder="Estado" class="form-control estado"></p>
				<hr>
				<p><input type="text" name="usuario" placeholder="Usuario" class="form-control usuario"></p>
				<p><input type="password" name="senha" class="form-control senha" placeholder="Senha"></p>
				<p><input type="password" name="repete" class="form-control repete" placeholder="Repetir a senha"> <b style="color: red;"></b></p>
				<p><input type="submit" name="botao" class="btn btn-success btn-block"></p>
			</form>
			
		</div>
		<div class="col-md-4"></div>
	</div>
</div>
	


</body>
</html>