<?php 
	$manager = new MongoDB\Driver\Manager("mongodb://localhost:27017");
	$query = new MongoDB\Driver\Query([],[]);
$cursor = $manager->executeQuery('library.books', $query);
$c_libros = array();
foreach ($cursor as $document) {
    array_push($c_libros,['_id'=>$document->_id,
    						'nombre'=>$document->nombre,
    						'autor'=>$document->autor,
    						'descripcion'=>$document->descripcion]);
}
?>