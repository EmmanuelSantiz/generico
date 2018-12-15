<?php
/*
 * Tabla Tipos de Usuarios
 *
*/
?>
<div class="content container">
<h2 class="page-title">Modulo - <span class="fw-semi-bold">Tipos de Usuarios</span></h2>
<ol class="breadcrumb">
  <li><a href="<?php echo base_url(); ?>">Inicio</a></li>
  <li class="active">Tipos de Usuarios</li>
</ol>
<div class="row">
    <div class="col-md-12">
      <section class="widget">
        <header>
          <h4>Nuevo Tipo de Usuario</h4>
          <div class="actions">
            <button type="button" class="btn btn-success btn-xs pull-right" onclick="location.href='<?php echo base_url2("FormularioTipoUsuarios"); ?>'"><i class="fa fa-plus"></i> Agregar</button>
          </div>
        </header>
      </section>
        <section class="widget">
        <form role="form" class="form-horizontal form-label-left" id="form-ajax">
          <input type="hidden" value="1" name="page" id="page">
          <input type="hidden" name="orden[tipo]" id="tipo" value="tct.tipoUsuario_id">
          <input type="hidden" name="orden[order]" id="orden" value="ASC">
        </form>
            <div class="body">
              <div class="table-responsive">
                  <table class="table table-striped table-hover">
                      <thead>
                      <tr>
                          <th>Id</th>
                          <th>Descripcion</th>
                          <th></th>
                      </tr>
                      </thead>
                      <tbody></tbody>
                  </table>
                   <div class="text-center paginacion" id="paginacion"></div>
              </div>
            </div>
        </section>
    </div>
</div>
</div>
<script>
var ajaxUrl = '<?php echo base_url2("TipoUsuarios"); ?>';

function crear_elemento(data) {
  var tr = jQuery('<tr></tr>');
  tr.append('<td>'+data.tipoUsuario_id+'</td>');
  tr.append('<td>'+data.char_tipoUsuario+'</td>');
  tr.append('<td><a class="btn btn-warning" href="<?php echo base_url2("FormularioTipoUsuarios/"); ?>'+data.tipoUsuario_id+'"><i class="fa fa-pencil"></i></a><button class="btn btn-danger" type="button"><i class="fa fa-trash"></i></button></td>');
  $('tbody').append(tr);
}
</script>