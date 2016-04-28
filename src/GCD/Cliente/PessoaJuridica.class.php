<?php

class PessoaJuridica extends Cliente implements JsonSerializable {
	private $cnpj;
	
	public function getCnpj() {
		return $this->cnpj;
	}
	public function setCnpj($cnpj) {
		$this->cnpj = $cnpj;
		return $this;
	}
	
	public function getClientes() {
		$clientes = array();
		for ($i=5;$i<10;$i++) {
			$cliente = new PessoaJuridica();
			$cliente->setNome("Cliente $i");
			$cliente->setEndereco("Rua $i, lote $i$i casa $i$i$i");
			$cliente->setEmail("cliente$i@teste.com");			
			$cliente->setCnpj("00.00$i.0$i$i/0001-$i$i");
			$cliente->setClienteDesde(1995+$i);
			$clientes[] = $cliente;
		}
		return $clientes;
	}
	
	public function JsonSerialize()
	{
		$vars = parent::JsonSerialize();
		$vars['cnpj'] = $this->cnpj;
		return $vars;	
	}
	
	
	
}