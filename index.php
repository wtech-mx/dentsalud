<?php 
	
	define('RUTA', 'http://localhost/dentsalud/bookmedik-master/core/app/imagenes/');

	//DB TRABJANDO EN LOCALHOST
	$bd_config = array(
		'basedatos' => 'dentsalud-db',
		'usuario' => 'root',
		'pass' => ''
	);

	$blog_config = array(
		'post_por_pagina'=> '3',
		'carpeta_imagenes' => 'imagenes/'
	);

	$conexion = conexion($bd_config);
	$posts = obtener_post($blog_config['post_por_pagina'], $conexion);

# Funcion para conectarnos a la base de datos.
# Return: la conexion o false si hubo un problema.
function conexion($bd_config){
	try {
	$conexion = new PDO('mysql:host=localhost;dbname='.$bd_config['basedatos'], $bd_config['usuario'], $bd_config['pass']);
	$conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

		return $conexion;

	} catch (PDOException $e) {
		return false;		
	}
}

# Funcion para limpiar y convertir datos como espacios en blanco, barras y caracteres especiales en entidades HTML.
# Return: los datos limpios y convertidos en entidades HTML.
function limpiarDatos($datos){
	// Eliminamos los espacios en blanco al inicio y final de la cadena
	$datos = trim($datos);

	// Quitamos las barras / escapandolas con comillas
	$datos = stripslashes($datos);

	// Convertimos caracteres especiales en entidades HTML (&, "", '', <, >)
	$datos = htmlspecialchars($datos);
	return $datos;
}

# Funcion para obtener un post por ID
# Return: El post, o false si no se encontro ningun post con ese ID.
function obtener_post_por_id($conexion, $id){
	$resultado = $conexion->query("SELECT * FROM articulos WHERE id = $id LIMIT 1");
	$resultado = $resultado->fetchAll();
	return ($resultado) ? $resultado : false;
}


function id_articulo($id){
	return (int)limpiarDatos($id);
}


# Funcion para obtener la pagina actual
# Return: El numero de la pagina si esta seteado, sino entonces retorna 1.
function pagina_actual(){
	return isset($_GET['p']) ? (int)$_GET['p']: 1; 
}


# Funcion para obtener los post determinando cuantos queremos traer por pagina.
# Return: Los post dependiendo de la pagina que estemos y cuantos post por pagina establecimos.
function obtener_post($post_por_pagina, $conexion){
	//1.- Obtenemos la pagina actual
	$pagina_actual = isset($_GET['p']) ? (int)$_GET['p']: 1;
	// Para reutilizar el codigo creamos una funcion que nos dice la pagina actual.

	//2.- Determinamos desde que post se mostrara en pantalla
	$inicio = (pagina_actual() > 1) ? (pagina_actual() * $post_por_pagina - $post_por_pagina) : 0;

	//3.- Preparamos nuestra consulta trayendo la informacion e indicandole desde donde y cuantas filas.
	// Ademas le pedimos que nos cuente cuantas filas tenemos.
	$sentencia = $conexion->prepare("SELECT SQL_CALC_FOUND_ROWS * FROM articulos LIMIT {$inicio}, {$post_por_pagina}");

	$sentencia->execute();
	return $sentencia->fetchAll();
}

# Funcion para calcular el numero de paginas que tendra la paginacion.
# Return: El numero de paginas
function numero_paginas($post_por_pagina, $conexion){
	//4.- Calculamos el numero de filas / articulos que nos devuelve nuestra consulta
	$total_post = $conexion->prepare('SELECT FOUND_ROWS() as total');
	$total_post->execute();
	$total_post = $total_post->fetch()['total'];

	//5. Calculamos el numero de paginas que habra en la paginacion
	$numero_paginas = ceil($total_post / $post_por_pagina);
	return $numero_paginas;
}

# Funcion para traducir la fecha de formato timestamp a español.
# Return: La fecha en español.
function fecha($fecha){
	$timestamp = strtotime($fecha);
	$meses = ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'];

	$dia = date('d', $timestamp);

	// -1 porque los meses en la funcion date empiezan desde el 1
	$mes = date('m', $timestamp) - 1;
	$year = date('Y', $timestamp);

	$fecha = $dia . ' de ' . $meses[$mes] . ' del ' . $year;
	return $fecha;
}
	
