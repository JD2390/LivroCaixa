<?php
class RegcaixaCRUD implements InterfaceCRUD{
	private $instanciaConexaoPdoAtiva;
	private $tabela;
	
	public function __construct(){
		$this->instanciaConexaoPdoAtiva = PdoConexao::getInstancia();
		$this->tabela = 'tbregistro';	
	}
	
	public function salvar($objeto){
		$id = null;
		$cliente = $objeto->getCliente();
		$item = $objeto->getItem();
		$fornecedor = $objeto->getFornecedor();
		$valor = $objeto->getValor();
		$tipo = $objeto->getTipo();
		$data = $objeto->getData();
		$hora = $objeto->getHora();

		$sql = "insert into {$this->tabela}(id_registro, cliente, item, fornecedor, tipo, valor, data, hora) values (:id, :cliente, :item, :fornecedor, :tipo, :valor, :data, :hora)";
		try{
			$operacao = $this->instanciaConexaoPdoAtiva->prepare($sql);
			$operacao->bindValue(":id",$id,PDO::PARAM_INT);
			$operacao->bindValue(":cliente",$cliente,PDO::PARAM_STR);
			$operacao->bindValue(":item",$item,PDO::PARAM_STR);
			$operacao->bindValue(":fornecedor",$fornecedor,PDO::PARAM_STR);
			$operacao->bindValue(":tipo",$tipo,PDO::PARAM_STR);
			$operacao->bindValue(":valor",$valor,PDO::PARAM_STR);
			$operacao->bindValue(":data",$data,PDO::PARAM_STR);
			$operacao->bindValue(":hora",$hora,PDO::PARAM_STR);
			
			//testando se o insert vai dar certo
			if($operacao->execute()){
				if($operacao->rowCount() > 0){
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
		$id = $objeto->getId();
		$cliente = $objeto->getCliente();
		$item = $objeto->getItem();
		$fornecedor = $objeto->getFornecedor();
		$valor = $objeto->getValor();
		$tipo = $objeto->getTipo();
		$data = $objeto->getData();
		$hora = $objeto->getHora();
		$sql = "update {$this->tabela} set cliente=:cliente, item=:item, fornecedor=:fornecedor, valor=:valor, tipo=:tipo, data=:data, hora=:hora where id_registro=:id";
		try{
			$operacao = $this->instanciaConexaoPdoAtiva->prepare($sql);
			$operacao->bindValue(":id",$id,PDO::PARAM_INT);
			$operacao->bindValue(":cliente",$cliente,PDO::PARAM_STR);
			$operacao->bindValue(":item",$item,PDO::PARAM_STR);
			$operacao->bindValue(":fornecedor",$fornecedor,PDO::PARAM_STR);
			$operacao->bindValue(":tipo",$tipo,PDO::PARAM_STR);
			$operacao->bindValue(":valor",$valor,PDO::PARAM_STR);
			$operacao->bindValue(":data",$data,PDO::PARAM_STR);
			$operacao->bindValue(":hora",$hora,PDO::PARAM_STR);
			if($operacao->execute()){
				return true;
			}else{
				return false;
			}			
		}catch(PDOException $excecao){
			echo $excecao->getMessage();
		}
	}
	
	public function ler($id){
		$sql = "select * from {$this->tabela} where id_registro=:id";
		try{
			$operacao = $this->instanciaConexaoPdoAtiva->prepare($sql);
			$operacao->bindValue(":id",$id,PDO::PARAM_INT);
			$operacao->execute();
			$linha=$operacao->fetch(PDO::FETCH_OBJ);
			$cliente = $linha->cliente;
			$item = $linha->item;
			$fornecedor = $linha->fornecedor;
			$valor = $linha->valor;
			$tipo = $linha->tipo;
			$data= $linha->data;
			$hora= $linha->hora;
			
			//objeto da classe regcaixa
			$regcaixa = new Regcaixa($cliente, $item, $fornecedor, $valor, $tipo, $data, $hora);
			$regcaixa->setId($id);
 			return $regcaixa;
		}catch(PDOException $excecao){
			echo $excecao->getMessage();
		}
	}
	
	public function apagar($id){
		$sql="delete from {$this->tabela} where id_registro=:id";
		try{
			$operacao = $this->instanciaConexaoPdoAtiva->prepare($sql);
			$operacao->bindValue(":id",$id,PDO::PARAM_INT);
			if($operacao->execute()){
				if($operacao->rowCount()> 0){
					return true;
				}else{
					return false;
				}
			}else{
				return false;
			}
		}catch(PDOException $excecao){
			echo $excecao->getMessage();
		}
	}
	
	public function consultar($sql){
		try{
			//preparando sql;
			$operacao= $this->instanciaConexaoPdoAtiva->prepare($sql);
			//executando a consulta
			$operacao->execute();
			//convertendo a consulta em array
			$linhas = $operacao->fetchAll();
			//retornando o array como resultado
			return $linhas;			
		}catch(PDOException $excecao){
			//mostrando erro
			echo $excecao->getMessage();
		}
	}
	
}  
?>