<?php 
	define('ser', 'http://localhost/dentsalud/bookmedik-master/core/app/imagenes/');
 ?>
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-WMN484X');</script>
<!-- End Google Tag Manager -->
		<!-- BASICS -->
        <meta charset="utf-8">
        <meta name="google-site-verification" content="WLJZjUy-6HqFnXUZE48KmDmjtappoFRCjbogCAfap3Q" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>DentSalud</title>
        <meta name="description" content="">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" type="text/css" href="Amoeba/css/isotope.css" media="screen" />	
		<link rel="stylesheet" href="Amoeba/js/fancybox/jquery.fancybox.css" type="text/css" media="screen" />
		<link rel="stylesheet" href="Amoeba/css/bootstrap.css">
		<link rel="stylesheet" href="Amoeba/css/bootstrap-theme.css">
        <link rel="stylesheet" href="Amoeba/css/style.css">
        <link rel="stylesheet" type="text/css" href="google7f414467e3f5a514.html">
		<!-- skin -->
		<link rel="stylesheet" href="Amoeba/skin/default.css">
		<link rel="shortcut icon" href="logoDent.ico">		
		<section id="header" class="appear"></section>

		<div class="navbar navbar-fixed-top" role="navigation" data-0="line-height:100px; height:100px; background-color:rgba(0,0,0,0.3);" data-300="line-height:60px; height:60px; background-color:rgba(0,0,0,1);">
			 <div class="container">

				<div class="navbar-header">

					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
						<span class="fa fa-bars color-white"></span>
					</button>

					<h1>
						<a class="navbar-brand" href="index.php" data-0="line-height:90px;" data-300="line-height:50px;">
						DentSalud
						</a>

					</h1>

				</div>
				<div class="navbar-collapse collapse">
					<ul class="nav navbar-nav" data-0="margin-top:20px;" data-300="margin-top:5px;">
						<li class="active"><a href="#inicio">Inicio</a></li>
						<li><a href="#section-about">¿Quienes Somos?</a></li>
						<li><a href="#section-works">Galeria</a></li>
						<li><a href="#section-contact">Contacto</a></li>
						<li><a href="bookmedik-master/index.php" target="blank">Ingresar</a></li>
					</ul>
				</div><!--/.navbar-collapse -->
			</div>
		</div>

<div class="container">
	<form class="navbar-form navbar-left"  action="<?php echo ser; ?>/buscar.php" method="get" name="busqueda" role="search" >
	  <div class="form-group">
	    <input type="text" class="form-control"  name="busqueda" placeholder="Buscar">
	  </div>
	  <button type="submit" class="btn btn-primary"style="background-color: #5e30b6;border: #5e30b6;padding: 8px">Buscar</button>
	</form>
</div>

<div class="container text-center" style="padding: 50px;">
	<div class="row p-2">
      <div class="col-lg-6 text-left" style="padding: 20px;">
        <div class="thumbnail fluid">
          <a class="fluid" href="single.php?id=<?php echo $post['id']; ?>">
          <img class="card-img-top img-fluid" src="<?php  echo ser ?><?php echo $post['thumb']; ?>" alt=" <?php  echo ser?><?php echo $post['thumb']; ?>" >
          </a>
          <div class="caption">
            <h3><a href="single.php?id=<?php echo $post['id']; ?>"><?php echo $post['titulo'] ?></a></h3>
            <p class="text-muted"><?php echo fecha($post['fecha']); ?></p>
            <p><?php echo $post['texto'] ?></p>
            <p>
            <a class="btn btn-primary btn-lg btn-block" href="index.php?p=1#blog" title="" style="background: #7a4b9b">Regresar</a>
          </div>
        </div>
      </div>
	</div>
</div>

<//?php 
	//include("./footer.php");
 ?//>