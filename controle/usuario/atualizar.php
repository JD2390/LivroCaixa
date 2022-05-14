<?php
  if (isset($_POST['id'])) {
  	include('../../db/PdoConexao.class.php');
  	include('../../db/InterfaceCRUD.class.php');
  	include('../../db/Usuario.class.php');
  	include('../../db/UsuarioCRUD.class.php');
  	$usuario = new Usuario($_POST['nome'],$_POST['email'],$_POST['senha']);
    //adicionando o id do usuario
    $usuario->setId($_POST['id']);
  	//criando objeto da classe crud
  	$usuarioCRUD = new UsuarioCRUD();
  	if ($usuarioCRUD->atualizar($usuario)){
  		//echo 'Atualizado';
  		header('Location: ../../usuario/frmbusca.php?mess=updateok');
  	}else{
  		//echo 'Erro';
  		header('Location: ../../usuario/frmbusca.php?mess=updateerro');
  	}
  }
?>