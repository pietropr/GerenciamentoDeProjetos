<?php

	include "../admin/conecta.php";


	$nome = $_POST['nome'];
	$telefone = $_POST['telefone'];
	$usuario = $_POST['usuario'];
	$senha = $_POST['senha'];
	$email = $_POST['email'];

 	if($_POST['botao']) {

		$verifica = mysql_query("SELECT usuario
								 FROM contratante
								 WHERE usuario = '$usuario'");

		$verifica_2 = mysql_query("SELECT usuario
								   FROM aluno
								   WHERE usuario = '$usuario'");


		if(empty($nome) || empty($telefone) || empty($usuario) || empty($senha) || empty($email)) {

				echo "Verifique todos os campos";
				
		} else {

			if(mysql_num_rows($verifica) || mysql_num_rows($verifica_2)  > 0 ) {

				echo "<script type='text/javascript'>window.alert('Já existe um cadastro com esse usuário!');</script>";
				echo "<meta HTTP-EQUIV='refresh' CONTENT='2;URL=../paginas/cadastro-professor.php'>";
				
			}else {

				$sql = mysql_query("INSERT INTO contratante (nomeContratante, emailContratante, usuario, senha, telefone)
								    VALUES ('$nome','$email','$usuario', '$senha', '$telefone');");


				echo "<script type='text/javascript'>window.alert('Parabéns, você foi cadastrado!');</script>";
				echo "<meta HTTP-EQUIV='refresh' CONTENT='2;URL=../index.php'>";
				
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
</head>
<body>
	
	<div class="col-md-4"></div>
	<div class="col-md-4" style="margin-top: 80px">

			<fieldset>
				<legend>Cadastro Professor</legend>
			</fieldset>
			<div class="alert alert-warning" role="alert">
				<strong>ATENÇÃO!</strong> Todos os campos são obrigatórios.
			</div>
		<form action="cadastro-professor.php" method="POST">
			<p>Nome:<input type="text" name="nome" class="form-control"></p>
			<p>E-mail: <input type="text" name="email" class="form-control"></p>
			<p>Telefone: <input type="text" name="telefone" class="form-control"></p>
			<hr>
			<p>Usuario: <input type="text" name="usuario" class="form-control"></p>
			<p>Senha: <input type="password" name="senha" class="form-control"></p>
			<p><input type="submit" class="btn btn-success btn-block" name="botao"></p>
		</form>
	</div>
	<div clas="col-md-4"></div>


</body>
</html>