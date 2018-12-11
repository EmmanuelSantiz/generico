<?php
/*
 * Tabla Usuarios
 *
*/
?>
<div class="content container">
<h2 class="page-title">Modulo - <span class="fw-semi-bold">Usuarios</span></h2>
<ol class="breadcrumb">
  <li><a href="<?php echo base_url(); ?>">Inicio</a></li>
  <li class="active">Usuarios</li>
</ol>
<div class="row">
    <div class="col-md-12">
      <section class="widget">
        <header>
          <h4>Nuevo Usuario</h4>
          <div class="actions">
            <button type="button" class="btn btn-success btn-xs pull-right" onclick="location.href='<?php echo base_url("usuario/detalle"); ?>'"><i class="fa fa-plus"></i> Agregar</button>
          </div>
        </header>
      </section>
        <section class="widget">
        <form role="form" class="form-horizontal form-label-left" id="form-ajax">
          <input type="hidden" value="1" name="page" id="page">
          <input type="hidden" name="orden[tipo]" id="tipo" value="tcu.char_nombres">
          <input type="hidden" name="orden[order]" id="orden" value="ASC">
        </form>
            <div class="body">
              <div class="table-responsive">
                  <table class="table table-striped table-hover">
                      <thead>
                      <tr>
                          <th>Nombre</th>
                          <th>Estatus</th>
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
var ajaxUrl = '<?php echo base_url("Catalogos/Usuarios"); ?>';

function crear_elemento(data) {
  var tr = jQuery('<tr></tr>');
  tr.append('<td>'+data.char_nombres+'</td>');
  /*tr.append('<td>'+data.text_descripcion+'</td>');
  tr.append('<td>'+data.date_registro+'</td>');*/
  tr.append('<td>'+data.estatus_id+'</td>');
  $('tbody').append(tr);
}
</script>