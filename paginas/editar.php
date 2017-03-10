<?php
	include "../admin/restrito.php";
	include "../admin/conecta.php";
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Editar Usuário</title>
	<link rel="stylesheet" href="">
	<script type="text/javascript">
	</script>
</head>
<body>
	<form action="editar.php" method="post">
	<?php
		$verifica_aluno = mysql_query("SELECT * FROM aluno WHERE usuario = '$_SESSION[usuario]' ");
		$verifica_professor = mysql_query("SELECT * FROM contratante WHERE usuario = '$_SESSION[usuario]' ");

		if(mysql_num_rows($verifica_aluno) > 0 ){

			//while de inputs
			while($row = mysql_fetch_array($verifica_aluno)) {
				include_once "../templates-parts/header-aluno.php";
				echo"<div class='container-fluid'>";
				echo"<div class='row'>";
				echo "<div class='col-md-4'></div>";
				echo "<div class='col-md-4'>";
				echo"<center><h1>Editar Aluno</h1></center>";
				echo "<form action='editar.php' class='cad-form'>";
				echo "<p>Nome:<input type='text' name='nomeAluno' class='form-control' value='$row[nomeAluno]'></p>";
				echo "<p>CPF: <input type='text' name='cpfAluno' class='form-control' value='$row[cpfAluno]'</p>";
				echo "<p>Telefone: <input type='text' name='telefoneAluno' class='form-control' value='$row[telefone]'</p>";
				echo "<p>Cidade: <input type='text' name='cidadeAluno' class='form-control' value='$row[cidade]'</p>";
				echo "<p>Estado: <input type='text' name='estadoAluno' class='form-control' value='$row[estado]'</p>";
				echo "<p>Email: <input type='text' name='emailAluno' class='form-control' value='$row[emailAluno]'</p>";
				echo "<hr>";
				echo "<p>Usuario: <input type='text' name='usuarioAluno' value='$row[usuario]'</p>";
				echo "<p><input type='submit' name='botaoAluno' class='btn btn-primary btn-block'></p>";
				echo "</form>";
				echo "</div>";
				echo "<div class='col-md-4'></div>";
				echo "</div>";
				echo "</div>";

			}

			//UPDATE ALUNO
			if($_POST['botaoAluno']) {

				$update = mysql_query("UPDATE aluno
									   SET nomeAluno = '$_POST[nomeAluno]',
									       cpfAluno = '$_POST[cpfAluno]',
						   				   telefone ='$_POST[telefoneAluno]',
						   				   cidade = '$_POST[cidadeAluno]',
						   				   estado = '$_POST[estadoAluno]',
						   				   emailAluno = '$_POST[emailAluno]',
						   				   usuario = '$_POST[usuarioAluno]' WHERE idaluno = $_SESSION[id];");

				
					$_SESSION['usuario'] = $_POST['nomeAluno'];		

					echo "<script type='text/javascript'> window.alert('Vamos te deslogar para que você logue novamente');</script>";
					echo "$_SESSION[usuario]";
					echo "<meta HTTP-EQUIV='refresh' CONTENT='1;URL=../admin/sair.php'>";
			}
		}

		if(mysql_num_rows($verifica_professor) > 0 ){
			include_once "../templates-parts/header-professor.php";

			//while de inputs
			while($row = mysql_fetch_array($verifica_professor)) {
				echo "<div class='container-fluid'>";
				echo "<div class='row'>";
				echo "<div class='col-md-4'></div>";
				echo "<div class='col-md-4'>";
				echo"<center><h1>Editar Professor</h1></center>";
				echo "<form action='editar.php' class='cad-form'>";
				echo "<p>Nome:<input type='text' name='nomeContratante' class='form-control' value='$row[nomeContratante]'</p>";
				echo "<p>Telefone: <input type='text' name='telefoneContratante' class='form-control' value='$row[telefone]'</p>";
				echo "<p>Email: <input type='text' name='emailContratante' class='form-control' value='$row[emailContratante]'</p>";
				echo "<hr>";
				echo "<p>Usuario: <input type='text' name='usuarioContratante' class='form-control' value='$row[usuario]'</p>";
				echo "<p><input type='submit' name='botaoProfessor' class='btn btn-primary btn-block'></p>";
				echo "</form>";
				echo "</div>";
				echo "<div class='col-md-4'></div>";
				echo "</div>";
				echo "</div>";

			}

			//UPDATE PROFESSOR
			if($_POST['botaoProfessor']) {

				$update = mysql_query("UPDATE contratante
									   SET nomeContratante = '$_POST[nomeContratante]',
						   				   emailContratante = '$_POST[emailContratante]',
						   				   usuario = '$_POST[usuarioContratante]',
						   				   telefone ='$_POST[telefoneContratante]' where idcontratante = $_SESSION[id];");

				
					$_SESSION['usuario'] = $_POST['nomeContratante'];		

					echo "<script type='text/javascript'> window.alert('Vamos te deslogar para que você logue novamente');</script>";
					echo "$_SESSION[usuario]";
					echo "<meta HTTP-EQUIV='refresh' CONTENT='1;URL=../admin/sair.php'>";
			}
		}

	?>

</body>
</html>