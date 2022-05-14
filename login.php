<?php
//verificando se os valores da pagina de index estão chegando
	if(isset($_POST['email']) && isset($_POST['senha'])){
		include('db/InterfaceCRUD.class.php');
		include('db/PdoConexao.class.php');
		include('db/Usuario.class.php');
		include('db/UsuarioCRUD.class.php');
		//criar o metodo usuarioCRUD
		$usuarioCRUD = new UsuarioCRUD();
		//realizar o metodo login da classe UsuarioCRUD
		$login = $usuarioCRUD->login($_POST['email'],$_POST['senha']);
		if ($login == false){
			header('Location: index.php?mess=erro');
		}else {
			//iniciando a sessão
			session_start();
			//criando uma variavel de sessão
			$_SESSION['login'] = 'ok';
			//variaives para o nome e id_usuario
			$_SESSION['id_usuario'] = $login->id_usuario;
			$_SESSION['nome_usuario'] = $login->nome;
			header('Location: principal.php?mess=ok');
		}
	}
?>
