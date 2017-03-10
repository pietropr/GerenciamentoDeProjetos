<?php

	include "../admin/conecta.php";
	include "../admin/restrito.php";

?>
<?php include_once "../templates-parts/header-professor.php" ?>
<body class="home-professor">
	
	<div id="content">
		<div id="primary" class="primary-container">

		<?php
			$query = mysql_query("SELECT * FROM projeto WHERE idcontratante = $_SESSION[id] AND status = 1 ORDER BY idprojeto DESC");?>

		<?php if(mysql_num_rows($query) > 0 ) { ?>

			<div class="alert alert-danger" role="alert">
				<span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span><span class="sr-only">Error:</span> <p>A visualização abaixo mostra apenas os projetos que estão ativos.<br> Para ver os inativos, clique no link a baixo.</p>
			</div>

			<form action="projetos-inativos.php" style="margin-bottom: 100px">
				<h3 style="margin: 0">Veja Tambem os Inativos</h3><hr style="margin: 10px 0"><input type="submit" value="Clique aqui e veja os inativos" class="btn btn-success">
			</form>

			

			<table class="table table-bordered table-stripped" style="text-align: left;">
				<tr>
					<td>Código</td>
						<td>Nome Projeto</td>
						<td>Descricao</td>
						<td>Área</td>
						<td>Membros</td>
						<td>Editar</td>
				</tr>
				<?php while ($row = mysql_fetch_array($query)) { ?>
					<tr>
						<td><?php echo $row['idprojeto'];?></td>
						<td><?php echo $row['nomeProjeto'];?></td>
						<td><?php echo $row['descricao'];?></td>
						<td><?php echo $row['area'];?></td>
						<td>
							<form method="post" action="equipes.php">

								<input type="hidden" value="<?php echo $row['idprojeto']; ?>" name="membros" >
								<input class="btn btn-primary" type="submit" name="ver" value="Membros">
							</form>

						</td>
						<td>
							<form method="post" action="editar-projeto.php">

								<input type="hidden" value="<?php echo $row['idprojeto']; ?>" name="projeto" >
								<input class="btn btn-success" type="submit" name="editar" value="Editar">
							</form>

						</td>
					</tr>

					
						
						
					
				<?php } ?>
			</table>
		<?php } else { ?>
				<form action="projetos-inativos.php" style="margin-bottom: 100px">
					<h3 style="margin: 0">Caso você tenha um projeto inativo</h3><hr style="margin: 10px 0"><input type="submit" value="Clique aqui e veja-os" class="btn btn-success">
				</form>

				<?php echo "<h1>Nenhum projeto para esse professor</h1>";
				echo "<a href='cadastro-projeto.php'><button class=' btn btn-primary'>Voltar para cadastro de projetos</button></a>";}?>
		</div>

	</div>



</body>
</html>