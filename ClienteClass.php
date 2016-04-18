<?php
class Cliente implements JsonSerializable {
	private $nome;
	private $cpf;
	private $endereco;
	private $email;
	
	public function getNome() {
		return $this->nome;
	}
	public function setNome($nome) {
		$this->nome = $nome;
		return $this;
	}
	public function getCpf() {
		return $this->cpf;
	}
	public function setCpf($cpf) {
		$this->cpf = $cpf;
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
	
	public function getClientes() {
		$clientes = array();
		for ($i=0;$i<10;$i++) {
			$cliente = new Cliente();
			$cliente->setNome("Cliente $i");
			$cliente->setEndereco("Rua $i, lote $i$i casa $i$i$i");
			$cliente->setEmail("cliente$i@teste.com");
			$cliente->setCpf("00$i.00$i.000-$i$i");
			$clientes[] = $cliente;
		}
		return $clientes;
	}
	
	public function JsonSerialize()
	{
		$vars = get_object_vars($this);
	
		return $vars;
	}
	
	
}