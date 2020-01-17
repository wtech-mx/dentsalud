<?php 
	$conexion=mysqli_connect('localhost','root','','imaginarte');
 ?>

<div class="contenedor p-5">
	<div class="row">
			<div class="col-md-12">
				<h2>Panel de Galerias</h2>
				<!--<a href="" class="btn btn-primary" style="color: #fff">Agregar Slide</a> -->
				<br>
				<br>
				<table class="table table-bordered">

				<thead>
					<th>Servicios</th>
					
					<th>Acciones</th>
					
				</thead>

			<?php 
			$sql="SELECT * from productos";
			$result=mysqli_query($conexion,$sql);
			while ($mostrar=mysqli_fetch_array($result)) {
				
			 ?>

				<tr>
				<td>
					<a href="#" class="btn btn-sm btn-primary" target="blank"><?php echo $mostrar['productos'] ?></a>
				</td>
				
				<td>
					<a class="btn btn-sm btn-success" href="<?php echo $mostrar['src'] ?>">Ver Imagenes</a>

				</td>
				</tr>
				<?php 

					}
				 ?>
				
				</table>

		</div>
	</div>
</div>