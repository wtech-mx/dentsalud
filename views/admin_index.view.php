<?php require '../views/estilos.php';

 ?>

<div class="contenedor p-5">
	<h2>Panel de Control</h2>
	<a href="nuevo.php" class="btn btn-sm btn-success p-3">Nuevo Post</a>
	<a href="cerrar.php"class="btn btn-sm btn-dark p-3">Cerrar Sesion</a>

	<?php foreach($posts as $post): ?>
	<section class="post">
		<article>
			<h2 class="titulo"><?php echo $post['id'] . '.- ' . $post['titulo']; ?></h2>
			<a type="button" class="btn btn-sm btn-warning"  href="editar.php?id=<?php echo $post['id']; ?>">Editar</a>
			<a type="button" class="btn btn-sm btn-primary"   href="../single.php?id=<?php echo $post['id']; ?>" target="_blank">Ver</a>
			<a type="button" class="btn btn-sm btn-danger" href="borrar.php?id=<?php echo $post['id']; ?>">Borrar</a>


		</article>
	</section>
	<?php endforeach; ?>
</div>

<?php require '../paginacion.php'; ?>

<?php 
	include("slide.php");
	include("gallery-view.php");
 ?>

<!-- <div class="contenedor p-5">
	<h2>Panel de Galerias</h2>
		<article>
			<a href="../adminBanner/bannerlist-corpo.php" class="btn btn-lg btn-primary" target="blank" style="border-radius: 30px;background-image: linear-gradient(to right, #7e59db, #6f4bcb, #5f3cbb, #4f2eab, #3f209b); width: 30%;height: 50px">Letras Corporeas</a>

			<a href="../adminBanner/bannerlist-dig.php" class="btn btn-lg btn-primary" target="blank" style="border-radius: 30px;background-image: linear-gradient(to right, #7e59db, #6f4bcb, #5f3cbb, #4f2eab, #3f209b); width: 30%;height: 50px">Impresion Digital</a>

			<a href="../adminBanner/bannerlist-lumi.php" class="btn btn-lg btn-primary" target="blank" style="border-radius: 30px;background-image: linear-gradient(to right, #7e59db, #6f4bcb, #5f3cbb, #4f2eab, #3f209b); width: 30%;height: 50px">Anuncios Luminosos</a>

			<a href="../adminBanner/bannerlist-seña.php" class="btn btn-lg btn-primary" target="blank" style="border-radius: 30px;background-image: linear-gradient(to right, #7e59db, #6f4bcb, #5f3cbb, #4f2eab, #3f209b); width: 30%;height: 50px">Señaletica</a>

			<a href="../adminBanner/bannerlist-promo.php" class="btn btn-lg btn-primary" target="blank" style="border-radius: 30px;background-image: linear-gradient(to right, #7e59db, #6f4bcb, #5f3cbb, #4f2eab, #3f209b); width: 30%;height: 50px">Promocionales</a>

			<a href="../adminBanner/bannerlist-art.php" class="btn btn-lg btn-primary" target="blank" style="border-radius: 30px;background-image: linear-gradient(to right, #7e59db, #6f4bcb, #5f3cbb, #4f2eab, #3f209b); width: 30%;height: 50px">Artes Graficas</a>

			<a href="../adminBanner/bannerlist-tab.php" class="btn btn-lg btn-primary" target="blank" style="border-radius: 30px;background-image: linear-gradient(to right, #7e59db, #6f4bcb, #5f3cbb, #4f2eab, #3f209b); width: 30%;height: 60px">Tableros y letreros de acrilico</a>

			<a href="../adminBanner/bannerlist-vin.php" class="btn btn-lg btn-primary" target="blank" style="border-radius: 30px;background-image: linear-gradient(to right, #7e59db, #6f4bcb, #5f3cbb, #4f2eab, #3f209b); width: 30%;height: 50px">Recorte de Vinil</a>
		</article>
</div>-->