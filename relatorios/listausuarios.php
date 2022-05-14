<!DOCTYPE html>
<html>
<head>
	<title>Relaório Diario</title>
	<link rel="stylesheet" type="text/css" href="../plugins/fontawesome-free/css/all.min.css">
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<div class="content-wrapper">
  <div class="container-fluid">
	<center>
		<h2>Projeto Biblioteca</h2>
		<h3>Rua Cicrano Nº847, Centro</h3>
	</center>
	<table width="100%" border="1px">
		<thead>
			<tr>
				<th colspan="100%">Listagem de Usuários</th>
			</tr>
			<tr>
				<th>ID</th>
				<th>Nome</th>
				<th>E-mail</th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<?php
				include('../db/PdoConexao.class.php');
                include('../db/InterfaceCRUD.class.php');
                include('../db/Usuario.class.php');
                include('../db/UsuarioCRUD.class.php');

                $usuarioCRUD = new UsuarioCRUD();
                $sql = "select * from tbusuario order by nome";

                //array com dados da consulta
                $pesquisa = $usuarioCRUD->consultar($sql);

                foreach ($pesquisa as $linha) {
                echo'	<tr><td>'.$linha['id_usuario'].'</td>
                		<td>'.$linha['nome'].'</td>
                		<td>'.$linha['email'].'</td></tr>';
                }
				?>
				
			</tr>
		</tbody>
		<tfoot>
			<tr>
				<td colspan="100%">Emitido em: "<?php date_default_timezone_set('America/Fortaleza'); echo date('d-m-Y');?>"</td>
			</tr>			
		</tfoot>
	</table>
  </div>
</div>
</body>
</html>