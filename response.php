<?php


require "ClienteClass.php";
	
$cliente = new Cliente();
$lstClientes = $cliente->getClientes();

$results = array(
        "sEcho" => 1,
        "iTotalRecords" => count($lstClientes),
        "iTotalDisplayRecords" => count($lstClientes),
        "aaData"=>$lstClientes);
/*while($row = $result->fetch_array(MYSQLI_ASSOC)){
  $results["data"][] = $row ;
}*/

echo json_encode($results);


?>