<?php
	include "../admin/conecta.php";
	include "../admin/restrito.php";



	$query_projetos = mysql_query("SELECT * FROM projeto WHERE status = 1 ORDER BY idprojeto DESC");

	$cont_linhas = mysql_num_rows($query_projetos);

	if($cont_linhas == 0) {
		echo "<center><h2>Nenhum Projeto Cadastrado</h2><center>";
	}
?>


<?php  include_once "../templates-parts/header-aluno.php"; ?>
	<div id="content">
		<div id="primary" class="primary-container">

	<?php if($cont_linhas > 0) { ?>
	<?php while($row = mysql_fetch_array($query_projetos)) { ?>
		<?php $row['idprojeto'] ?>
		<?php $_SESSION['idprojeto'] = $row['idprojeto']; ?>

		<div class="projeto" name="<?php echo $_SESSION['idprojeto']; ?>">
			<div class="well well-small">
				<div class="header-title">
					<h3><?php echo $row['nomeProjeto']; ?></h3>

				</div>
			</div>


			<div class="entry-content">
				<div class="area">
					<span class="label label-success"><?php echo $row['area'] ?></span>
				</div>

				<div class="content">
					<p><?php echo $row['descricao']; ?></p>
				</div>

				<div class="entrar">
					<form action='projeto-single.php' method="post" id="projeto_aluno">
						<input type="hidden" class="btn btn-primary" name="idprojeto" value="<?php echo $row['idprojeto'];?>">
						<input type="submit" class="btn btn-primary" value="Entrar">
					</form>

				</div>
			</div>
		</div>

<?php	} ?>
<?php }  ?>
<?php
	if ($_POST['entrar']) {

		header("Location: projeto-single.php");
		
	}
?>
	</div>
</div>

	
</body>
</html>