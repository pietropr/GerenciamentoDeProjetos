<?php

	include "../admin/conecta.php";
	include "../admin/restrito.php";

	$idprojeto = $_POST['idprojeto'];
	$_SESSION['idprojeto'] = $idprojeto;
	$query_chama = mysql_query("SELECT * FROM projeto WHERE idprojeto = $idprojeto");
	$query_chama2 = mysql_query("SELECT * FROM projeto WHERE idprojeto = $idprojeto");
	$query_equipe = mysql_query("SELECT * FROM equipe WHERE idprojeto = $idprojeto");
	while ($teste = mysql_fetch_array($query_chama2)) {
		$teste['idprojeto'];
	}

?>

<?php include_once "../templates-parts/header-aluno.php" ?>

<div class="container-fluid">

	<div class="row">
		<div class="col-md-3"></div>
		<div class="col-md-6">
		<?php while($row = mysql_fetch_array($query_chama)) { ?>


			
			<archive class="projeto" name="<?php echo $row['idprojeto'] ?>">
				<div class="entry-header">
					<h1 class="entry-header"><?php echo $row['nomeProjeto'] ?></h1>
					<span class="label label-success"><?php echo $row['area'] ?></span>
					<p><?php echo $row['descricao'] ?></p>
				</div>
				<div class="content">
					<p><?php echo $row['conteudo'] ?></p>
				</div>

			</archive>
		<?php } ?>
			<hr style="border: 1px solid #999">

			<div class="panel panel-default">
				<div class="panel-heading">
					<h3 style="padding-left: 20px" class="panel-title">Gostou do Projeto? Inscreva-se</h3>	
				</div>
				<!-- -->
				<div class="panel-content">
					<form class="cad-form interesse" action = "interesse.php" method="post">
						<div class="input-group" style="width: 100% !important;">
  							<p>

								<?php $usuario = mysql_query("SELECT * FROM aluno WHERE idaluno = $_SESSION[id];"); ?>
								<?php while($user = mysql_fetch_array($usuario)) { ?>
								<?php $user['nomeAluno']; ?>
								<?php $nomeUsuario = $user['nomeAluno']; ?>
								<?php } ?>
  								<input type="hidden" class="form-control" style="width: 25% !important;" placeholder="Usuario" name="usuario" value="<?php echo $nomeUsuario ?>">
								<input type="hidden" name="idprojeto" value="<?php echo $idprojeto; ?>">
  							   	<input type="submit" class="btn btn-success" name="botao" value="Cadastrar">
  							</p>
						</div>
					</form>
				</div>
			</div>
		</div>



		<div class="col-md-3"></div>
	</div>

</div>

</body>
</html>