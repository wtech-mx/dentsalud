<?php require 'header.php'; 
define('BACKEND', 'http://eago.com.mx/eagoTaller/imagenes/'); 
?>


<section class="latest-blog border masonry-main page-section-ptb" style="background-color: #fff">
  
      <form class="form-inline p-5" action="<?php echo $url; ?>blog/buscar.php" method="get" name="busqueda" class="buscar"> 
      <div class="sidebar-widget ">
       <h2>Buscar</h2>
        
        <div class="widget-search">
            
            <input type="search" class="form-control placeholder " name="busqueda" placeholder="Buscar....">
             <button class="btn btn-outline-primary my-2 my-sm-0" type="submit">Search</button>
        </div>
          
      </div>
    </form>



     <div class="container">
          <div class="row mt-3">
          <div class="col">
            <div class="card-group">
            <?php foreach($posts as $post): ?>
            <div class="card">
                <a href="single.php?id=<?php echo $post['id']; ?>">
              <img class="card-img-top img-fluid" src=" <?php  echo BACKEND?><?php echo $post['thumb']; ?>" alt=" <?php  echo BACKEND?><?php echo $post['thumb']; ?>">
                </a>
              <div class="card-body">
                <h3 class="cart-title"><a href="single.php?id=<?php echo $post['id']; ?>"><?php echo $post['titulo'] ?></a></h3>
                <p class="text-muted"><?php echo fecha($post['fecha']); ?></p>
                <p class="card-text"><?php echo $post['extracto'] ?></p>
                
                <div class="fb-share-button" data-href="single.php?id=<?php echo $post['id']; ?>" data-layout="button" data-size="large"><a target="_blank" href="single.php?id=<?php echo $post['id']; ?>" class="fb-xfbml-parse-ignore">Compartir</a></div>
              </div>
              <div class="card-footer">
                <a class="btn btn-primary btn-lg btn-block" href="single.php?id=<?php echo $post['id']; ?>" title="">Continuar Leyendo</a>
                
              </div>
            </div>
            <?php endforeach; ?>  
            </div>
          </div>
        </div>
     </div> 

        <div class="paginador p-5">
         <?php require 'paginacion.php'; ?>
       </div>

</section>


<?php require 'footer.php'; ?>

<div id="fb-root"></div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/es_ES/sdk.js#xfbml=1&version=v5.0"></script>
<!--<section class="latest-blog border masonry-main page-section-ptb" style="background-color: #fff">
 <div class="container">
  
   <div class="row">
    <div class="col-md-12">
          <form action="<//?php echo $url; ?>blog/buscar.php" method="get" name="busqueda" class="buscar"> 
            <div class="sidebar-widget ">
             <h2>Buscar</h2>
              
              <div class="widget-search">
                  <i class="fa fa-search"></i>
                  <input type="search" class="form-control placeholder " name="busqueda" placeholder="Buscar....">
              </div>
                
            </div>
          </form>
       <div class="paginador p-5">
        
         <//?php require 'paginacion.php'; ?>
       </div>
     <div class="masonry columns-2">
       <div class="grid-sizer"></div>
       <//?php foreach($posts as $post): ?>
         <div class="masonry-item clearfix ">
          <div class="blog-2">
          <div class="blog-image">
            <a href="single.php?id=<//?php echo $post['id']; ?>">
              <img class="" src="./imagenes/<//?php echo $post['thumb']; ?>" alt="<//?php echo $post['titulo'] ?>">
            </a>
              <div class="date">
                <span><//?php echo fecha($post['fecha']); ?></span>
              </div>
          </div>
            <div class="blog-content">
              <div class="blog-admin-main">
               <div class="blog-admin">
                <h4 class="font-weight-bold"><a href="single.php?id=<//?php echo $post['id']; ?>"><//?php echo $post['titulo'] ?></a></h4>
               </div>
               <div class="blog-meta float-right">
                 <ul>
                   <li class="share"><a href="#"> <i class="fa fa-share-alt"></i><br /> ...</a>
                    <div class="blog-social"> 
                     <ul class="list-style-none">
                      <!~~ Your share button code ~~>
                      <div class="fb-share-button" 
                        data-href="https://eago.com.mx/eago-pag/blog/single.php?id=<//?php echo $post['id']; ?>" 
                        data-layout="button_count">
                      </div>
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
                <p class="extracto"><//?php echo $post['extracto'] ?></p>
                 <div class="separator"></div>
                 <span><a href="single.php?id=<//?php echo $post['id']; ?>" class="continuar">Continuar Leyendo</a></span>
              </div>
            </div>
          </div>
        </div>
       <//?php endforeach; ?>
     
</section>-->




