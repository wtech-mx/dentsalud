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
					<a href="index.php?p=<?php echo $i?>"><?php echo $i; ?></a>
				</li>
			<?php endif; ?>
		<?php endfor; ?>

		<!-- Mostramos el boton para avanzar una pagina -->
		<?php if (pagina_actual() == $numero_paginas): ?>
			<li class="disabled">&raquo;</li>
		<?php else: ?>
			<li><a href="index.php?p=<?php echo pagina_actual() + 1; ?>">&raquo;</a></li>
		<?php endif; ?>
	</ul>
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
