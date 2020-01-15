<?php 
  //$servidor = Ruta::ctrRutaServidor();
  $urlServidor;
 ?>

<!--=================================
 login-form  -->

<section class="login-form page-section-ptb">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
         <div class="section-title">
           <span></span>
           <h2>Iniciar Sesión</h2>
           <div class="separator"></div>
         </div>
      </div>
    </div>

      <form class="form-horizontal" role="form" method="post" action="<?php echo $urlServidor; ?>view/resources/login.php">

       <div class="row justify-content-center">
        <div class="col-lg-6 col-md-12">
         <div class="gray-form clearfix">

           <div class="form-group">
               <label for="name">Usuario* </label>
               <input id="name" class="form-control" type="text" placeholder="User name" name="email" id="email" autofocus>
           </div>

           <div class="form-group">
               <label for="Password">Contraseña* </label>
               <input id="password" class="form-control" type="password" placeholder="Password" name="password">
           </div> 

           <div class="form-group">
                <div class="remember-checkbox mb-4">
                   <input type="checkbox" name="one" id="one">
                   <label for="one"> Recordar</label>
                   <a href="#" class="float-right">Olvide contraseña?</a>
                </div>
           </div>

           
           <button class="btn btn-primary btn-block red"name="token"  type="submit">Acceder</button>


            </div> 
          </div>
         </div>
        </form>         
      </div>
</section>

<!--=================================
 login-form  -->

 <!--        <div class="login-social text-center">
            <h5>Inisiar Sesion con </h5>
            <ul>
                <li><a class="fb button" href="#"><i class="fa fa-facebook"></i> Facebook</a></li>
                <li><a class="twitter button" href="#"><i class="fa fa-twitter"></i> Twitter</a></li>
                <li><a class="pinterest button" href="#"><i class="fa fa-google-plus"></i> google+</a></li>
            </ul>
          </div>  -->