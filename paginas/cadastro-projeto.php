<?php
	include "../admin/restrito.php";
	include "../admin/conecta.php";


	if($_POST['botao']) {

		$nomeProjeto = $_POST['nomeProjeto'];
		$conteudo = $_POST['conteudo'];
		$descricao = $_POST['descricao'];
		$infoAdicional = $_POST['infoAdicional'];
		$area = $_POST['area'];
		$equipe = $_POST['equipe'];

		$verifica = mysql_query("SELECT idcontratante, usuario FROM contratante
								 WHERE idcontratante = $_SESSION[id];");

		$verifica_linhas = mysql_num_rows($verifica);
		while($row = mysql_fetch_array($verifica)) {
			$row['usuario'];
			$row['idcontratante'];
			$recebe_usuario = $row['usuario'];
			$recebe_id = $row['idcontratante'];
		}


		$sql = mysql_query("INSERT INTO projeto (nomeProjeto,conteudo,idcontratante,descricao,infoAdicional,area, dataCriacao, status) VALUES ('$nomeProjeto','$conteudo',$recebe_id,'$descricao','$infoAdicional','$area', now(), 1);");

		$select = mysql_query("SELECT * FROM projeto WHERE nomeProjeto = '$nomeProjeto'");
		while ($row = mysql_fetch_array($select)) {
			$row['idprojeto'];
			$id_projeto = $row['idprojeto'];
		}

		

		$sql2 = mysql_query("INSERT INTO equipe (nomeEquipe,idprojeto) VALUES ('$equipe',$id_projeto)");

		echo "<meta HTTP-EQUIV='refresh' CONTENT='1;URL=../paginas/home-professor.php'>";	
		
	}
?>


<?php  include_once "../templates-parts/header-professor.php";?>
<div class="container-fluid" style="margin-top: 50px;">
	<div class="row">
		<div class="col-md-2"></div>
		<div class="col-md-8">
			<form class="cad-form" action="cadastro-projeto.php" method="post">	
				<p><input type="text" class="form-control" name="nomeProjeto" placeholder="Nome do Projeto"></p>
				<p><input type="text" class="form-control" name="descricao" placeholder="Descrição"></p>
				<p><input type="text" class="form-control" name="equipe" placeholder="Nome da Equipe"></p>
				<p><input type="text" class="form-control" name="infoAdicional" placeholder="info"></p>
				<p><input text="text" class="form-control" name="area" placeholder="Area"></p>
				<p><textarea name="conteudo" class="form-control" style="height: 300px !important;" placeholder="Conteudo"></textarea></p>
				<input type="submit" class="cadastrar btn btn-primary btn-block" value="cadastrar" name="botao"/> 
			</form>
		</div>
		<div class="col-md-2"></div>
	</div>
</div>
</body>
</html>

	









