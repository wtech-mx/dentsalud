<div class="container">
	<form class="navbar-form navbar-left"  action="admin/buscar.php" method="get" name="busqueda" role="search" >
	  <div class="form-group">
	    <input type="text" class="form-control"  name="busqueda" placeholder="Buscar">
	  </div>
	  <button type="submit" class="btn btn-default">Buscar</button>
	</form>
</div>


<!--	TPS Y NOTICIAS	-->
  <div class="bs-example" style="padding: 20px">
    <div class="row">
	<div class="row mar-bot40 p-3">
		<div class="col-md-offset-3 col-md-6">
			<div class="section-header">
				<h2 class="section-heading animated" data-animation="bounceInUp">Noticias y Tips</h2>
				<p></p>
			</div>
		</div>
	</div>


		<?php foreach($posts as $post): ?>
      <div class="col-sm-6 col-md-4">
        <div class="thumbnail fluid">
          <a class="fluid" href="single.php?id=<?php echo $post['id']; ?>">
          <img class="card-img-top img-fluid" src="<?php  echo RUTA ?><?php echo $post['thumb']; ?>" alt=" <?php  echo RUTA?><?php echo $post['thumb']; ?>" >
          </a>
          <div class="caption">
            <h3><a href="single.php?id=<?php echo $post['id']; ?>"><?php echo $post['titulo'] ?></a></h3>
            <p class="text-muted"><?php echo fecha($post['fecha']); ?></p>
            <p><?php echo $post['extracto'] ?></p>
            <p>
            <a class="btn btn-primary btn-lg btn-block" href="single.php?id=<?php echo $post['id']; ?>" title="" style="background: #7a4b9b">Continuar Leyendo</a>
          </div>
        </div>
      </div>
	   <?php endforeach; ?>

		<?php require 'paginacion.php'; ?>


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
	background: #7A4B9B;
	color:#fff;
}

.paginacion ul li a:hover {
	background: #7A4B9B;
	text-decoration: none;
}

.paginacion ul .active {
	background: #E8A6F3;
	padding:10px 20px;
}

.paginacion ul .disabled{
	background: #7a4b9b;
	padding:10px 20px;
	cursor: not-allowed;
}

.paginacion ul .disabled:hover {
	background: #7a4b9b;
}

</style>