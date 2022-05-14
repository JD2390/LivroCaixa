<?php

class Regcaixa{
	
	private $id;
	private $cliente;
	private $item;
	private $fornecedor;
	private $valor;
	private $tipo;
	private $data;
	private $hora;

	public function __construct ($cliente, $item, $fornecedor, $valor, $tipo, $data, $hora){
		
		$this->cliente = $cliente;
		$this->item = $item;
		$this->fornecedor = $fornecedor;
		$this->valor = $valor;
		$this->tipo = $tipo;
		$this->data = $data;
		$this->hora = $hora;
	}

	public function getId(){
		return $this->id;
	}
	public function getCliente(){
		return $this->cliente;
	}
	public function getItem(){
		return $this->item;
	}
	public function getFornecedor(){
		return $this->fornecedor;
	}
	public function getValor(){
		return $this->valor;
	}
	public function getTipo(){
		return $this->tipo;
	}
	public function getData(){
		return $this->data;
	}
	public function getHora(){
		return $this->hora;
	}

	public function setId($id){
		$this->id = $id;
	}
	public function setCliente($cliente){
		$this->cliente = $cliente;
	}
	public function setItem($item){
		$this->item = $item;
	}
	public function setFornecedor($fornecedor){
		$this->fornecedor = $fornecedor;
	}
	public function setValor($valor){
		$this->valor = $valor;
	}
	public function setTipo($tipo){
		$this->tipo = $tipo;
	}
	public function setData($data){
		$this->data = $data;
	}
	public function setHora($hora){
		$this->hora = $hora;
	}
	
}
?>