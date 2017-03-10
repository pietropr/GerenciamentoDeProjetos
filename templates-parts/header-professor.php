<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Home Professor</title>
	<link rel="stylesheet" type="text/css" href="../estilos/styles.css">
	<link rel="stylesheet" type="text/css" href="../estilos/bootstrap/css/bootstrap-theme.css">
	<link rel="stylesheet" type="text/css" href="../estilos/bootstrap/css/bootstrap.css">
	<script type="text/javascript" src="../js/jquery-1.12.3.min.js"></script>
	<script type="text/javascript" src="../estilos/bootstrap/js/bootstrap.js"></script>
	<script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
 	<script>tinymce.init({ selector:'textarea' });</script>
	
</head>
<body class="home-professor">

<div id="masthead">
	<div class="site-branding">
		<div class="site-logo">

		</div>
	</div>
	<ul class="nav nav-tabs">

			<?php include "../admin/conecta.php" ?>
			<?php $contagem = mysql_query("SELECT count(idprojeto) FROM PROJETO WHERE status = 1;") ?>
			<?php while($rolagem = mysql_fetch_array($contagem)) { ?>
			<?php 
				$rolagem['cont(idprojeto)'];
				$quantia = $rolagem['count(idprojeto)'];
			}
			?>


		<li role="presentation class="active" ><a href="../paginas/home-professor.php"><span class="glyphicon glyphicon-home"></span></a></li>
		<li role="presentation"><a style="float: left;" href="projetos-professor.php">Projetos</a><span class="badge" style="margin-top: 12px !important;"><?php echo $quantia; ?></span></li>
		<li role="presentation"><a href="cadastro-projeto.php">Cadastrar Projetos</a></li>
		<li role="presentation"><a href="meus-projetos.php">Meus projetos</a></li>
		<li role="presentation"><a href="#">Sobre</a></li>
		<p  class="navbar-text navbar-right bem-vindo">Bem vindo&nbsp<?php echo "$_SESSION[usuario]" ?></p>
		<li role="presentation" class="dropdown navbar-right">
			 <a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
			  	Opções <span class="caret"></span>
			 </a>

			<ul class="dropdown-menu">
				<li><a href="../admin/sair.php">Sair</a></li>
				<li><a href="editar.php">Editar</a></li>
			</ul>

		</li>
	</ul>

	
</div>