?>
<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
<!-- Google Tag Manager -->
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

		<!-- SEO <-->
	
		<meta name="author" content="DentSalud" />
		<meta name="generator" content="www.dent-salud.com.mx" />
		<meta name="description" content="Dentistas expertos en salud bucal" />
		<meta property="og:description" content="Dentistas de la ciudad de Mexico ,en la zona de Santafe.
		En la clínica dental DentSalud, estamos dedicados a conseguir su mejor sonrisa, así mismo cuidando la salud de su bolsillo. Por eso nos dedicamos a ofrecer la máxima calidad en nuestros tratamientos dentales; además adoptamos la calidad y trato como un compromiso otorgándole una gran experiencia.">
		<meta property="og:locale" content="es" />
		<meta property="og:url" content="https://www.w-tech.com.mx/" />
		<meta property="og:type" content="website" />
		<meta property="og:title" content="Expertos en Salud bucal" />
		<meta property="og:site_name" content="Dentistas en la Ciudad de Mexico" />
		<meta property="og:description" content="En la clínica dental DentSalud, estamos dedicados a conseguir su mejor sonrisa, así mismo cuidando la salud de su bolsillo. Por eso nos dedicamos a ofrecer la máxima calidad en nuestros tratamientos dentales; además adoptamos la calidad y trato como un compromiso otorgándole una gran experiencia." />
		<meta property="og:image" content="Amoeba/Bell/img/logoDent.png" />
		<meta property="og:image:type" content="Bell/img/DentSalud.png">
		<meta property="og:image:width" content="1200" />
		<meta property="og:image:height" content="630" />
		<meta property="og:image:alt" content="Logotipo de DentSalud" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<link rel="alternate" hreflang="es-mx" href="alternateURL">

		<HTML LANG="Spanish">
		<meta http-equiv="Content-Type" content="text/html; ISO-8859-1">
		<META NAME="DC.Language" SCHEME="RFC1766" CONTENT="Spanish">
		<META NAME="AUTHOR" CONTENT="Josue Ramirez">
		<META NAME="REPLY-TO" CONTENT="adrian@w-tech.com.mx">
		<LINK REV="made" href="mailto:adrian@w-tech.com.mx">
		<META NAME="DESCRIPTION" CONTENT="En la clínica dental DentSalud, estamos dedicados a conseguir su mejor sonrisa, así mismo cuidando la salud de su bolsillo. Por eso nos dedicamos a ofrecer la máxima calidad en nuestros tratamientos.">
		<META NAME="KEYWORDS" CONTENT="Dentista,Ciudad de México,Santa Fe,México,Tratamientos,Tratamientos,Expertos en salud dental,Odontología,Estética 		dental,Ortodoncia,Cirugía Maxilofacial,Implantes Dentales,Endodoncia,Odontopediatria,Odontología preventiva">
		<META NAME="Resource-type" CONTENT="Index">
		<META NAME="DateCreated" CONTENT="Mon, 14 May 2018 00:00:00 GMT">
		<META NAME="Revisit-after" CONTENT="30 days">
		<META NAME="robots" content="ALL">
		<!-- Facebook Pixel Code -->
<script>
  !function(f,b,e,v,n,t,s)
  {if(f.fbq)return;n=f.fbq=function(){n.callMethod?
  n.callMethod.apply(n,arguments):n.queue.push(arguments)};
  if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
  n.queue=[];t=b.createElement(e);t.async=!0;
  t.src=v;s=b.getElementsByTagName(e)[0];
  s.parentNode.insertBefore(t,s)}(window, document,'script',
  'https://connect.facebook.net/en_US/fbevents.js');
  fbq('init', '1375270665941549');
  fbq('track', 'PageView');
</script>
<noscript><img height="1" width="1" style="display:none"
  src="https://www.facebook.com/tr?id=1375270665941549&ev=PageView&noscript=1"
