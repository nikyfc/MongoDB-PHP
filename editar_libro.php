<?php

	$manager = new MongoDB\Driver\Manager("mongodb://localhost:27017");
	$bulk = new MongoDB\Driver\BulkWrite();
	/////////////////////////////////
	
	$id = $_POST['id'];
	$nameLibro = $_POST['nameLibro'];
	$autor = $_POST["autor"];
	$descripcion = $_POST['descripcion'];


	$condicion = array("_id" => new MongoDB\BSON\ObjectId($id));
	$modLibro = array("nombre"=>$nameLibro, "autor"=>$autor, "descripcion"=>$descripcion);
	$bulk->update($condicion , ['$set' => $modLibro], ['multi' => false, 'upsert' => false]);

	$writeConcern = new MongoDB\Driver\WriteConcern(MongoDB\Driver\WriteConcern::MAJORITY, 100);
	$result = $manager->executeBulkWrite('library.books', $bulk, $writeConcern);

	header("Refresh: 0;url=index.php?mensaje=3");
?>