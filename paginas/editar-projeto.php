<?php
	include "../admin/restrito.php";
	include "../admin/conecta.php";
?>
	<?php

		$membros = $_POST['projeto'];
		


		
		include_once "../templates-parts/header-professor.php";
		$verifica_projetos = mysql_query("SELECT * FROM projeto WHERE idprojeto = $membros");
		//while de inputs
		while($row = mysql_fetch_array($verifica_projetos)) {
			echo "<div class='container-fluid'>";
			echo "<div class='row'>";
			echo "<div class='col-md-4'></div>";
			echo "<div class='col-md-4'>";
			echo"<center><h1>Editar Projetos</h1></center>";
			echo "<form action='editar-projeto-comfirma.php' class='cad-form' method='post'>";
			echo "<p>Nome Projeto:<input type='text' name='nomeProjeto' class='form-control' value='$row[nomeProjeto]'></p>";
			echo "<p>Descrição: <input type='text' name='descricao' class='form-control' value='$row[descricao]'></p>";
			echo "<hr>";
			echo "<p>Info Adicional: <input type='text' name='infoAdicional' class='form-control' value='$row[infoAdicional]'></p>";
			echo "<p>Área: <input type='text' name='area' class='form-control' value='$row[area]'></p>";
			echo "<p>Status: (1 para ativo, 0 para inativo) <input type='text' name='status' class='form-control' value='$row[status]'></p>";
			echo "<p><input type='hidden' name='botaoProjeto' value='$membros' class='btn btn-primary btn-block'></p>";
			echo "<p><input type='submit' name='enviar' value='Editar' class='btn btn-primary btn-block'></p>";
			echo "</form>";
			echo "</div>";
			echo "<div class='col-md-4'></div>";
			echo "</div>";
			echo "</div>";

		}

		
	

	?>

</body>
</html>