/></noscript>

<!-- End Facebook Pixel Code -->
    </head>
	 <script>
  fbq('track', 'Lead');
</script>
<script>
  fbq('track', 'Search');
</script>
    <body>
<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-WMN484X"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->

<!-- Load Facebook SDK for JavaScript -->
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = 'https://connect.facebook.net/es_LA/sdk/xfbml.customerchat.js#xfbml=1&version=v2.12&autoLogAppEvents=1';
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

<!-- Your customer chat code -->
<div class="fb-customerchat"
  attribution=install_email
  page_id="648475778588289"
  theme_color="#ff5ca1"
  logged_in_greeting="¡Bienvenido a Dentsalud! ¿En qué te podemos ayudar?"
  logged_out_greeting="¡Bienvenido a Dentsalud! ¿En qué te podemos ayudar?">
</div>

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

		<section class="featured">
			<div class="container" id="inicio"> 
				<div class="row mar-bot40">
					<div class="col-md-6 col-md-offset-3">
						
						<div class="align-center">
							<i class=""><img class="iconot" src="Amoeba/img/logoDent.png" alt=""></i>
							<h2 class="slogan">Bienvenido a DentSalud</h2>
							<p class="tn">
							En la clínica dental DentSalud, estamos dedicados a conseguir su mejor sonrisa, así mismo cuidando la salud de su bolsillo. Por eso nos dedicamos a ofrecer la máxima calidad en nuestros tratamientos dentales; además adoptamos la calidad y trato como un compromiso otorgándole una gran experiencia.
				
							</p>	
						</div>
					</div>
				</div>
			</div>
		</section>
		
		<!-- services -->
		<section id="section-services" class="section pad-bot30 bg-white">
		<div class="container"> 
		
			<div class="row mar-bot40">
				<div class="col-lg-4" >
					<div class="align-center">
						<i class=""><img class="iconot" src="Amoeba/img/Tratamientos/D9.png" alt=""></i>
						<h4 class="text-bold">Odontología</h4>
						<p>La odontología se encarga del diagnóstico, tratamiento y prevención de las enfermedades del aparato estomatognático.
						</p>
					</div>
				</div>
					
				<div class="col-lg-4" >
					<div class="align-center">
						<i class=""><img class="iconot" src="Amoeba/img/Tratamientos/D3.png" alt=""></i>
						<h4 class="text-bold">Estética dental</h4>
						<p>Es una especialidad de la odontología que soluciona problemas relacionados con la salud bucal y la armonía estética de la boca en su totalidad.
						</p>
					</div>
				</div>
			
				<div class="col-lg-4" >
					<div class="align-center">
						<i class=""><img class="iconot" src="Amoeba/img/Tratamientos/D6.png" alt=""></i>
						<h4 class="text-bold">Ortodoncia</h4>
						<p>Se encarga del estudio,diagnóstico y tratamiento de las anomalías de forma,posición,relación y función de las estructuras dentomaxilofaciales.
						</p>
					</div>
				</div>
				<div class="col-lg-4" >
					<div class="align-center">
						<i class=""><img class="iconot" src="Amoeba/img/Tratamientos/D12.png" alt=""></i>
						<h4 class="text-bold">Cirugía Maxilofacial</h4>
						<p>Es una especialidad quirúrgica que incluye el diagnóstico, cirugía, aspectos estéticos de la boca, dientes, cara, cabeza y cuello.
						</p>
					</div>
				</div>
				<div class="col-lg-4" >
					<div class="align-center">
						<i class=""><img class="iconot" src="Amoeba/img/Tratamientos/D7.png" alt=""></i>
						<h4 class="text-bold">Implantes Dentales</h4>
						<p>El implante dental es un producto sanitario diseñado para sustituir la raíz que falta y mantener el diente artificial en su sitio.
						</p>
					</div>
				</div>
			
				<div class="col-lg-4" >
					<div class="align-center">
						<i class=""><img class="iconot" src="Amoeba/img/Tratamientos/D11.png" alt=""></i>
						<h4 class="text-bold">Endodoncia</h4>
						<p>Consiste en la extirpación de la pulpa dental y el posterior relleno y sellado de la cavidad pulpar con un material inerte.
						</p>
					</div>
				</div>
				<div class="col-lg-4" >
					<div class="align-center">
						<i class=""><img class="iconot" src="Amoeba/img/Tratamientos/D13.png" alt=""></i>
						<h4 class="text-bold">Odontopediatria</h4>
						<p>La odontopediatría es la rama de la odontología encargada de tratar a los niños.
						</p>
					</div>
				</div>
				<div class="col-lg-4" >
					<div class="align-center">
						<i class=""></i>
						<h4 class="text-bold"> </h4>
						<p>
						</p>
					</div>
				</div>
				<div class="col-lg-4" >
					<div class="align-center">
						<i class=""><img class="iconot" src="Amoeba/img/Tratamientos/D10.png" alt=""></i>
						<h4 class="text-bold">Odontología preventiva</h4>
						<p>El profesional de la odontología preventiva, normalmente higienistas dentales, estudiará la posibilidad de aplicar fluoruros.
						</p>
					</div>
				</div>
			
			</div>	

		</div>
		</section>


