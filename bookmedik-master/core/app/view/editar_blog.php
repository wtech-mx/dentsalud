    <a class="btn btn-warning" data-toggle="modal" data-target="#formModal2">Editar</a>

      <!-- Form Modal -->
    <div class="modal fade" id="formModal2" tabindex="-1" role="dialog"  aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                    <link rel="stylesheet" type="text/css" href="assets/css/form.css">
                    <?php foreach($posts as $post): ?>
                        <div class="contenedor">
                            <div class="post">
                                <article>
                                    <h2 class="titulo">Editar</h2>
                                    
                                    <form action="admin/editar.php?id=<?php echo $post['id']; ?>" class="formulario" enctype="multipart/form-data" method="post">
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
                    <?php endforeach; ?>
            </div>
        </div>
    </div>
    <!-- End Form Modal -->

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