<?php

require "conexion.php";



$conexion = new Conexion();


#$datos = json_decode(file_get_contents("php://input"));


extract($_REQUEST);


//PDO

try{	
	
	
	$stmt = $conexion->prepare("UPDATE demo SET nombre = ?, identificacion =  ? WHERE id = ?");

	$query = $stmt->execute(array($nombre, $identificacion, $id));	
	
	
	if ($stmt->errorCode() != '00000') {
		
		print "\nPDO::errorInfo conexion():\n";
		
		print_r($conexion->errorInfo());

		print "\nPDO::errorInfo consulta():\n";

		print_r($stmt->errorInfo());
		
	}else{

		print "New records created successfully: ".$query;

	}
		
	
	
	
}


catch(PDOException $e){
	
	
	echo 'Ha surgido un error y no se puede insertar a la base de datos. Detalle: ' . $e->getMessage();	
	
	
	exit;
	
	
	
}


