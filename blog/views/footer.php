<footer class="footer bg-overlay-black-90" style="background-image: url('<?php echo $url; ?>vistas/images/bg-header.png');">
  <div class="container">
    <div class="row">
     <div class="col-md-12">
      <div class="social">
        <ul>
          <li style="color: #fff;"><a class="facebook" href="https://www.facebook.com/Escuderia-AGO-107694017316744/" target="blank">facebook <i class="fa fa-facebook"style="color: #fff;"></i> </a></li>
          <li style="color: #fff;"><a class="twitter" href="#" target="blank">twitter <i class="fa fa-twitter"style="color: #fff;"></i> </a></li>
          <li style="color: #fff;"><a class="pinterest" href="https://www.instagram.com/escuderia.ago/" target="blank" style="color: #fff;">instagram <i class="fa fa-instagram" style="color: #fff;"></i> </a></li>
        </ul>
       </div>
      </div>
    </div>
    <div class="row">
      <div class="col-lg-3 col-md-6">
        <div class="about-content">
          <img class="img-fluid" id="logo-footer" src="<?php echo $url; ?>vistas/images/logo-light.png" alt="">
          <p style="color: #fff;">Es una empresa integrada por un equipo de profesionales con más de 20 años de experiencia en el ramo automotriz, enfocando esfuerzos en la administración de flotillas, gestoría, mecánica y estética automotriz y subastas electrónicas.</p>
        </div>
        <div class="address">
          <ul>
<!--            <li> <i class="fa fa-map-marker"></i><span>220E Front St. Burlington NC 27215</span> </li>-->
            <li> <i class="fa fa-phone"></i><span>55 1006 5421</span> </li>
            <li> <i class="fa fa-envelope-o"></i><span>adiazm@eago.com.mx </span> </li>
          </ul>
        </div>
      </div>
      <div class="col-lg-3 col-md-6">
        <div class="usefull-link">
        <h6 class="text-white">Servicios</h6>
          <ul>
             <?php echo '<li><a href="'.$url.'"><i class="fa fa-angle-double-right"></i> Administración de Flotillas</a></li>';?>
             <?php echo '<li><a href="'.$url.'gestoria"><i class="fa fa-angle-double-right"></i> Gestoría</a></li>';?>
             <?php echo '<li><a href="'.$url.'mantenimiento"><i class="fa fa-angle-double-right"></i> Mantenimiento</a></li>';?>
             <?php echo '<li><a href="'.$url.'estetica"><i class="fa fa-angle-double-right"></i> Estética</a></li>';?>
             <?php echo '<li><a href="'.$url.'verificacion"><i class="fa fa-angle-double-right"></i> Verificacion</a></li>';?>
             <?php echo '<li><a href="'.$url.'Noticias-y-tips"><i class="fa fa-angle-double-right"></i> Tips</a></li>';?>
             <?php echo '<li><a href="'.$url.'"><i class="fa fa-angle-double-right"></i> Subastas Electrónica</a></li>';?>
          </ul>
        </div> 
      </div>

      <div class="col-lg-3 col-md-6">
        <div class="news-letter">
        <h6 class="text-white" style="color: #fff;">Suscribete</h6>
         <p style="color: #fff;">Suscribete y recibe noticas y tips de mecánica mensualmente</p>
         <form class="news-letter">
           <input type="email" placeholder="Ingrese su correo" class="form-control placeholder">
           <a class="button red" href="#">Suscribete</a>
         </form>
        </div> 
      </div>
    </div>
    <hr />
    <div class="copyright">
     <div class="row">
      <div class="col-lg-6 col-md-12">
       <div class="text-lg-left text-center">
        <p style="color: #fff;">©Copyright 2019 Power BY <a href="" target="_blank">Web Tech</a></p>
       </div>
      </div>
      <div class="col-lg-6 col-md-12">
        <ul class="list-inline text-lg-right text-center">
          <?php 
                echo'<li style="color: #fff;"><a href="'.$url.'terminos-y-condiciones"style="color: #fff;">Términos y condiciones </a> |</li> 
          <li style="color: #fff;"><a href="'.$url.'aviso-de-privacidad"style="color: #fff;">Aviso de privacidad </a> |</li>';
             ?>
        </ul>
      </div>
     </div>
    </div>
  </div>
</footer>

