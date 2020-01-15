	<?php include 'estilos.php'; ?>

	<div class="contenedor">
		<div class="row justify-content-start ">
			<div class="col p-5">
				<div class="post">
					<article class="">
						<h2 class="titulo">Nuevo Articulo</h2>

						<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" enctype="multipart/form-data" class="formulario" method="post">
							<input type="text" name="titulo" placeholder="Titulo del Articulo">
							<input type="text" name="extracto" placeholder="Extracto del Articulo (Resumen)">
							<textarea name="texto" placeholder="Texto del Articulo"></textarea>
							

							<div class="custom-file p-4">
							  <input type="file" name="thumb" class="custom-file-input" id="customFileLang" lang="es">
							  <label class="custom-file-label" for="customFileLang">Seleccionar Archivo</label>
							</div>

							<input class="p-3" type="submit" value="Crear Articulo">

						</form>

					</article>
				</div>
			</div>
		</div>
	</div>