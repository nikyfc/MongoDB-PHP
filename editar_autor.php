<?php
	
	$manager = new MongoDB\Driver\Manager("mongodb://localhost:27017");
	$bulk = new MongoDB\Driver\BulkWrite();
	/////////////////////////////////
	$nameAutor = $_POST["inputNameAutor"];
	$id = $_POST["id"];
	$condicion = array("_id" => new MongoDB\BSON\ObjectId($id));
	$modAutor = array("nombre"=>$nameAutor);
	$bulk->update($condicion , ['$set' => $modAutor], ['multi' => false, 'upsert' => false]);

	$writeConcern = new MongoDB\Driver\WriteConcern(MongoDB\Driver\WriteConcern::MAJORITY, 100);
	$result = $manager->executeBulkWrite('library.autors', $bulk, $writeConcern);

	header("Refresh: 0;url=autores.php?mensaje=3")
?>