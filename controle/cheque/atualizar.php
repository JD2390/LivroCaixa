<?php
  if(isset($_POST['id'])){
	  include('../../db/PdoConexao.class.php');   
	  include('../../db/Regcaixa.class.php');   
	  include('../../db/InterfaceCRUD.class.php');   
	  include('../../db/RegcaixaCRUD.class.php');
	  $regcaixa = new Regcaixa($_POST['cliente'],$_POST['item'],$_POST['fornecedor'],$_POST['valor'],$_POST['tipo'],$_POST['data'],$_POST['hora']);

	  $regcaixa->setId($_POST['id']);	
		//criar um objeto da classe RegcaixaCRUD
	  $regcaixaCRUD = new RegcaixaCRUD();
		//testando se a atualização foi realizada
	  if($regcaixaCRUD->atualizar($regcaixa)){
			header('Location: ../../registrocaixa/regbusca.php?mess=updateok');
		}else{
			header('Location: ../../registrocaixa/regbusca.php?mess=updateerro');
		}
  } 
?>