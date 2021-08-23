<?php

	$servidor="mysql:dbname=usuarios;host=127.0.0.1";
	$usuario="root";
	$password="";

try{
	$pdo= new PDO($servidor,$usuario,$password);
	//echo "conectado!";

}catch(PDOException $e){

	echo "Conexión mala.. :(".$e->getMessage();

}

?>