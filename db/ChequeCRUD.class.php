<?php
class ChequeCRUD implements InterfaceCRUD{
	private $instanciaConexaoPdoAtiva;
	private $tabela;
	
	public function __construct(){
		$this->instanciaConexaoPdoAtiva = PdoConexao::getInstancia();
		$this->tabela = 'tbregistro';	
	}
	
	public function salvar($objeto){
		$id = null;
		$ncheque = $objeto->getNcheque();
		$entrada = $objeto->getEntrada();
		$vencimento = $objeto->getVencimento();
		$compensacao = $objeto->getCompensacao();
		$problema = $objeto->getProblema();
		$valor = $objeto->getValor();
		$status = $objeto->getStatus();
		$banco = $objeto->getBanco();
		$agencia = $objeto->getAgencia();
		$conta = $objeto->getConta();

		//Dados do Emitente
		$nome = $objeto->getNome();
		$pessoa = $objeto->getPessoa(); //fisica ou juridica
		$cpfcnpj = $objeto->getCpfcnpj();
		$telefone = $objeto->getTelefone();
		$email = $objeto->getEmail();		

		$sql = "insert into {$this->tabela}(id_cheque, ncheque, entrada, vencimento, compensacao, problema, valor, status, banco, agencia, conta, nome, pessoa, cpfcnpj, telefone, email) values (:id, :ncheque, :entrada, :vencimento, :compensacao, :problema, :valor, :status, :banco, :agencia, :conta, :nome, :pessoa, :cpfcnpj, :telefone, :email)";
		try{
			$operacao = $this->instanciaConexaoPdoAtiva->prepare($sql);
			$operacao->bindValue(":id",$id,PDO::PARAM_INT);
			$operacao->bindValue(":ncheque",$ncheque,PDO::PARAM_STR);
			$operacao->bindValue(":entrada",$entrada,PDO::PARAM_STR);
			$operacao->bindValue(":vencimento",$vencimento,PDO::PARAM_STR);
			$operacao->bindValue(":compensacao",$compensacao,PDO::PARAM_STR);
			$operacao->bindValue(":problema",$problema,PDO::PARAM_STR);
			$operacao->bindValue(":valor",$valor,PDO::PARAM_STR);
			$operacao->bindValue(":status",$status,PDO::PARAM_STR);
			$operacao->bindValue(":banco",$banco,PDO::PARAM_STR);
			$operacao->bindValue(":agencia",$agencia,PDO::PARAM_STR);
			$operacao->bindValue(":conta",$conta,PDO::PARAM_STR);
			$operacao->bindValue(":nome",$nome,PDO::PARAM_STR);
			$operacao->bindValue(":pessoa",$pessoa,PDO::PARAM_STR);
			$operacao->bindValue(":cpfcnpj",$cpfcnpj,PDO::PARAM_STR);
			$operacao->bindValue(":telefone",$telefone,PDO::PARAM_STR);
			$operacao->bindValue(":email",$email,PDO::PARAM_STR);
			
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
		$ncheque = $objeto->getNcheque();
		$entrada = $objeto->getEntrada();
		$vencimento = $objeto->getVencimento();
		$compensacao = $objeto->getCompensacao();
		$problema = $objeto->getProblema();
		$valor = $objeto->getValor();
		$status = $objeto->getStatus();
		$banco = $objeto->getBanco();
		$agencia = $objeto->getAgencia();
		$conta = $objeto->getConta();

		//Dados do Emitente
		$nome = $objeto->getNome();
		$pessoa = $objeto->getPessoa(); //fisica ou juridica
		$cpfcnpj = $objeto->getCpfcnpj();
		$telefone = $objeto->getTelefone();
		$email = $objeto->getEmail();

		$sql = "update {$this->tabela} set ncheque=:ncheque, entrada=:entrada, vencimento=:vencimento, compensacao=:compensacao, problema=:problema, valor=:valor, status=:status, banco=:banco, agencia=:agencia, conta=:conta, nome=:nome, pessoa=:pessoa, cpfcnpj=:cpfcnpj, telefone=:telefone, email=:email where id_cheque=:id";
		try{
			$operacao = $this->instanciaConexaoPdoAtiva->prepare($sql);
			$operacao->bindValue(":id",$id,PDO::PARAM_INT);
			$operacao->bindValue(":ncheque",$ncheque,PDO::PARAM_STR);
			$operacao->bindValue(":entrada",$entrada,PDO::PARAM_STR);
			$operacao->bindValue(":vencimento",$vencimento,PDO::PARAM_STR);
			$operacao->bindValue(":compensacao",$compensacao,PDO::PARAM_STR);
			$operacao->bindValue(":problema",$problema,PDO::PARAM_STR);
			$operacao->bindValue(":valor",$valor,PDO::PARAM_STR);
			$operacao->bindValue(":status",$status,PDO::PARAM_STR);
			$operacao->bindValue(":banco",$banco,PDO::PARAM_STR);
			$operacao->bindValue(":agencia",$agencia,PDO::PARAM_STR);
			$operacao->bindValue(":conta",$conta,PDO::PARAM_STR);
			$operacao->bindValue(":nome",$nome,PDO::PARAM_STR);
			$operacao->bindValue(":pessoa",$pessoa,PDO::PARAM_STR);
			$operacao->bindValue(":cpfcnpj",$cpfcnpj,PDO::PARAM_STR);
			$operacao->bindValue(":telefone",$telefone,PDO::PARAM_STR);
			$operacao->bindValue(":email",$email,PDO::PARAM_STR);
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
		$sql = "select * from {$this->tabela} where id_cheque=:id";
		try{
			$operacao = $this->instanciaConexaoPdoAtiva->prepare($sql);
			$operacao->bindValue(":id",$id,PDO::PARAM_INT);
			$operacao->execute();
			$linha=$operacao->fetch(PDO::FETCH_OBJ);
			$ncheque=$linha->ncheque;
			$entrada=$linha->entrada;
			$vencimento=$linha->vencimento;
			$compensacao=$linha->compensacao;
			$problema=$linha->problema;
			$valor=$linha->valor;
			$status=$linha->status;
			$banco=$linha->banco;
			$agencia=$linha->agencia;
			$conta$linha->conta;
			$nome=$linha->nome;
			$pessoa=$linha->pessoa;
			$cpfcnpj=$linha->cpfcnpj;
			$telefone=$linha->telefone;
			$email=$linha->email;
			
			//objeto da classe regcaixa
			$regcaixa = new Regcaixa($ncheque, $entrada, $vencimento, $compensacao, $problema, $valor, $status, $banco, $agencia, $conta, $nome, $pessoa, $cpfcnpj, $telefone, $email);
			$regcaixa->setId($id);
 			return $regcaixa;
		}catch(PDOException $excecao){
			echo $excecao->getMessage();
		}
	}
	
	public function apagar($id){
		$sql="delete from {$this->tabela} where id_cheque=:id";
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