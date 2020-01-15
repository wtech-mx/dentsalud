<?php require 'header.php' ?>
<?php include 'estilos.php'; ?>

<style type="text/css" media="screen">
	header{
     display: none;
	}
</style>

	<div class="contenedor">
		<div class="row justify-content-start ">
			<div class="col p-5">
				<div class="post">
					<article class="">
						<h2 class="titulo">Nuevo Slide</h2>
						<form action="../admin/add-slide.php" enctype="multipart/form-data" class="formulario" method="post">
							<input type="text" name="titulo" placeholder="Titulo del Articulo">
							<input type="text" name="extracto" placeholder="Extracto del Articulo (Resumen)">
							<textarea name="texto" placeholder="Texto del Articulo"></textarea>
							

							<div class="custom-file p-4">
							  <input type="file" name="thumb" class="custom-file-input" id="customFileLang" lang="es">
							  <label class="custom-file-label" for="customFileLang">Seleccionar Archivo</label>
							</div>
							
							<input class="p-3" type="submit" value="Subir imagen" class="btn btn-primary">

						</form>
					</article>
				</div>
			</div>
		</div>
	</div>
