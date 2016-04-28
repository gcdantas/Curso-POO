<?php

define ('CLASS_DIR','src');
set_include_path(get_include_path().PATH_SEPARATOR.CLASS_DIR);
spl_autoload_register();

$lstClientesPf = array();
$lstClientesPj = array();

$clientepf = new GCD\Cliente\PessoaFisica();
$lstClientesPf = $clientepf->getClientes();

$clientepj = new GCD\Cliente\PessoaJuridica();
$lstClientesPj = $clientepj->getClientes();

$listClientes = array_merge($lstClientesPf, $lstClientesPj);

$results = array(
        "sEcho" => 1,
        "iTotalRecords" => count($listClientes),
        "iTotalDisplayRecords" => count($listClientes),
        "aaData"=>$listClientes);

echo json_encode($results);
?>