<?php 

	include("views/index.view.php");

 ?>
			
		<!-- about -->
		<section id="section-about" class="section appear clearfix">
		<div class="container">

				<div class="row mar-bot40">
					<div class="col-md-offset-3 col-md-6">
						<div class="section-header">
							<h2 class="section-heading animated" data-animation="bounceInUp">Nuestro equipo</h2>
							<p>Expertos en salud dental</p>
						</div>
					</div>
				</div>

					<div class="row align-center mar-bot40">
						<div class="col-md-3">
							<div class="team-member">
								<figure class="member-photo"><img class="iconot" src="Amoeba/img/team/iCONUSE.png" alt="" /></figure>
								<div class="team-detail">
									<h4>Julia Olivares</h4>
									<span>Endodoncia</span>
								</div>
							</div>
						</div>
						<div class="col-md-3">
							<div class="team-member">
								<figure class="member-photo"><img class="iconot" src="Amoeba/img/team/iCONUSE.png" alt="" /></figure>
								<div class="team-detail">
									<h4>Jezabel Leyva</h4>
									<span>Odontología general</span>
								</div>
							</div>
						</div>
						<div class="col-md-3">
							<div class="team-member">
								<figure class="member-photo"><img class="iconot" src="Amoeba/img/team/iCONUSE.png" alt="" /></figure>
								<div class="team-detail">
								<h4>Arely Ramírez</h4>
									<span>Odontología general</span>
								</div>
							</div>
						</div>
						<div class="col-md-3">
							<div class="team-member">
								<figure class="member-photo"><img class="iconot" src="Amoeba/img/team/iCONUSE.png" alt="" /></figure>
								<div class="team-detail">
								<h4>Eduardo Reyes</h4>
									<span>Ortodoncia</span>
								</div>
							</div>
						</div>
								<div class="col-md-3">
							<div class="team-member">
								<figure class="member-photo"><img class="iconot" src="Amoeba/img/team/iCONUSE.png" alt="" /></figure>
								<div class="team-detail">
									<h4>Carlos Acosta</h4>
									<span>Cirugía Maxilofacial</span>
								</div>
							</div>
						</div>
						<div class="col-md-3">
							<div class="team-member">
								<figure class="member-photo"><img class="iconot" src="Amoeba/img/team/iCONUSE.png" alt="" /></figure>
								<div class="team-detail">
								<h4>Mariana Rentería</h4>
									<span>Odontopediatría</span>
								</div>
							</div>
						</div>
						<div class="col-md-3">
							<div class="team-member">
								<figure class="member-photo"><img class="iconot" src="Amoeba/img/team/iCONUSE.png" alt="" /></figure>
								<div class="team-detail">
								<h4>Virginia Jaramillo</h4>
									<span>Asistente</span>
								</div>
							</div>
						</div>
					</div>
						
		</div>
		</section>
		<!-- /about -->
		
		<!-- spacer section:stats -->
		<section id="parallax1" class="section pad-top40 pad-bot40" data-stellar-background-ratio="0.5">
			<div class="container">
            <div class="align-center pad-top40 pad-bot40">
                <blockquote class="bigquote color-white">Expertos en Salud dental</blockquote>
				<p class="color-white">Agenda tu cita hoy mismo</p>
            </div>
			</div>	
		</section>
		
		<!-- section works -->
		<section id="section-works" class="section appear clearfix">
			<div class="container">
				
				<div class="row mar-bot40">
					<div class="col-md-offset-3 col-md-6">
						<div class="section-header">
							<h2 class="section-heading animated" data-animation="bounceInUp">Nuestras instalaciones</h2>
							<p></p>
						</div>
					</div>
				</div>
					
                        <div class="row">
                          <nav id="filter" class="col-md-12 text-center">
                            <ul>
                              <li><a href="#" class="current btn-theme btn-small" data-filter="*">Todo</a></li>
                              <li><a href="#"  class="btn-theme btn-small" data-filter=".webdesign" >Sala de espera</a></li>
                              <li><a href="#"  class="btn-theme btn-small" data-filter=".photography">Interior</a></li>
                              <li ><a href="#" class="btn-theme btn-small" data-filter=".print">Exterior</a></li>
                            </ul>
                          </nav>
                          <div class="col-md-12">
                            <div class="row">
                              <div class="portfolio-items isotopeWrapper clearfix" id="3">
							  
                                <article class="col-md-4 isotopeItem webdesign">
									<div class="portfolio-item">
										<img src="Amoeba/img/Despacho/1.jpg" alt="" />
										 <div class="portfolio-desc align-center">
											<div class="folio-info">
												<h5><a href="#">DentSalud</a></h5>
												<a href="Amoeba/img/Despacho/1.jpg" class="fancybox"><i class="fa fa-plus fa-2x"></i></a>
											 </div>										   
										 </div>
									</div>
                                </article>

                                <article class="col-md-4 isotopeItem photography">
									<div class="portfolio-item">
										<img src="Amoeba/img/Despacho/2.jpg" alt="" />
										 <div class="portfolio-desc align-center">
											<div class="folio-info">
												<h5><a href="#">DentSalud</a></h5>
												<a href="Amoeba/img/Despacho/2.jpg" class="fancybox"><i class="fa fa-plus fa-2x"></i></a>
											 </div>										   
										 </div>
									</div>
                                </article>
								

                                <article class="col-md-4 isotopeItem photography">
									<div class="portfolio-item">
										<img src="Amoeba/img/Despacho/3.jpg" alt="" />
										 <div class="portfolio-desc align-center">
											<div class="folio-info">
												<h5><a href="#">DentSalud</a></h5>
												<a href="img/Despacho/3.jpg" class="fancybox"><i class="fa fa-plus fa-2x"></i></a>
											 </div>										   
										 </div>
									</div>
                                </article>

                                <article class="col-md-4 isotopeItem ">
									<div class="portfolio-item">
										<img src="Amoeba/img/Despacho/4.jpg" alt="" />
										 <div class="portfolio-desc align-center">
											<div class="folio-info">
												<h5><a href="#">DentSalud</a></h5>
												<a href="Amoeba/img/Despacho/4.jpg" class="fancybox"><i class="fa fa-plus fa-2x"></i></a>
											 </div>										   
										 </div>
									</div>
                                </article>

                                <article class="col-md-4 isotopeItem photography">
									<div class="portfolio-item">
										<img src="Amoeba/img/Despacho/5.jpg" alt="" />
										 <div class="portfolio-desc align-center">
											<div class="folio-info">
												<h5><a href="#">DentSalud</a></h5>
												<a href="Amoeba/img/Despacho/5.jpg" class="fancybox"><i class="fa fa-plus fa-2x"></i></a>
											 </div>										   
										 </div>
									</div>
                                </article>

                                <article class="col-md-4 isotopeItem ">
									<div class="portfolio-item">
										<img src="Amoeba/img/Despacho/6.jpg" alt="" />
										 <div class="portfolio-desc align-center">
											<div class="folio-info">
												<h5><a href="#">DentSalud</a></h5>
												<a href="Amoeba/img/Despacho/6.jpg" class="fancybox"><i class="fa fa-plus fa-2x"></i></a>
											 </div>										   
										 </div>
									</div>
                                </article>

                                <article class="col-md-4 isotopeItem ">
									<div class="portfolio-item">
										<img src="Amoeba/img/Despacho/7.jpg" alt="" />
										 <div class="portfolio-desc align-center">
											<div class="folio-info">
												<h5><a href="#">DentSalud</a></h5>
												<a href="Amoeba/img/Despacho/7.jpg" class="fancybox"><i class="fa fa-plus fa-2x"></i></a>
											 </div>										   
										 </div>
									</div>
                                </article>

                                <article class="col-md-4 isotopeItem photography">
									<div class="portfolio-item">
										<img src="Amoeba/img/Despacho/9.jpg" alt="" />
										 <div class="portfolio-desc align-center">
											<div class="folio-info">
												<h5><a href="#">DentSalud</a></h5>
												<a href="Amoeba/img/Despacho/9.jpg" class="fancybox"><i class="fa fa-plus fa-2x"></i></a>
											 </div>										   
										 </div>
									</div>
                                </article>

                                <article class="col-md-4 isotopeItem print">
									<div class="portfolio-item">
										<img src="Amoeba/img/Despacho/10.jpg" alt="" />
										 <div class="portfolio-desc align-center">
											<div class="folio-info">
												<h5><a href="#">DentSalud</a></h5>
												<a href="Amoeba/img/Despacho/10.jpg" class="fancybox"><i class="fa fa-plus fa-2x"></i></a>
											 </div>										   
										 </div>
									</div>
                                </article>
                                 <article class="col-md-4 isotopeItem print">
									<div class="portfolio-item">
										<img src="Amoeba/img/Despacho/11.jpg" alt="" />
										 <div class="portfolio-desc align-center">
											<div class="folio-info">
												<h5><a href="#">DentSalud</a></h5>
												<a href="Amoeba/img/Despacho/11.jpg" class="fancybox"><i class="fa fa-plus fa-2x"></i></a>
											 </div>										   
										 </div>
									</div>
                                </article>
                               <article class="col-md-4 isotopeItem print">
									<div class="portfolio-item">
										<img src="Amoeba/img/Despacho/12.jpg" alt="" />
										 <div class="portfolio-desc align-center">
											<div class="folio-info">
												<h5><a href="#">DentSalud</a></h5>
												<a href="Amoeba/img/Despacho/12.jpg" class="fancybox"><i class="fa fa-plus fa-2x"></i></a>
											 </div>										   
										 </div>
									</div>
                                </article>
                                </div>
                                        
							</div>
                                     

							</div>
                        </div>
				
			</div>
		</section>
		<section id="parallax2" class="section parallax" data-stellar-background-ratio="0.5">	
            <div class="align-center pad-top40 pad-bot40">
                <blockquote class="bigquote color-white">Llamanos y logra es sorisa <br> que siempre has querido</blockquote>
				<p class="color-white">DentSalud</p>
            </div>
		</section>

		<!-- contact -->
		<section id="section-contact" class="section appear clearfix">
			<div class="container">
				
				<div class="row mar-bot40">
					<div class="col-md-offset-3 col-md-6">
						<div class="section-header">
							<h2 class="section-heading animated" data-animation="bounceInUp">Contacto</h2 
						        <i class="fa fa-map-marker fa-fw w3-hover-text-black w3-xlarge w3-margin-right"></i>Ciudad de México, México<br>
						        <i class="fa fa-phone fa-fw w3-hover-text-black w3-xlarge w3-margin-right"></i> Teléfono : 16641869<br>
						        <i class="fa fa-envelope fa-fw w3-hover-text-black w3-xlarge w3-margin-right"></i> Email: contacto@dent-salud.com.mx<br>
						        <i class="fa fa-calendar fa-fw w3-hover-text-black w3-xlarge w3-margin-right"></i>Horario de Lunes a viernes: 10:00 am a 8:00 pm<br>
						         Sábados de 10:00 am a 2:00 pm</a> 
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-8 col-md-offset-2">
						<div class="cform" id="contact-form">
							<div id="sendmessage">
								 Your message has been sent. Thank you!
							</div>
							<form action="contact/contact.php" method="post" role="form" class="contactForm">
							  <div class="form-group">
								<label for="name">Your Name</label>
								<input type="text" name="name" class="form-control" id="name" placeholder="Your Name" data-rule="maxlen:4" data-msg="Please enter at least 4 chars" />
								<div class="validation"></div>
							  </div>
							  <div class="form-group">
								<label for="email">Your Email</label>
								<input type="email" class="form-control" name="email" id="email" placeholder="Your Email" data-rule="email" data-msg="Please enter a valid email" />
								<div class="validation"></div>
							  </div>
							  <div class="form-group">
								<label for="subject">Subject</label>
								<input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" data-rule="maxlen:4" data-msg="Please enter at least 8 chars of subject" />
								<div class="validation"></div>
							  </div>
							  <div class="form-group">
								<label for="message">Message</label>
								<textarea class="form-control" name="message" rows="5" data-rule="required" data-msg="Please write something for us"></textarea>
								<div class="validation"></div>
							  </div>
							  
							  <button type="submit" class="btn btn-theme pull-left">SEND MESSAGE</button>
							</form>

						</div>
					</div>
					<!-- ./span12 -->
				</div>
				
			</div>
		</section>
		<!-- map -->
		<section id="section-map" class="clearfix">
			<div id="map"></div>
		</section>
		
	<section id="footer" class="section footer">
		<div class="container">
			<div class="row animated opacity mar-bot20" data-andown="fadeIn" data-animation="animation">
				<div class="col-sm-12 align-center">
                    <ul class="social-network social-circle">
                        <li><a href="https://www.facebook.com/DentSaluddf/" target="blank" class="icoFacebook" title="Facebook"><i class="fa fa-facebook"></i></a></li>

                    </ul>				
				</div>
			</div>

			<div class="row align-center copyright">
					<div class="col-sm-12"><p>Copyright &copy; by <a href="https://bootstraptaste.com">W-Tech</a></p></div>
			</div>
		</div>

	</section>
	<a href="#header" class="scrollup"><i class="fa fa-chevron-up"></i></a>	

	<script src="Amoeba/js/modernizr-2.6.2-respond-1.1.0.min.js"></script>
	<script src="Amoeba/js/jquery.js"></script>
	<script src="Amoeba/js/jquery.easing.1.3.js"></script>
    <script src="Amoeba/js/bootstrap.min.js"></script>
	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyASm3CwaK9qtcZEWYa-iQwHaGi3gcosAJc&sensor=false"></script>
	<script src="Amoeba/js/jquery.isotope.min.js"></script>
	<script src="Amoeba/js/jquery.nicescroll.min.js"></script>
	<script src="Amoeba/js/fancybox/jquery.fancybox.pack.js"></script>
	<script src="Amoeba/js/skrollr.min.js"></script>		
	<script src="Amoeba/js/jquery.scrollTo-1.4.3.1-min.js"></script>
	<script src="Amoeba/js/jquery.localscroll-1.2.7-min.js"></script>
	<script src="Amoeba/js/stellar.js"></script>
	<script src="Amoeba/js/jquery.appear.js"></script>
	<script src="Amoeba/js/validate.js"></script>
    <script src="Amoeba/js/main.js"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA8ooZWOHDWX3wDlpjH4KRJR9ymP7Pqx2A&callback=initMap"></script>
<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15054.638817672309!2d-99.23246!3d19.383882!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xd8c650382d25eaf4!2sDentSalud!5e0!3m2!1ses!2smx!4v1539326106723" width="100%" height="350" frameborder="0" style="border:0" allowfullscreen></iframe>
	</body>
</html>