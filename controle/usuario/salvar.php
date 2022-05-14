<?php
  if (isset($_POST['nome'])) {
  	include('../../db/PdoConexao.class.php');
  	include('../../db/InterfaceCRUD.class.php');
  	include('../../db/Usuario.class.php');
  	include('../../db/UsuarioCRUD.class.php');
  	$usuario = new Usuario($_POST['nome'],$_POST['email'],$_POST['senha']);
  	//criando objeto da classe crud
  	$usuarioCRUD = new UsuarioCRUD();
  	if ($usuarioCRUD->salvar($usuario)){
  		//echo 'Salvo';
  		header('Location: ../../usuario/frmcad.php?mess=ok');
  	}else{
  		//echo 'Erro';
  		header('Location: ../../usuario/frmcad.php?mess=erro');
  	}
  }
?>