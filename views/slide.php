<!--<div class="contenedor p-5">
	<div class="row">
			<div class="col-md-12">
				<h1>Imagenes</h1>
				<a href="./form.php" class="btn btn-default">Agregar Imagen</a> 
				<br>
				<br>
				

				<table class="table table-bordered">
							<thead>
								<th>Imagen</th>
								<th>Titulo </th>
								<th>Texto a mostrar</th>
								<th>Acciones</th>
							</thead>

				<tr>
				<td><img src="" style="width:240px;"></td>
				<td></td>
				<td></td>
				<td>
					<a class="btn btn-success btn-sm" href="./download.php?id=">Descarga</a>
					<a class="btn btn-danger btn-sm" href="./delete.php?id=">Eliminar</a>
					<a class="btn btn-warning btn-sm" href="" title="">Editar</a>
				</td>
				</tr>
				</table>

				<h4 class="alert alert-warning">No hay imagenes!</h4>
				
		</div>
	</div>
</div>-->

<?php 
include "../admin/db.php";
$images = get_imgs();
 ?>
<div class="contenedor p-5">
	<div class="row">
			<div class="col-md-12">
				<h1>Imagenes</h1>
				<a href="../admin/form.php" class="btn btn-primary" style="color: #fff">Agregar Slide</a> 
				<br>
				<br>
				<?php if(count($images)>0):?>

				<table class="table table-bordered">
							<thead>
								<th>Imagen</th>
								<th>Texto a mostrar</th>
								<th>Acciones</th>
								
							</thead>
					<?php foreach($images as $img):?>
				<tr>
				<td><img src="<?php echo $img->folder.$img->src; ?>" style="width:240px;"></td>
				<td><?php echo $img->title; ?></td>
				<td>
					<a class="btn btn-sm btn-success" href="../admin/download.php?id=<?php echo $img->id; ?>">Descarga</a>
					<a class="btn btn-sm btn-danger" href="../admin/delete.php?id=<?php echo $img->id; ?>">Eliminar</a>

				</td>
				</tr>
				<?php endforeach;?>
				</table>

				<?php else:?>
					<h4 class="alert alert-warning">No hay imagenes!</h4>
				<?php endif; ?>
		</div>
	</div>
</div>