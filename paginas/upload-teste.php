<?php  

	include "admin/conexao.php";

	$msg = false;


	if(isset($_FILES['arquivo'])) {

		$extensao = strtolower(substr($_FILES['arquivo']['name'], -4)); //pega a extensão do arquivo
		$novo_nome = md5(time()) . $extensao; //nome do arquivo
		$diretorio = "admin/upload"; //define o diretorio para onde vai o arquivo

        //move_uploaded_file($_FILES['arquivo']['tmp_name'],$_FILES['arquivo']['name']); 
		if(!move_uploaded_file($_FILES['arquivo']['tmp_name'],$diretorio."/".$novo_nome)){
				echo "Erro no envio do arquivo!!";
		} 

		$sql = mysql_query("INSERT INTO arquivo (codigo, arquivo, data) VALUES (null, '$novo_nome', now())") ;
		
		if ($sql  != false) {
			$msg = "Arquivo enviado com sucesso!";
		}
		else {
			$msg = "Falha ao enviar o arquivo.";
		}
	}
		
	


?>


<?php if($msg != false) echo "<p> $msg </p>"; ?>
<form action="upload-teste.php" method="post" enctype="multipart/form-data">
	
	<input type="file"  name="arquivo"></input>	
	<input type="submit" value="Salvar"></input>
</form>
