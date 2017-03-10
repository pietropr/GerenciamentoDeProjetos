<?php

	include "../admin/conecta.php";
	include "../admin/restrito.php";

?>
<?php include_once "../templates-parts/header-aluno.php"; ?>
<body>
	<div class="container" style="margin-top: 80px;">
		<div class="row">
		<div class="col-md-3"> </div>
			<div class="col-md-6">
				<table class="table table-bordered table-stripped">
					<tr>
						<td><b>Nome do Projeto</b></td>
						<td><b>Nome do Contratante</b></td>
					</tr>

					<?php $select = mysql_query("SELECT projeto.nomeProjeto projeto,
												contratante.nomeContratante contrato
												FROM projeto,
													 membros,
													 equipe,
													 contratante,
													 aluno
												WHERE contratante.idcontratante=projeto.idcontratante
												AND projeto.idprojeto=equipe.idprojeto
												AND equipe.idequipe=membros.idequipe
												AND membros.idaluno=aluno.idaluno
												AND membros.idaluno= $_SESSION[id]
												GROUP BY membros.idaluno,projeto.nomeProjeto;")
					?>
					<?php while($row = mysql_fetch_array($select)) { ?>
					<tr>
						<td><?php echo $row['projeto'];?></td>
						<td><?php echo $row['contrato'];?></td>
					</tr>
					<?php } ?>
				</table>
			</div>
		</div>
		<div class="col-md-3"> </div>
	</div>
</body>
</html>