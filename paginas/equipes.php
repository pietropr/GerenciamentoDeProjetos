<?php 

	include "../admin/conecta.php";
	include "../admin/restrito.php";

?>

<?php include_once "../templates-parts/header-professor.php"; ?>




<div class="container" style="margin-top: 100px">
	<h1 style="text-align: center;">Equipe</h1>
	<div class="row">
		<div class="col-sm-3"></div>
		<div class="col-sm-6">
			<?php 
				$membros =$_POST['membros'];
				$select_alunos = mysql_query("SELECT DISTINCT nomeAluno, emailAluno, telefone, cidade
												FROM membros, equipe, projeto, aluno 
												WHERE membros.idequipe = equipe.idequipe
												AND projeto.idprojeto = equipe.idprojeto
												AND membros.idaluno = aluno.idaluno
												AND equipe.idprojeto = $membros ;");
				

			?>
			<table class="table table-bordered table-stripped">
				<tr>
					<td>Nome Membro</td>
					<td>Email</td>
					<td>Telefone</td>
					<td>Cidade</td>
				</tr>
			<?php while($row = mysql_fetch_array($select_alunos)) { ?>

				<tr>
					<td><?php echo $row['nomeAluno'] ?></td>
					<td><?php echo $row['emailAluno'] ?></td>
					<td><?php echo $row['telefone'] ?></td>
					<td><?php echo $row['cidade'] ?></td>
				</tr>

			<?php } ?>

			</table>

		</div>

		<div class="col-sm-3"></div>
	</div>
</div>

</body>
</html>