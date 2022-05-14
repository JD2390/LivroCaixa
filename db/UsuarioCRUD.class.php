<?php

	class UsuarioCRUD implements InterfaceCRUD{
		private $instanciaConexaoPdoAtiva;
		private $tabela;

		public function __construct(){
			$this->instanciaConexaoPdoAtiva = PdoConexao::getInstancia();
			$this->tabela = 'tbusuario';
		}
		public function salvar($objeto){
			$id = null;
			$nome = $objeto->getNome();
			$email = $objeto->getEmail();
			$senha = $objeto->getSenha();
			$sql = "insert into {$this->tabela} (id_usuario,nome,email,senha) values (:id,:nome,:email,:senha)";
			try{
				$operacao = $this->instanciaConexaoPdoAtiva->prepare($sql);
				$operacao->bindValue(":id",$id,PDO::PARAM_INT);
				$operacao->bindValue(":nome",$nome,PDO::PARAM_STR);
				$operacao->bindValue(":email",$email,PDO::PARAM_STR);
				$operacao->bindValue(":senha",$senha,PDO::PARAM_STR);
				//testando se o insert vai dar certo
				if ($operacao->execute()) {
					if ($operacao->rowCount() > 0) {
						return true;
					}else{
						return false;
					}
				}else{
					return false;
				}

			}catch (PDOException $excecao){
				echo $excecao->getMessage();
			}
		}
		public function atualizar($objeto){
			//UPDATE `tbusuario` SET `nome` = 'nome1', `email` = 'nome@teste.com.br', `senha` = '3211' WHERE `tbusuario`.`id_usuario` = 2;
			$id = $objeto->getId();
			$nome = $objeto->getNome();
			$email = $objeto->getEmail();
			$senha = $objeto->getSenha();
			$sql = "update {$this->tabela} set nome=:nome, email=:email, senha=:senha where id_usuario=:id";
			try{
				$operacao = $this->instanciaConexaoPdoAtiva->prepare($sql);
				$operacao->bindValue(":id",$id,PDO::PARAM_INT);
				$operacao->bindValue(":nome",$nome,PDO::PARAM_STR);
				$operacao->bindValue(":email",$email,PDO::PARAM_STR);
				$operacao->bindValue(":senha",$senha,PDO::PARAM_STR);
				//testando se o atualizar vai dar certo
				if ($operacao->execute()) {
					return true;
				}else{
					return false;
				}

			}catch (PDOException $excecao){
				echo $excecao->getMessage();
			}
		}
		public function ler($id){
			$sql = "select * from {$this->tabela} where id_usuario=:id";
			try{
				$operacao = $this-> instanciaConexaoPdoAtiva->prepare($sql);
				$operacao->bindValue(":id",$id,PDO::PARAM_INT);
				$operacao->execute();
				$linha = $operacao-> fetch(PDO::FETCH_OBJ);
				$nome = $linha-> nome;
				$email = $linha-> email;
				$senha = $linha-> senha;
				//objeto da classe usuario
				$usuario = new Usuario($nome,$email,$senha);
				$usuario->setId($id);
				return $usuario;
				
			}catch (PDOException $excecao){
				echo $excecao->getMessage();
			}
		}
		public function apagar($id){
			$sql = "delete from {$this->tabela} where id_usuario=:id";
			try{
				$operacao = $this->instanciaConexaoPdoAtiva->prepare($sql);
				$operacao->bindValue(":id",$id,PDO::PARAM_INT);
				//testando se o delete vai dar certo
				if ($operacao->execute()) {
					if ($operacao->rowCount() > 0) {
						return true;
					}else{
						return false;
					}
				}else{
					return false;
				}
			}catch (PDOException $excecao){
				echo $excecao->getMessage();
			}
		}
		//função consultar
		public function consultar($sql){
			try{
				$operacao= $this->instanciaConexaoPdoAtiva->prepare($sql);
				$operacao->execute();
				$linhas = $operacao->fetchAll();
				return $linhas;
			}catch(PDOException $excecao){
				echo $excecao->getMessage();
			}
		}
		//criando String do select
		public function login($email, $senha){
			$sql = "select * from {$this->tabela} where email=:email and senha=:senha";
			try {
				//preparando a consulta
				$operacao = $this->instanciaConexaoPdoAtiva->prepare($sql);
				//ligando os valores
				$operacao->bindValue(":email",$email,PDO::PARAM_STR);
				$operacao->bindValue(":senha",$senha,PDO::PARAM_STR);
				//executando a consulta
				$operacao->execute();
				//verificando se a consulta retornou pelo menos um registro
				if ($operacao->rowCount() > 0) {
					//convertendo a consulta do objeto em tabela
					$linha = $operacao->fetch(PDO::FETCH_OBJ);
					return $linha;
				}else{
					return false;
				}

			} catch (PDOException $excecao) {
				echo $excecao->getMessage();
			}
		}
	}	
?>