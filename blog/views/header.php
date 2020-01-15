<?php 
  //$servidor = Ruta::ctrRutaServidor();
  include("../modelos/rutas.php");
  $url = Ruta::ctrRuta();
  include("estilos.php");
 ?>

<!--=================================
 header -->
<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
<header id="header" class="defualt" style="background-image: url('../vistas/images/bg-header.png')"><meta http-equiv="Content-Type" content="text/html; charset=euc-jp">
  
  <div class="topbar">
    <div class="container">
      <div class="row">
        <div class="col-lg-6 col-md-12">
          <div class="topbar-left text-lg-left text-center">
             <ul class="list-inline">
              <li>

            <?php echo '<a href="'.$url.'index.php"><img id="" src="'.$url.'vistas/images/logo-light.png" alt="'.$url.'vistas/images/logo-light.png" style="width: 150px;"> </a>';?>
              </li>
               <li> <i class="fa fa-envelope-o"> </i>adiazm@eago.com.mx</li> 
               <li> <i class="fa fa-clock-o"></i>Lunes - S&aacutebado 9:00am - 18.00pm  </li>
          </ul>
          </div>
        </div>
        <div class="col-lg-6 col-md-12">
          <div class="topbar-right text-lg-right text-center">
             <ul class="list-inline">
               <li> <i class="fa fa-phone"></i>55 1006 5421</li> 
               <li><a href="https://www.facebook.com/Escuderia-AGO-107694017316744/" target="blank"><i class="fa fa-facebook"></i></a></li>   
               <li><a href="#" target="blank"><i class="fa fa-twitter"></i></a></li>   
               <li><a href="https://www.instagram.com/escuderia.ago/" target="blank"><i class="fa fa-instagram"></i></a></li>   

             </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
 
<!--=================================
 mega menu -->

<div class="menu">  
  <!-- menu start -->
   <nav id="menu" class="mega-menu">
    <!-- menu list items container -->
    <section class="menu-list-items">
     <div class="container"> 
      <div class="row"> 
       <div class="col-md-12"> 
        <!-- menu logo -->

       <ul class="menu-logo">
            <li>
            <?php 
            echo  
            '<a href="'.$url.'index.php"><img id="" src="'.$url.'vistas/images/logo-light.png" alt=""> </a>';
            ?>
            </li>
        </ul>

        <ul class="menu-links">

          <li>
            <?php 
            echo  
            '<a href="'.$url.'nosotros"> ¿Quienes Somos? </a>';
            ?>
          </li>


            <li><a href="javascript:void(0)">Pide tu servicio Aqu&iacute <i class="fa fa-angle-down fa-indicator"></i></a>

                <div class="drop-down menu-bg grid-col-12">

                    <div class="grid-row">

                        <div class="grid-col-2">
                            <ul>
                              <li>
                              <?php 
                              echo  
                              '<a href="'.$url.'mantenimiento" style="font-size: 0.9250em;color: #000">Mantenimiento</a>';
                                ?>
                              </li>                           
                              <li>
                                <a href="#">Preventivo</a>
                              </li>
                              <li><a href="#">Correctivo</a></li>
                              <li><a href="#">Llantas </a></li>
                              <li><a href="#">Otras</a></li>
                            </ul>
                        </div>

                        <div class="grid-col-2">
                            <ul>
                              <li>
                              <?php 
                              echo  
                              '<a href="'.$url.'estetica" style="font-size: 0.9250em;color: #000">Estetica</a>';
                                ?>
                              </li>
                              <li><a href="#">Interior</a></li>
                              <li><a href="#">Exterior</a></li>
                              <li><a href="#">Ambos</a></li>
                            </ul>
                        </div>

                        <div class="grid-col-2">
                            <ul>
                              <li>
                              <?php 
                              echo  
                              '<a href="'.$url.'gestoria" style="font-size: 0.9250em;color: #000">Gestor&iacutea</a>';
                                ?>
                              </li>
                              <li><a href="#">CDMX</a></li>
                              <li><a href="#">Morelos</a></li>
                              <li><a href="#">Edo Mex</a></li>
                            </ul>
                        </div>

                        <div class="grid-col-2">
                            <ul>
                              <li>
                              <?php 
                              echo  
                              '<a href="'.$url.'verificacion" style="font-size: 0.9250em;color: #000">Verificaci&oacuten</a>';
                              ?>
                              </li>                              
                              <li><a href="#">CDMX</a></li>
                              <li><a href="#">Morelos</a></li>
                              <li><a href="#">Edo Mex</a></li>
                            </ul>
                        </div>
                        <div class="grid-col-2">
                            <ul>
                            <li>
                           <?php 
                              echo  
                              '<a href="'.$url.'traslados" style="font-size: 0.9250em;color: #000">Traslados</a>';
                            ?>
                            </li>  
                              <li><a href="#">Auto</a></li>
                              <li><a href="#">Camioneta</a></li>
                              <li><a href="#">Cami&oacuten </a></li>
                              <li><a href="#">Otros</a></li>
                            </ul>
                        </div>
                        <div class="grid-col-2">
                            <ul>
                              <li><a href="https://eago.com.mx/q-subastas/?s=login" style="font-size: 0.9250em">Subastas</a></li>
                              <li><a href="https://eago.com.mx/q-subastas/?s=login"></a></li>
                            </ul>
                        </div>
                        
                    </div>
                </div>
            </li>
            <li>
             <?php 
                echo'  
              <a href="'.$url.'contacto"> Contacto </a>';
             ?>
            </li>
            <li  data-toggle="modal" data-target=".bd-example-modal-lg"><a href="#"><i class="fa fa-user"></i> Iniciar Sesi&oacuten</a>
            </li>

            <li  data-toggle="modal" data-target=".bd-example-modal-lg2"><a href="#"><i class="fa fa-pencil"></i> Registrarse</a>
            </li>

            </ul>
           </div>
          </div>
         </div>
        </section>
       </nav>

