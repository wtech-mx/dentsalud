<?php 
	
	//define('RUTA', 'http://localhost/Eago-frontend/blog/imagenes/');

	//DB TRABJANDO EN LOCALHOST
	$bd_config = array(
		'basedatos' => 'DentSalud-DB1',
		'usuario' => 'root',
		'pass' => ''
	);

	$blog_config = array(
		'post_por_pagina'=> '8',
		'carpeta_imagenes' => '../../../../imagenes/'
		//'carpeta_imagenes' => 'imagenes/'
	);

	$conexion = conexion($bd_config);
	$posts = obtener_post($blog_config['post_por_pagina'], $conexion);

# Funcion para conectarnos a la base de datos.
# Return: la conexion o false si hubo un problema.
function conexion($bd_config){
	try {
	$conexion = new PDO('mysql:host=localhost;dbname='.$bd_config['basedatos'], $bd_config['usuario'], $bd_config['pass']);
	$conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

		return $conexion;

	} catch (PDOException $e) {
		return false;		
	}
}

# Funcion para limpiar y convertir datos como espacios en blanco, barras y caracteres especiales en entidades HTML.
# Return: los datos limpios y convertidos en entidades HTML.
function limpiarDatos($datos){
	// Eliminamos los espacios en blanco al inicio y final de la cadena
	$datos = trim($datos);

	// Quitamos las barras / escapandolas con comillas
	$datos = stripslashes($datos);

	// Convertimos caracteres especiales en entidades HTML (&, "", '', <, >)
	$datos = htmlspecialchars($datos);
	return $datos;
}

# Funcion para obtener un post por ID
# Return: El post, o false si no se encontro ningun post con ese ID.
function obtener_post_por_id($conexion, $id){
	$resultado = $conexion->query("SELECT * FROM articulos WHERE id = $id LIMIT 1");
	$resultado = $resultado->fetchAll();
	return ($resultado) ? $resultado : false;
}


function id_articulo($id){
	return (int)limpiarDatos($id);
}


# Funcion para obtener la pagina actual
# Return: El numero de la pagina si esta seteado, sino entonces retorna 1.
function pagina_actual(){
	return isset($_GET['p']) ? (int)$_GET['p']: 1; 
}


# Funcion para obtener los post determinando cuantos queremos traer por pagina.
# Return: Los post dependiendo de la pagina que estemos y cuantos post por pagina establecimos.
function obtener_post($post_por_pagina, $conexion){
	//1.- Obtenemos la pagina actual
	$pagina_actual = isset($_GET['p']) ? (int)$_GET['p']: 1;
	// Para reutilizar el codigo creamos una funcion que nos dice la pagina actual.

	//2.- Determinamos desde que post se mostrara en pantalla
	$inicio = (pagina_actual() > 1) ? (pagina_actual() * $post_por_pagina - $post_por_pagina) : 0;

	//3.- Preparamos nuestra consulta trayendo la informacion e indicandole desde donde y cuantas filas.
	// Ademas le pedimos que nos cuente cuantas filas tenemos.
	$sentencia = $conexion->prepare("SELECT SQL_CALC_FOUND_ROWS * FROM articulos LIMIT {$inicio}, {$post_por_pagina}");

	$sentencia->execute();
	return $sentencia->fetchAll();
}

# Funcion para calcular el numero de paginas que tendra la paginacion.
# Return: El numero de paginas
function numero_paginas($post_por_pagina, $conexion){
	//4.- Calculamos el numero de filas / articulos que nos devuelve nuestra consulta
	$total_post = $conexion->prepare('SELECT FOUND_ROWS() as total');
	$total_post->execute();
	$total_post = $total_post->fetch()['total'];

	//5. Calculamos el numero de paginas que habra en la paginacion
	$numero_paginas = ceil($total_post / $post_por_pagina);
	return $numero_paginas;
}

