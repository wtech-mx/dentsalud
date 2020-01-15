<?php

 require 'header.php';
 ?>

 <style type="text/css" media="screen">
  .inner-intro{
     display: none;
  }
</style>

<div class="container-fluid">
    <div class="row">
        <div class="col-fluid">
        <?php if(count($images)>0):?>
        <!-- aqui insertaremos el slider -->
            <div id="pricipal-carousel" class="carousel slide" data-ride="carousel">

              <!-- Indicatodores -->
              <ol class="carousel-indicators">
              <?php $cnt=0; foreach($images as $img):?>
                <li data-target="#pricipal-carousel" data-slide-to="0" class="<?php if($cnt==0){ echo 'active'; }?>">
                </li>
              <?php $cnt++; endforeach; ?>
              </ol>
              <!-- Contenedor de las imagenes -->
          <div class="carousel-inner">
            <?php $cnt=0; foreach($images as $img):?>
            <div class="carousel-item <?php if($cnt==0){ echo 'active'; }?>">
              <div class="carousel-caption d-block text-right">
                <h4 style="color: #fff;"><?php echo $img->title; ?></h4>
                <p>
                </p>
                  <button class="botton-res btn btn-light btn-sm" data-toggle="modal" data-target="#exampleModal" type="button"><a  target="blank" href="<?php echo $img->boton; ?>" title="<?php echo $img->boton; ?>">Ver mas</a></button>
              </div>
<!--              <img class="img-fluid" src="</?php echo 'admin/'.$img->folder.$img->src; ?>" alt="">-->
              <img class="img-fluid" src="<?php echo '../../../eagoTaller/admin/'.$img->folder.$img->src; ?>" alt="<?php echo '../../../eagoTaller/admin/'.$img->folder.$img->src; ?>">
            </div>
          <?php $cnt++; endforeach; ?>

            <a href="#pricipal-carousel" class="carousel-control-prev" data-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="sr-only">Anterior</span>
            </a>  

            <a href="#pricipal-carousel" class="carousel-control-next" data-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="sr-only">Siguiente</span>
            </a>         

          </div>

            </div>
          <?php else:?>
             <h4 class="alert alert-warning">No hay imagenes</h4>
          <?php endif; ?>
        </div>
    </div>
</div>


<?php require 'footer.php'; ?>


