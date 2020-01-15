  <div class="contenedor">
    <div class="post">
      <article>
        <h2 class="titulo">Editar</h2>
        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" class="formulario" enctype="multipart/form-data" method="post">
          <input type="hidden" name="id" value="<?php echo $post['id']; ?>">
          <input type="text" name="titulo" value="<?php echo $post['titulo'] ?>">
          <input type="text" name="extracto" value="<?php echo $post['extracto']; ?>">
          <textarea name="texto"><?php echo $post['texto']; ?></textarea>
          <input type="file" name="thumb">
          <input type="hidden" name="thumb-guardada" value="<?php echo $post['thumb']; ?>">

          <input type="submit" value="Guardar Datos">
        </form>
      </article>
    </div>
  </div>

  <style type="text/css" media="screen">
    /* --- Formularios --- */
.formulario {
  width: 100%;
  overflow: hidden;
}

.formulario input[type="text"],
.formulario input[type="email"],
.formulario input[type="password"],
.formulario textarea {
  border: 1px solid #A8A8A8;
  border-radius: 2px;
  padding: 16px;
  width: 100%;
  display: block;
  margin-bottom:20px;
  font-family:Arial, sans-serif, helvetica;
  font-size: 1em;
  color:#141938;
}

.formulario input[type="text"]:focus,
.formulario input[type="email"]:focus,
.formulario input[type="password"]:focus,
.formulario textarea:focus {
  border: 2px solid #595959;
  padding: 15px;
}

.formulario textarea {
  max-width: 100%;
  min-width: 100%;
  min-height: 300px;
}

.formulario input[type="submit"]{
  padding: 15px;
  background: #595959;
  color:#fff;
  font-size: 1em;
  font-family: Arial, sans-serif, helvetica;
  border-radius: 2px;
  border:none;
  float: right;
  cursor: pointer;
}

.formulario input[type="submit"]:hover{
  background: #051240;
}
  </style>