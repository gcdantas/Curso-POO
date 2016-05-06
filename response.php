<?php

define ('CLASS_DIR','src');
set_include_path(get_include_path().PATH_SEPARATOR.CLASS_DIR);
spl_autoload_register();

$conexao = null;

try {
	$conexao = new PDO("mysql:host=localhost;dbname=php-poo", 'root', '');
	$conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch(PDOException $e) {
	echo "Error: " . $e->getMessage();
}

$clientes = new GCD\Cliente\Cliente($conexao);
$listClientes = $clientes->getClientes();

$results = array(
        "sEcho" => 1,
        "iTotalRecords" => count($listClientes),
        "iTotalDisplayRecords" => count($listClientes),
        "aaData"=>$listClientes);

echo json_encode($results);
?>