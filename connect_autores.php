<?php 
/* 
	$mongo = new Mongo();
	$db = $mongo->selectDB("librosdb");
	$c_autores = $mongo->selectCollection($db,"autores"); */
$manager = new MongoDB\Driver\Manager("mongodb://localhost:27017");
	$query = new MongoDB\Driver\Query([],[]);
$cursor = $manager->executeQuery('library.autors', $query);
$c_autores = array();
foreach ($cursor as $document) {
    array_push($c_autores,['_id'=>$document->_id,'nombre'=>$document->nombre]);
}
//var_dump(count($c_autores));
?>