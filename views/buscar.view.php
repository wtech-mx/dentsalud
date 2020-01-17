	<?php 
	include("home.php");
 ?>

 <div class="container">
	<form class="navbar-form navbar-left"  action="<?php echo RUTA; ?>/buscar.php" method="get" name="busqueda" role="search" >
	  <div class="form-group">
	    <input type="text" class="form-control"  name="busqueda" placeholder="Buscar">
	  </div>
	  <button type="submit" class="btn btn-default">Buscar</button>
	</form>
</div>


<div class="bs-example" id="blog" style="padding: 50px;">
	<div class="row">
		<h2><?php echo $titulo; ?></h2>
	<?php foreach($resultados as $post): ?>
	  <div class="col-sm-6 col-md-4">
	    <div class="thumbnail">
	    	<p class="fecha"><?php echo fecha($post['fecha']); ?></p>
		  	<a href="single.php?id=<?php echo $post['id']; ?>">
				<img src="./imagenes/<?php echo $post['thumb']; ?>" alt="<?php echo $post['titulo'] ?>">
			</a>
	      <div class="caption">
			<h2><a href="single.php?id=<?php echo $post['id']; ?>"><?php echo $post['titulo'] ?></a></h2>
	        <p class="extracto"><?php echo $post['extracto'] ?></p>
	        <p>
	        <a href="single.php?id=<?php echo $post['id']; ?>" class="btn btn-primary" style="background-color: #5e30b6;border: #5e30b6">Continuar Leyendo</a>
	       </p>
	      </div>
	    </div>
	  </div>
	   <?php endforeach; ?>
	</div>
		<?php require 'paginacion.php'; ?>
</div>

	<?php 
	include("./footer.php");
 ?>

