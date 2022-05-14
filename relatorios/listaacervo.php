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
				<th colspan="100%">Listagem de Livros</th>
			</tr>
			<tr>
				<th>ID</th>
				<th>ISBN</th>
				<th>Autor</th>
				<th>Titulo</th>
				<th>Ano de Publicação</th>
				<th>Editora</th>
				<th>Nº de Paginas</th>
				<th>Exemplar</th>
				<th>Status</th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<?php
				include('../db/PdoConexao.class.php');
                include('../db/InterfaceCRUD.class.php');
                include('../db/Acervo.class.php');
                include('../db/AcervoCRUD.class.php');

                $acervoCRUD = new AcervoCRUD();
                $sql = "select * from tbacervo order by titulo";

                //array com dados da consulta
                $pesquisa = $acervoCRUD->consultar($sql);

                foreach ($pesquisa as $linha) {
                    echo'<tr>
                    	<td>'.$linha['id_acervo'].'</td>
                		<td>'.$linha['isbn'].'</td>
                		<td>'.$linha['autor'].'</td>
                		<td>'.$linha['titulo'].'</td>
                		<td>'.$linha['ano_publicacao'].'</td>
                		<td>'.$linha['editora'].'</td>
                		<td>'.$linha['npaginas'].'</td>
                		<td>'.$linha['exemplar'].'</td>';
	                if ($linha['status'] == 'd'){
	                    echo'	<td>Disponivel</td></tr>';
	                }else{
	                    echo'   <td>Emprestado</td></tr>';
	                }
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