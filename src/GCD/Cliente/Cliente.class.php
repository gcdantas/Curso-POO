<?php

require 'Importancia.interface.php';

abstract class Cliente implements JsonSerializable, Importancia {
	private $nome;
	private $endereco;
	private $email;
	private $clienteDesde;
	private $qtdEstrelas;
	
	public function getNome() {
		return $this->nome;
	}
	public function setNome($nome) {
		$this->nome = $nome;
		return $this;
	}
	
	public function getClienteDesde() {
		return $this->clienteDesde;
	}
	public function setClienteDesde($clienteDesde) {
		$this->clienteDesde = $clienteDesde;
		return $this;
	}
	
	public function getEndereco() {
		return $this->endereco;
	}
	public function setEndereco($endereco) {
		$this->endereco = $endereco;
		return $this;
	}
	public function getEmail() {
		return $this->email;
	}
	public function setEmail($email) {
		$this->email = $email;
		return $this;
	}
	
	public abstract function getClientes();
	
	public function JsonSerialize()
	{
		$vars = get_object_vars($this);
	
		return $vars;
	}
	public function getQtdEstrelas() {
		return $this->qtdEstrelas;
	}
	public function setQtdEstrelas($qtdEstrelas) {
		$this->qtdEstrelas = $qtdEstrelas;
		return $this;
	}
	
	public function getGrauImportancia () {
		return rand(1,5);
	}
	
	
}