# Funcion para traducir la fecha de formato timestamp a español.
# Return: La fecha en español.
function fecha($fecha){
	$timestamp = strtotime($fecha);
	$meses = ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'];

	$dia = date('d', $timestamp);

	// -1 porque los meses en la funcion date empiezan desde el 1
	$mes = date('m', $timestamp) - 1;
	$year = date('Y', $timestamp);

	$fecha = $dia . ' de ' . $meses[$mes] . ' del ' . $year;
	return $fecha;
}
	
?>

<section class="main-content-wrapper">
    <section id="main-content">

		<div class="contenedor p-5">
			<h2>Panel de Control</h2>
			<!--<a href="admin/nuevo.php" class="btn btn-success p-3" style="color: #fff">Nuevo Post</a>-->

            <!-- modals -->
            <a href="index.php?view=agregar_blog" class="btn btn-default"><i class='fa fa-male'></i> Nuevo Articulo</a>
            <!-- /end modals -->

			<?php foreach($posts as $post): ?>
			<section class="post">
				<article>
					<h2 class="titulo"><?php echo $post['id'] . '.- ' . $post['titulo']; ?></h2>
					<a type="button" class="btn btn-warning" href="../admin/editar.php?id=<?php echo $post['id']; ?>" style="color: #000">Editar</a>
					<a type="button" class="btn btn-primary" target="blank" href="../../../../blog/single.php?id=<?php echo $post['id']; ?>">Ver</a>
					<a type="button" class="btn btn-danger" href="../admin/borrar.php?id=<?php echo $post['id']; ?>" style="color: #fff">Borrar</a>
				</article>
			</section>
			<?php endforeach; ?>

		</div>

			<section class="paginacion">
				<ul>
					<?php 
						# Establecemos el numero de paginas
						$numero_paginas = numero_paginas($blog_config['post_por_pagina'], $conexion);
					?>
					<!-- Mostramos el boton para retroceder una pagina -->
					<?php if (pagina_actual() === 1): ?>
						<li class="disabled">&laquo;</li>
					<?php else: ?>
						<li><a href="index.php?p=<?php echo pagina_actual() - 1?>">&laquo;</a></li>
					<?php endif; ?>

					<!-- Creamos un elemento li por cada pagina que tengamos -->
					<?php for ($i = 1; $i <= $numero_paginas; $i++): ?>
						<!-- Agregamos la clase active en la pagina actual -->
						<?php if (pagina_actual() === $i): ?>
							<li class="active">
								<?php echo $i; ?>
							</li>
						<?php else: ?>
							<li>
								<a href="?view=blog<?php echo $i?>"><?php echo $i; ?></a>
							</li>
						<?php endif; ?>
					<?php endfor; ?>

					<!-- Mostramos el boton para avanzar una pagina -->
					<?php if (pagina_actual() == $numero_paginas): ?>
						<li class="disabled">&raquo;</li>
					<?php else: ?>
						<li><a href="?view=blog<?php echo pagina_actual() + 1; ?>">&raquo;</a></li>
					<?php endif; ?>
				</ul>
			</section>	


	</section>
</section>

    <style type="text/css" media="screen">
    /* --- Paginacion --- */

.paginacion {
    margin-bottom: 30px;
}

.paginacion ul {
    list-style: none;
    text-align: center;
}

.paginacion ul li {
    display: inline-block;
    margin:0 5px;
    color:#fff;
}

.paginacion ul li a {
    display: block;
    padding:10px 20px;
    background: #595959;
    color:#fff;
}

.paginacion ul li a:hover {
    background: #051240;
    text-decoration: none;
}

.paginacion ul .active {
    background: #051240;
    padding:10px 20px;
}

.paginacion ul .disabled{
    background: #a8a8a8;
    padding:10px 20px;
    cursor: not-allowed;
}

.paginacion ul .disabled:hover {
    background: #a8a8a8;
}

.white{
    color: #fff;
}
</style>
