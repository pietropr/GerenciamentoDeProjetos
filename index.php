<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="stylesheet" type="text/css" href="estilos/bootstrap/css/bootstrap.css">
<link rel="stylesheet" type="text/css" href="estilos/bootstrap/css/bootstrap-theme.css">
<link rel="stylesheet" type="text/css" href="estilos/styles.css">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Logar</title>
</head>

<body class="index">

<div class="container-fluid">
    <div class="row" style="margin-top:15%;">
        <div class="col-md-4"></div>
    	<div class="col-md-4">
            <div class="panel panel-default">

                <div class="panel-heading">
                    <h2 style="text-align: center;" class="panel-title">Sistema de Gerenciamento de Projetos</h3>  
                </div>

                <div class="panel-content" style="margin: 30px 0 !important;">

                    <form action="admin/logar.php" method="post">
                        <p><input type="text" class="form-control"  name="usuario" placeholder="Usuário"  style=" width: 80% !important; margin: auto !important;" / ></p>
                        <p><input type="password" class="form-control" name="senha" placeholder="Senha" style=" width: 80% !important; margin: auto !important;"" /></p>
                        <p><input type="submit" value="Entrar" class="btn btn-primary btn-block" name="entrar" style=" width: 80% !important; margin: auto !important;"/></p>            
                    </form>

                </div>
                

            </div>
        	
        </div>
        <div class="col-md-4"></div>
        <div class="col-md-12" style="text-align: center !important;">
            <p>Não tem login? <a href="admin/escolha.php">Cadastre-se aqui!</a></hp>
        </div>
    </div>
</div>

</body>
</html>