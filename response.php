<?php

// require 'src/Cliente.class.php';
// require 'classes/PessoaFisicaClass.php';
// require 'classes/PessoaJuridicaClass.php';

require 'config.php';

$lstClientesPf = array();
$lstClientesPj = array();

$clientepf = new PessoaFisica();
$lstClientesPf = $clientepf->getClientes();

$clientepj = new PessoaJuridica();
$lstClientesPj = $clientepj->getClientes();

$listClientes = array_merge($lstClientesPf, $lstClientesPj);

$results = array(
        "sEcho" => 1,
        "iTotalRecords" => count($listClientes),
        "iTotalDisplayRecords" => count($listClientes),
        "aaData"=>$listClientes);

// echo "<pre>";
// print_r ($results);
// die;

echo json_encode($results);
?>