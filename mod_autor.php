<!DOCTYPE html>
<html lang="es">
  <head>
   <?php 
	  	require_once("head.php");
	  ?>

  </head>
  <body>
  	<div class="navbar navbar navbar-inverse navbar-fixed-top">
	  <?php 
	  	require_once("nav.php");
	  ?>
	</div>
	<div class="container">
		<h2>Modificando un Autor</h2>
		<p class="text-info">Aquí modificaremos el nombre del autor.</p>
		<form class="form-horizontal" action="editar_autor.php" method="post">
			<?php
				require_once("connect_autores.php");

				$id = $_GET["id"];
				$nameAutor = array();
				foreach ($c_autores as $autor){
					if($autor['_id'] == $id )
						$nameAutor = $autor;

				}
			?>
		  	<div class="control-group">
		    	<label class="control-label" for="inputNameAutor">Nombre del Autor</label>
		    	<div class="controls">
		      		<input type="text" name="inputNameAutor" id="inputNameAutor" class="input-xlarge" placeholder="Nombre del Autor" value="<?php echo $nameAutor['nombre']; ?>"/>
		    		<input type="hidden" name="id" value="<?php echo $id; ?>" />
		    	</div>
		  	</div>
		  	<div class="control-group">
		    	<div class="controls">
		      		<button type="submit" class="btn btn-large btn-primary"><i class="icon-user icon-white"></i> Modificar Autor</button>
		    	</div>
		  	</div>
		</form>

	</div> <!-- /container -->
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
  </body>
</html>