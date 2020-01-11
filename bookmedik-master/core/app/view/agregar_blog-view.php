<div class="row">
    <div class="col-md-12">
<div class="card">
  <div class="card-header" data-background-color="blue">
      <h4 class="title">Nuevo Articulo</h4>
  </div>
  <div class="card-content table-responsive">

          <form class="form-horizontal" method="post" id="addproduct" action="../../../dentsalud/bookmedik-master/core/app/admin/nuevo.php" role="form">


  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Titulo del Articulo*</label>
    <div class="col-md-6">
      <input type="text" name="titulo" required class="form-control" placeholder="Articulo">
    </div>
  </div>
  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Extracto del Articulo</label>
    <div class="col-md-6">
      <input type="text" name="extracto"  class="form-control" placeholder="Resumen">
    </div>
  </div>
  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Texto del Articulo*</label>
    <div class="col-md-6">
      <input type="text" name="texto" class="form-control" placeholder="Articulo">
    </div>
  </div>
  <div class="custom-file p-4">
    <input type="file" name="thumb" class="custom-file-input" id="customFileLang" lang="es">
    <label class="custom-file-label" for="customFileLang">Seleccionar Archivo</label>
  </div>

  <div class="form-group">
    <div class="col-lg-offset-2 col-lg-10">
      <button type="submit" class="btn btn-primary">Agregar Articulo</button>
    </div>
  </div>
</form>
</div>
</div>
    </div>
</div>