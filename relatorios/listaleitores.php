<!DOCTYPE html>
<html>
<head>
	<title>Projeto Biblioteca</title>
	<link rel="stylesheet" type="text/css" href="../plugins/fontawesome-free/css/all.min.css">
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<center>
		<h2>Projeto Biblioteca</h2>
		<h3>Rua Cicrano Nº847, Centro</h3>
	</center>
	<table width="100%" border="1px">
		<thead>
			<tr>
				<th colspan="100%">Listagem de Leitores</th>
			</tr>
			<tr>
				<th>ID</th>
				<th>CPF</th>
				<th>Nome</th>
				<th>Endereço</th>
				<th>E-mail</th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<?php
				include('../db/PdoConexao.class.php');
                include('../db/InterfaceCRUD.class.php');
                include('../db/Leitor.class.php');
                include('../db/LeitorCRUD.class.php');

                $leitorCRUD = new LeitorCRUD();
                $sql = "select * from tbleitor order by nome";

                //array com dados da consulta
                $pesquisa = $leitorCRUD->consultar($sql);

                foreach ($pesquisa as $linha) {
                echo'	<tr><td>'.$linha['id_leitor'].'</td>
                		<td>'.$linha['cpf'].'</td>
                		<td>'.$linha['nome'].'</td>
                		<td>'.$linha['cidade'].', Bairro: '.$linha['bairro'].', Rua: '.$linha['rua'].', Nº'.$linha['numero'].'</td>
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
</body>
</html>