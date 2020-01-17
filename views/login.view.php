
	<link rel="stylesheet" href="css/estilos.css">
	<div class="contenedor">
		<div class="post">
			<article>
				<h2 class="titulo">Inicia Sesion</h2>
				<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" class="formulario" method="post">
					<input type="text" name="usuario" placeholder="Usuario">
					<input type="password" name="password" placeholder="Contraseña">
					<input type="submit" value="Iniciar Sesion">
				</form>
			</article>
		</div>
	</div>
