<?php
/*
 * Formulario Tipos de Usuarios
 *
*/
?>
<div class="content container">
    <ol class="breadcrumb">
      <li><a href="<?php echo base_url() ?>">Inicio</a></li>
      <li><a href="<?php echo base_url("Catalogos/TipoUsuarios") ?>">Tipos de Usuarios</a></li>
      <li class="active">Formulario Tipo de Usuario</li>
    </ol>

    <form class="form-horizontal" action="<?php echo base_url("Catalogos/FormularioTipoUsuarios/$id"); ?>" method="post" >
        <section class="widget">
            <div class="body">
                <fieldset>
                    <legend class="section">Formulario de Tipos de Usuarios</legend>
                    <div class="form-group">
                        <label for="hint-field" class="col-sm-4 control-label">Nombre</label>
                        <div class="col-sm-7">
                            <input type="text" id="char_tipoUsuario" name="char_tipoUsuario" class="form-control input-transparent obtenerCopia" placeholder="Nombre del Estatus" value="<?php echo ($data?$data->char_tipoUsuario:''); ?>" data-tbl="tbl_cat_tipousuario">
                        </div>
                    </div>
                </fieldset>
                <div class="form-actions">
                    <div class="row">
                        <div class="col-sm-offset-4 col-sm-7">
                            <div class="btn-toolbar">
                                <button type="submit" class="btn btn-primary" id="Guardar">Guardar Cambios</button>
                                <button type="button" class="btn btn-inverse" onclick="location.href='<?php echo base_url("Catalogos/TipoUsuarios") ?>'">Cancelar</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </form>
</div>
<script>
    $('#Guardar').click(function() {
        /*if ($('#char_nombre').val() == '') {
            noti('Llenar Nombre');
        } else {
            console.log($('#char_nombre').val())
        }
        
        return false;*/
    });
</script>