</div>

</header>

 <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
     <?php 
        include ('login.view.php');
      ?>
    </div>
  </div>
</div>

<div class="modal fade bd-example-modal-lg2" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      
     <?php 
        include("../../vistas/modulos/registro.php");
      ?>
    </div>
  </div>
</div>
<!--=================================
  Bedgrum 
================================= -->
 
 <section class="inner-intro bg-1 bg-overlay-black-70">
  <div class="container">
     <div class="row text-center intro-title">
           <div class="col-md-6 text-md-left d-inline-block">
             <h1 class="text-white">Tips y Noticias</h1>
           </div>
           <div class="col-md-6 text-md-right float-right">
             <ul class="page-breadcrumb">
                <li><a href="<?php echo $url;?>"><i class="fa fa-home"></i> Inicio</a> <i class="fa fa-angle-double-right"></i></li>
                <li class="active pagActiva"></li>
                <li class="active pagActiva"><a  href="<?php echo $url;?>blog/index.php">Tips y Noticia</a></li>
             </ul>
           </div>
     </div>
  </div>
</section>

<!--=================================
   Bedgrum 
 ================================= -->



<!--=====================================
BOTON FLOTANTE
======================================-->

<script type="text/javascript" style="">
    (function () {
        var options = {
            facebook: "107694017316744", // Facebook page ID
            whatsapp: "+52 1 55 10 06 54 21", // WhatsApp number
            email: "adiazm@eago.com.mx", // Email
            sms: "5510065421", // Sms phone number
            call: "5510065421", // Call phone number
            company_logo_url: "http://localhost/eago-pag/images/logo-light.png", // URL of company logo (png, jpg, gif)
            greeting_message: "", // Text of greeting message
            call_to_action: "Cotiza ahora", // Call to action
            wa_vb_message: "", // Message for WhatsApp
            button_color: "#00B0B6", // Color of button
            position: "left", // Position may be 'right' or 'left'
            order: "facebook,whatsapp,email,sms,call" // Order of buttons
        };
        var proto = document.location.protocol, host = "whatshelp.io", url = proto + "//static." + host;
        var s = document.createElement('script'); s.type = 'text/javascript'; s.async = true; s.src = url + '/widget-send-button/js/init.js';
        s.onload = function () { WhWidgetSendButton.init(host, proto, options); };
        var x = document.getElementsByTagName('script')[0]; x.parentNode.insertBefore(s, x);
    })();
</script>

 <!--=================================
 back to top -->

<div class="car-top">
 <span><img src="<?php echo $url; ?>vistas/images/car-eago.png" alt=""></span>
</div>


 <!--=================================
 back to top -->

   <!-- Load Facebook SDK for JavaScript -->
  <div id="fb-root"></div>
  <script>(function(d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) return;
    js = d.createElement(s); js.id = id;
    js.src = "https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v3.0";
    fjs.parentNode.insertBefore(js, fjs);
  }(document, 'script', 'facebook-jssdk'));</script>
