<?php

namespace GCD\Cliente;

class Cliente implements \JsonSerializable {

	
	private $nome;
	private $endereco;
	private $email;
	private $clienteDesde;
	private $qtdEstrelas;
	private $cpf_cnpj;
	private $conexao;
	
	function __construct($pdo) {
		$this->conexao = $pdo;
	}
	
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
	
// 	public abstract function getClientes();
	
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
	
	public  function getClientes() {
		
		$clientes = array();
		$sql = "select * from cliente";
		$conexao = self::getConexao();
		
		$stmt = $conexao->query($sql) OR trigger_error($conexao->error, E_USER_ERROR);

		$clientes = array();
		while ($cliente_db = $stmt->fetch()) {
				$cliente = new Cliente($conexao);
				$cliente->setNome($cliente_db['nome']);
				$cliente->setCpfCnpj($cliente_db['cpf_cnpj']);
				$cliente->setEndereco($cliente_db['endereco']);
				$cliente->setEmail($cliente_db['email']);
				$cliente->setClienteDesde($cliente_db['cliente_desde']);
				$clientes[] = $cliente;
		}
		
		return $clientes;
	}
	public function getCpfCnpj() {
		return $this->cpf_cnpj;
	}
	public function setCpfCnpj($cpf_cnpj) {
		$this->cpf_cnpj = $cpf_cnpj;
		return $this;
	}
	public function getConexao() {
		return $this->conexao;
	}
	public function setConexao($conexao) {
		$this->conexao = $conexao;
		return $this;
	}
}