<?php

namespace GCD\Cliente;

class PessoaFisica extends Cliente implements \JsonSerializable {
	private $cpf;
	
	public function getCpf() {
		return $this->cpf;
	}
	public function setCpf($cpf) {
		$this->cpf = $cpf;
		return $this;
	}
	
// 	public  function getClientes() {
// 		$clientes = array();
// 		for ($i=0;$i<5;$i++) {
// 			$cliente = new PessoaFisica();
// 			$cliente->setNome("Cliente $i");
// 			$cliente->setEndereco("Rua $i, lote $i$i casa $i$i$i");
// 			$cliente->setEmail("cliente$i@teste.com");
// 			$cliente->setCpf("00$i.00$i.000-$i$i");
// 			$cliente->setClienteDesde(1995+$i);
// 			$clientes[] = $cliente;
// 		}
// 		return $clientes;
// 	}
		
	public function JsonSerialize()
	{
		$vars = parent::JsonSerialize();
		$vars['cpf'] = $this->cpf;
		return $vars;	
	}
}