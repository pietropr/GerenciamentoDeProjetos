<?php

	$conexao = mysql_connect('localhost', 'root', 'root') or die(mysql_error("Não foi possível conectar-se."));
	$seleciona = mysql_select_db('uebi', $conexao) or die ("Não foi possível selecionar o banco de dados.");

	if (!$seleciona) {
		?>
		<script type="text/javascript">
			window.alert('Não foi possível conectar no servidor');
		</script>


	<?php
	}

?>