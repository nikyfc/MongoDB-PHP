<?php
	$bulk = new MongoDB\Driver\BulkWrite();

	$nameAutor = $_POST["inputNameAutor"];
	$nuevoAutor = array("nombre"=>$nameAutor);
	

	$bulk->insert($nuevoAutor);

	$manager = new MongoDB\Driver\Manager('mongodb://localhost:27017');
	$writeConcern = new MongoDB\Driver\WriteConcern(MongoDB\Driver\WriteConcern::MAJORITY, 100);
	$result = $manager->executeBulkWrite('library.autors', $bulk, $writeConcern);

	header("Refresh: 0;url=autores.php?mensaje=2")
?>