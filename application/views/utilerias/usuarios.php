<?php
/*
 * Tabla Usuarios
 *
*/
?>
<script src="<?php echo base_url("assets/js/app.js"); ?>"></script>
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
          <input type="hidden" name="orden[tipo]" id="tipo" value="tcu.char_nombre">
          <input type="hidden" name="orden[order]" id="orden" value="ASC">
        </form>
            <div class="body">
              <div class="table-responsive">
                  <table class="table table-striped table-hover">
                      <thead>
                      <tr>
                          <th class="order sorting_desc" data-variable="tcu.char_nombre">Nombre(s)</th>
                          <th class="order sorting" data-variable="tcu.char_ape_pat">Apellido(s)</th>
                          <th class="order sorting" data-variable="tcu.char_email">Email</th>
                          <th>Tipo</th>
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
var ajaxUrl = '<?php echo base_url("usuario/index"); ?>';

function crear_elemento(data) {
  /*var tr = jQuery('<tr></tr>');
  var url = base_url("usuario/detalle/"+data.id_usuario);
  tr.append('<td><a href="'+url+'">'+data.char_nombre+'</a></td>');
  tr.append('<td>'+data.char_ape_pat+' '+data.char_ape_mat+'</td>');
  tr.append('<td>'+data.char_email+'</td>');
  tr.append('<td><span class="badge bg-gray-lighter text-gray '+(data.bol_activo==1?'fw-semi-bold':'text-gray-light')+'">'+data.perfil+'</span></td>');
  tr.append('<td>'+(data.bol_activo==1?'Activo':'Borrado')+'</td>');
  $('tbody').append(tr);*/
}
</script>