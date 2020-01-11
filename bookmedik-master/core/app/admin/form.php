
<link rel="stylesheet" type="text/css" href="../assets/plugins/bootstrap/css/bootstrap.min.css">

<div class="container">
	<div class="row">
		<div class="col-md-12">		
			<h1>Subir imagenes o archivos</h1>
			<form enctype="multipart/form-data" method="post" action="upload.php">

			  <div class="form-group">
			    <label for="exampleInputPassword1">Texto a mostrar</label>
			    <input type="text"  name="title" class="form-control"  placeholder="Texto a mostrar">
			  </div>

<!--			  <div class="form-group">
			    <label for="EnlaceBoton">Enlace del Boton</label>
			    <input type="text"  name="boton" class="form-control"  placeholder="Texto a mostrar">
			  </div>-->
			  
			  <div class="form-group">
			    <label for="exampleInputFile">Imagen</label>
			    <input type="file" name="image" required>
			  </div>

			<input type="submit" value="Subir imagen" class="btn btn-primary">
			</form>
		</div>
	</div>
</div>
