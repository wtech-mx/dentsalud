<?php require 'header.php' ?>

<section class="blog blog-single page-section-ptb p-5"  style="background-color: #fff">
  <div class="container">
    <div class="row mt-3">
      <div class="col">
        <div class="card">
          <div class="card-body">
            <h1 class="cart-title p-3"><?php echo $post['titulo'] ?></h1>
            <p class="card-subtitle text-muted mb-2 p-3"><?php echo fecha($post['fecha']); ?></p>
            <p class="card-text p-3"><?php echo $post['texto'] ?></p> 
           <img  src="../../../eagoTaller/imagenes/<?php echo $post['thumb']; ?>" class="card-img-top img-fluid p-5" alt="<?php echo RUTA; ?>/imagenes/<?php echo $post['thumb'] ?>">           
          </div>
        </div>
      </div>

    </div>
    <a class="btn btn-primary " href="<?php echo $url;?>blog/index.php" title="">Regresar</a>
   </div>
</section>

<?php require 'footer.php'; ?>

