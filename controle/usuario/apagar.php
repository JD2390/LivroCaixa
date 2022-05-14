<?php
  if (isset($_GET['id'])) {
  	include('../../db/PdoConexao.class.php');
  	include('../../db/InterfaceCRUD.class.php');
  	include('../../db/Usuario.class.php');
  	include('../../db/UsuarioCRUD.class.php');
  	
    //criando objeto da classe crud
  	$usuarioCRUD = new UsuarioCRUD();
  	if ($usuarioCRUD->apagar($_GET['id'])){
  		//echo 'Excluido com Sucesso';
  		header('Location: ../../usuario/frmbusca.php?mess=exc');
  	}else{
  		//echo 'Erro ao Excluir';
  		header('Location: ../../usuario/frmbusca.php?mess=delerro');
  	}
  }
?>