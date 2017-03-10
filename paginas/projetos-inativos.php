<?php

	include "../admin/conecta.php";
	include "../admin/restrito.php";

?>
<?php include_once "../templates-parts/header-professor.php" ?>
	<body class="home-professor">
	<div id="content">
		<div id="primary" class="primary-container">

		<?php
			$query = mysql_query("SELECT * FROM projeto WHERE idcontratante = $_SESSION[id] AND status = 0 ORDER BY idprojeto DESC");?>

		<?php if(mysql_num_rows($query) > 0 ) { ?>


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
				<center><button class="" align=><a href="home-professor.php">Home</a></button></center>
		<?php } else {
				echo "<h1>Nenhum projeto para esse professor</h1>";
				echo "<a href='cadastro-projeto.php'><button class=' btn btn-primary'>Voltar para cadastro de projetos</button></a>";}
		?>
		</div>

	</div>



</body>
</html>