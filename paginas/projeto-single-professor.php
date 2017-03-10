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

<?php include_once "../templates-parts/header-professor.php" ?>

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

			
		</div>



		<div class="col-md-3"></div>
	</div>

</div>

</body>
</html>