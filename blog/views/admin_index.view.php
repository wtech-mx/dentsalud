<?php require '../views/estilos.php';

 ?>

<div class="contenedor p-5">
	<h2>Panel de Control</h2>
	<a href="nuevo.php" class="btn btn-success p-3">Nuevo Post</a>
	<a href="cerrar.php"class="btn btn-dark p-3">Cerrar Sesion</a>

	<?php foreach($posts as $post): ?>
	<section class="post">
		<article>
			<h2 class="titulo"><?php echo $post['id'] . '.- ' . $post['titulo']; ?></h2>
			<a type="button" class="btn btn-warning" href="editar.php?id=<?php echo $post['id']; ?>">Editar</a>
			<a type="button" class="btn btn-primary" target="blank" href="../single.php?id=<?php echo $post['id']; ?>">Ver</a>
			<a type="button" class="btn btn-danger" href="borrar.php?id=<?php echo $post['id']; ?>">Borrar</a>


		</article>
	</section>
	<?php endforeach; ?>
</div>

<?php require '../paginacion.php'; ?>

<?php 
	include("slide.php");
 ?>



