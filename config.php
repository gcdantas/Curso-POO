<?php
// spl_autoload_register("autoload");

// function autoload($class_name) {
// 	// $path_class:  Define os diretórios onde se encontram as classes.
// 	$path_class = array("src/classes");
// 	foreach ($path_class as $path) {
// 		$strObjectFilePath = "{$path}{$class_name}.class.php";
// 		if((file_exists($strObjectFilePath) === true) && (is_readable($strObjectFilePath) === true)) {
// 			require ($strObjectFilePath);
// 		}
// 	}
// 	return false;
// }

require 'src/classes/Cliente.class.php';
require 'src/classes/PessoaFisica.class.php';
require 'src/classes/PessoaJuridica.class.php';
?>