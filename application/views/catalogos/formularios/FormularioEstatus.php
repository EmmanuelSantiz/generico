<?php
/*
 * Formulario Estatus
 *
*/
?>
<div class="content container">
    <ol class="breadcrumb">
      <li><a href="<?php echo base_url() ?>">Inicio</a></li>
      <li><a href="<?php echo base_url("Catalogos/Estatus") ?>">Estatus</a></li>
      <li class="active">Estatus</li>
    </ol>

    <form class="form-horizontal" action="<?php echo base_url("Catalogos/FormularioEstatus/$id"); ?>" method="post" >
        <section class="widget">
            <div class="body">
                <fieldset>
                    <legend class="section">Formulario de Estatus</legend>
                    <div class="form-group">
                        <label for="hint-field" class="col-sm-4 control-label">Nombre del Estatus</label>
                        <div class="col-sm-7">
                            <input type="text" id="char_nombre" name="char_nombre" class="form-control input-transparent obtenerCopia" placeholder="Nombre del Estatus" value="<?php echo ($data?$data->char_nombre:''); ?>" data-tbl="tbl_cat_estatus">
                        </div>
                    </div>
                </fieldset>
                <div class="form-actions">
                    <div class="row">
                        <div class="col-sm-offset-4 col-sm-7">
                            <div class="btn-toolbar">
                                <button type="submit" class="btn btn-primary" id="Guardar">Guardar Cambios</button>
                                <button type="button" class="btn btn-inverse" onclick="location.href='<?php echo base_url("Catalogos/Estatus") ?>'">Cancelar</button>
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
        if ($('#char_nombre').val() == '') {
            noti('Llenar Nombre');
        } else {
            console.log($('#char_nombre').val())
        }
        
        return false;
    });
</script>