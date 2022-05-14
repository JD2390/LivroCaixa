<?php

class Cheque{

	private $id;
	private $ncheque;
	private $entrada;
	private $vencimento;
	private $compensacao;
	private $problema;
	private $valor;
	private $status;
	private $banco;
	private $agencia;
	private $conta;

	//Dados do Emitente
	private $nome;
	private $pessoa; //fisica ou juridica
	private $cpfcnpj;
	private $telefone;
	private $email;

	public function __construct ($ncheque, $entrada, $vencimento, $compensacao, $problema, $valor, $status, $banco, $agencia, $conta, $nome, $pessoa, $cpfcnpj, $telefone, $email){		

		$this->ncheque =  $ncheque;
		$this->entrada =  $entrada;
		$this->vencimento = $vencimento;
		$this->compensacao = $compensacao;
		$this->problema = $problema;
		$this->valor = $valor;
		$this->status = $status;
		$this->banco =  $banco;
		$this->agencia = $agencia;
		$this->conta = $conta;

		//Dados do Emitente
		$this->nome = $nome;
		$this->pessoa = $pessoa;
		$this->cpfcnpj = $cpfcnpj;
		$this->telefone = $telefone;
		$this->email = $email;
	}

	public function getId(){
		return $this->id;
	}
	public function getNcheque(){
		return $this->ncheque;
	}
	public function getEntrada(){
		return $this->entrada;
	}
	public function getVencimento(){
		return $this->vencimento;
	}
	public function getCompensacao(){
		return $this->compensacao;
	}
	public function getProblema(){
		return $this->problema;
	}
	public function getValor(){
		return $this->valor;
	}
	public function getStatus(){
		return $this->status;
	}
	public function getBanco(){
		return $this->banco;
	}
	public function getAgencia(){
		return $this->agencia;
	}
	public function getConta(){
		return $this->conta;
	}
	public function getNome(){
		return $this->nome;
	}
	public function getPessoa(){
		return $this->pessoa;
	}
	public function getCpfcnpj(){
		return $this->cpfcnpj;
	}
	public function getTelefone(){
		return $this->telefone;
	}
	public function getEmail(){
		return $this->email;
	}

	public function setId($id){
		$this->id = $id;
	}
	public function setNcheque($ncheque){
		return $this->ncheque;
	}
	public function setEntrada($entrada){
		return $this->entrada;
	}
	public function setVencimento($vencimento){
		return $this->vencimento;
	}
	public function setCompensacao($compensacao){
		return $this->compensacao;
	}
	public function setProblema($problema){
		return $this->problema;
	}
	public function setValor($valor){
		return $this->valor;
	}
	public function setStatus($status){
		return $this->status;
	}
	public function setBanco($banco){
		return $this->banco;
	}
	public function setAgencia($agencia){
		return $this->agencia;
	}
	public function setConta($conta){
		return $this->conta;
	}
	public function setNome($nome){
		return $this->nome;
	}
	public function setPessoa($pessoa){
		return $this->pessoa;
	}
	public function setCpfcnpj($cpfcnpj){
		return $this->cpfcnpj;
	}
	public function setTelefone($telefone){
		return $this->telefone;
	}
	public function setEmail($email){
		return $this->email;
	}
	
}
?>