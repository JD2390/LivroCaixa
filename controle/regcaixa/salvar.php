<?php
  if(isset($_POST['cliente'])){
	include('../../db/PdoConexao.class.php');   
	include('../../db/Regcaixa.class.php');   
	include('../../db/InterfaceCRUD.class.php');   
	include('../../db/RegcaixaCRUD.class.php');	

	//criando objeto acervo e passando os dados para o construtor
	$regcaixa = new Regcaixa($_POST['cliente'],$_POST['item'],$_POST['fornecedor'],$_POST['valor'],$_POST['tipo'],$_POST['data'],$_POST['hora']);
	
	//criando objeto da classe CRUD
	$regcaixaCRUD = new RegcaixaCRUD();
	
	if($regcaixaCRUD->salvar($regcaixa)){
		header('Location: ../../registrocaixa/regcad.php?mess=ok'); 
	}else{
		//echo "<br>erro";
		header('Location: ../../registrocaixa/regcad.php?mess=erro'); 
    }
  }
?>