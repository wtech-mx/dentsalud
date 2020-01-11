<?php require 'header.php' ?>


<section class="latest-blog border masonry-main page-section-ptb" style="background-color: #fff">
 <div class="container">
  
   <div class="row">
    <div class="col-md-12">
          <form action="<?php echo $url; ?>blog/buscar.php" method="get" name="busqueda" class="buscar"> 
            <div class="sidebar-widget ">
              <h2>Buscar</h2>

              
              <div class="widget-search p-5">
                  <!--<i class="fa fa-search"></i>-->
                  <input type="search" class="form-control placeholder " name="busqueda" placeholder="Buscar....">
              </div>
                
            </div>
          </form>

       <div class="paginador p-3">
       	<h4><?php echo $titulo; ?></h4>
       </div>

     <div class="masonry columns-2">
       <div class="grid-sizer"></div>
      <?php foreach($resultados as $post): ?>
         <div class="masonry-item clearfix">
          <div class="blog-2">
          <div class="blog-image">
            <a href="single.php?id=<?php echo $post['id']; ?>">
              <img  src="../../../eagoTaller/imagenes/<?php echo $post['thumb']; ?>" class="card-img-top img-fluid p-5" alt="<?php echo RUTA; ?>/imagenes/<?php echo $post['thumb'] ?>">
            </a>
              <div class="date">
                <span><?php echo fecha($post['fecha']); ?></span>
              </div>
          </div>
            <div class="blog-content">
              <div class="blog-admin-main">
               <div class="blog-admin">
                <h4 class="font-weight-bold"><a href="single.php?id=<?php echo $post['id']; ?>"><?php echo $post['titulo'] ?></a></h4>
               </div>
               <div class="blog-meta float-right">
                 <ul>
                   <li class="share"><a href="#"> <i class="fa fa-share-alt"></i><br /> ...</a>
                    <div class="blog-social"> 
                     <ul class="list-style-none">
                      <li> <a href="#"><i class="fa fa-facebook"></i></a> </li>
                      <li> <a href="#"><i class="fa fa-twitter"></i></a> </li>
                      <li> <a href="#"><i class="fa fa-instagram"></i></a> </li>
                      <li> <a href="#"><i class="fa fa-pinterest-p"></i></a> </li>
                     </ul>
                     </div>
                   </li>
                 </ul>
               </div>
              </div>
              <div class="blog-description text-center">
                <p class="extracto"><?php echo $post['extracto'] ?></p>
                 <div class="separator"></div>
                 <span><a href="single.php?id=<?php echo $post['id']; ?>" class="continuar">Continuar Leyendo</a></span>
              </div>
            </div>
          </div>
        </div>
       <?php endforeach; ?>
     
</section>


<?php require 'footer.php'; ?>

