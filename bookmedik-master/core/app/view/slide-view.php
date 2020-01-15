<?php 
	// Parametros a configurar para la conexion de la base de datos 
  $host = "localhost";    // sera el valor de nuestra BD 
  $basededatos = "DentSalud-DB1";    // sera el valor de nuestra BD 
  $usuariodb = "root";    // sera el valor de nuestra BD 
  $clavedb = "";    // sera el valor de nuestra BD 
  //Lista de Tablas
  $tabla_db1 = "slide";      // tabla de usuarios
  error_reporting(0); //No me muestra errores
  $conexion = new mysqli($host,$usuariodb,$clavedb,$basededatos);


function con(){
	return new mysqli("localhost","root","","DentSalud-DB1");
}

function insert_img($title, $folder, $image){
	$con = con();
	$con->query("insert into slide (title, boton, folder,src,created_at) value (\"$title\",\"$boton\",\"$folder\",\"$image\",NOW())");
	$con->query("insert into slide (boton) values (\"$boton\",NOW())");
}

function get_imgs(){
	$images = array();
	$con = con();
	$query=$con->query("select * from slide order by created_at desc");
	while($r=$query->fetch_object()){
		$images[] = $r;
	}
	return $images;
}

function get_img($id){
	$image = null;
	$con = con();
	$query=$con->query("select * from slide where id=$id");
	while($r=$query->fetch_object()){
		$image = $r;
	}
	return $image;
}

function del($id){
	$con = con();
	$con->query("delete from slide where id=$id");
}

	$images = get_imgs();
 ?>

 <section class="main-content-wrapper">
    <section id="main-content">
		<div class="contenedor p-5">
			<div class="row">
					<div class="col-md-12">
						<h1>Imagenes</h1>
						<!--<a href="admin/form.php" class="btn btn-primary" style="color: #fff">Agregar Slide</a> -->

                    <!-- modals -->
                       <a href="index.php?view=agregar_slide" class="btn btn-default"><i class='fa fa-male'></i> Nuevo Articulo</a>
                    <!-- /end modals -->


						<br>
						<br>
						<?php if(count($images)>0):?>

						<table class="table table-bordered">
							<thead>
								<th>Imagen</th>
								<th>Texto a mostrar</th>
								<th>Enlace del Boton</th>
								<th>Acciones</th>
										
							</thead>
							<?php foreach($images as $img):?>
							<tr>
								<td>
								<img class="img-fluid" src="../admin/<?php echo $img->folder.$img->src; ?>" style="width:240px;" alt="admin/<?php echo $img->folder.$img->src; ?>">
							</td>
							<td><?php echo $img->title; ?></td>
							<td><?php echo $img->boton; ?></td>
							<td>
							<a class="btn btn-primary btn-sm" href="../admin/download.php?id=<?php echo $img->id; ?>">Descarga</a>
							<a class="btn btn-danger btn-sm" href="../admin/delete.php?id=<?php echo $img->id; ?>" style="color: #fff;">Eliminar</a>

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

	</section>
</section>