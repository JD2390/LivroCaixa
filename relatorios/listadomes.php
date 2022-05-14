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
		<h2>Nome da Empresa</h2>
		<h3>Endereço da Empresa, Especificações</h3>
	</center>
	<table width="100%" border="1px">
		<thead>
			<tr>
				<th colspan="100%">Listagem de Cadastros do MÊs</th>
			</tr>
			<tr>
				<th> ID </th>
				<th> Cliente </th>
				<th> Fornecedor </th>					                                                
				<th> Tipo </th>					                                                
				<th> Item </th>
				<th> Valor </th>
				<th> Data & Hora</th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<?php
					include('../db/PdoConexao.class.php');
					include('../db/InterfaceCRUD.class.php');
					include('../db/Regcaixa.class.php');
					include('../db/RegcaixaCRUD.class.php');

          $regcaixaCRUD = new RegcaixaCRUD();
          date_default_timezone_set('America/Fortaleza');
          $hoje=date('Y-m');
          $entrada=0;
          $saida=0;
          $sql = "select *, date_format(data,'%d/%m/%Y') as databr from tbregistro where data like '%$hoje%' order by data";

          //array com dados da consulta
          $pesquisa = $regcaixaCRUD->consultar($sql);

          foreach ($pesquisa as $linha) {
          	if($linha['tipo'] != "vd"  ){ 
          		$linha['tipo'] = "compra";
          		$saida=$saida+$linha['valor'];
          	}else{
          		$linha['tipo'] = "venda";
          		$entrada=$entrada+$linha['valor'];
          	}
          	echo'	<tr>
                		<td>'.$linha['id_registro'].'</td>
                		<td>'.$linha['cliente'].'</td>
                		<td>'.$linha['fornecedor'].'</td>
									 	<td>'.$linha['tipo'].'</td>
										<td>'.$linha['item'].'</td>
										<td>'.$linha['valor'].'</td>
										<td>'.$linha['databr'].' '.$linha['hora'].'</td>
                	</tr>';
          }
				?>
				
			</tr>
		</tbody>
	</table>
		<footer>
			<br>
			<table  border="2px">
				<thead>					
					<tr>
						<th> Entrada </th>
						<th> Saida </th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td> R$: <?php echo $entrada;?> </td>
						<td> R$: <?php echo $saida;?> </td>
					</tr>
				</tbody>
				<tfoot>
					<tr>
						<td colspan="100%">Emitido em: "<?php echo date('d/m/Y')?>"</td>
					</tr>
				</tfoot>
			</table>
		</footer>
  </div>
</div>
</body>
</html>