<?php
	

	$bulk = new MongoDB\Driver\BulkWrite();

	$nameLibro = $_POST["nameLibro"];
	$autor = $_POST["autor"];
	$descripcion = $_POST["descripcion"];

	$nuevoLibro = array("nombre"=>$nameLibro,"autor"=>$autor,"descripcion"=>$descripcion);
	

	$bulk->insert($nuevoLibro);

	$manager = new MongoDB\Driver\Manager('mongodb://localhost:27017');
	$writeConcern = new MongoDB\Driver\WriteConcern(MongoDB\Driver\WriteConcern::MAJORITY, 100);
	$result = $manager->executeBulkWrite('library.books', $bulk, $writeConcern);

	header("Refresh: 0;url=index.php?mensaje=2");


?>