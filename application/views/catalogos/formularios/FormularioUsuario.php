<?php
/*
 * Formulario Usuarios
 *
*/
?>
<div class="content container">
    <ol class="breadcrumb">
      <li><a href="<?php echo base_url() ?>">Inicio</a></li>
      <li><a href="<?php echo base_url2("Usuarios") ?>">Usuarios</a></li>
      <li class="active">Formulario Usuario</li>
    </ol>

    <form class="form-horizontal" action="<?php echo onToy("$id"); ?>" method="post" >
        <input type="hidden" name="char_salt" id="char_salt" value="<?php echo ($data?$data->char_salt:temp_pass()); ?>">
        <input type="hidden" name="estatus_id" id="estatus_id" value="<?php echo ($data?$data->estatus_id:1); ?>">
        <?php if($data) {?>
        <section class="widget">
            <div class="body">
                <fieldset>
                    <legend class="section">Cambiar contraseña</legend>
                    <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <label for="hint-field" class="col-sm-4 control-label">Contraseña Actual</label>
                            <div class="col-sm-7 input-group">
                                <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                                <input type="text" id="char_password_actual" name="char_password_actual" class="form-control input-transparent" placeholder="Contraseña Actual">
                            </div>
                        </div>                        
                    </div>
                    <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <label for="hint-field" class="col-sm-4 control-label">Nueva Contraseña</label>
                            <div class="col-sm-7 input-group">
                                <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                                <input type="text" id="char_password_nueva" name="char_password_nueva" class="form-control input-transparent" placeholder="Nueva Contraseña">
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <label for="hint-field" class="col-sm-5 control-label">Confirmar Nueva Contraseña</label>
                            <div class="col-sm-7 input-group">
                                <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                                <input type="text" id="char_password_confirmar" name="char_password_confirmar" class="form-control input-transparent" placeholder="Confirmar Nueva Contraseña">
                            </div>
                        </div>
                    </div>
                </fieldset>
            </div>
        </section>
        <?php } ?>
        <section class="widget">
            <div class="body">
                <fieldset>
                    <legend class="section">Formulario de Usuarios</legend>
                    <div class="form-group">
                        <label for="hint-field" class="col-sm-4 control-label">Usuario</label>
                        <div class="col-sm-7 input-group">
                            <span class="input-group-addon"><i class="fa fa-user"></i></span>
                            <input type="text" id="char_user" name="char_user" class="form-control input-transparent" placeholder="Usuario" value="<?php echo ($data?$data->char_user:''); ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="hint-field" class="col-sm-4 control-label">Recordatorio de contraseña</label>
                        <div class="col-sm-7 input-group">
                            <span class="input-group-addon"><i class="fa fa-question-circle"></i></span>
                            <input type="text" id="char_password_recordatorio" name="char_password_recordatorio" class="form-control input-transparent" placeholder="Usuario" value="<?php echo ($data?$data->char_password_recordatorio:''); ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="hint-field" class="col-sm-4 control-label">Nombre(s)</label>
                        <div class="col-sm-7 input-group">
                            <span class="input-group-addon"><i class="fa fa-user"></i></span>
                            <input type="text" id="char_nombres" name="char_nombres" class="form-control input-transparent" placeholder="Nombre(s)" value="<?php echo ($data?$data->char_nombres:''); ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="hint-field" class="col-sm-4 control-label">Apellido Paterno</label>
                        <div class="col-sm-7 input-group">
                            <span class="input-group-addon"><i class="fa fa-user"></i></span>
                            <input type="text" id="char_app" name="char_app" class="form-control input-transparent" placeholder="Apellido Paterno" value="<?php echo ($data?$data->char_app:''); ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="hint-field" class="col-sm-4 control-label">Apellido Materno</label>
                        <div class="col-sm-7 input-group">
                            <span class="input-group-addon"><i class="fa fa-user"></i></span>
                            <input type="text" id="char_apm" name="char_apm" class="form-control input-transparent" placeholder="Apellido Materno" value="<?php echo ($data?$data->char_apm:''); ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="hint-field" class="col-sm-4 control-label">Fecha de Nacimiento</label>
                        <div class="col-sm-7">
                            <input type="text" id="date_fecha_nacimiento" name="date_fecha_nacimiento" class="form-control input-transparent" value="<?php echo ($data?$data->date_fecha_nacimiento:''); ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="hint-field" class="col-sm-4 control-label">Correo</label>
                        <div class="col-sm-7 input-group">
                            <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                            <input type="text" id="char_correo" name="char_correo" class="form-control input-transparent" placeholder="Correo@correo.com" value="<?php echo ($data?$data->char_correo:''); ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="hint-field" class="col-sm-4 control-label">Telefono</label>
                        <div class="col-sm-7 input-group">
                            <span class="input-group-addon"><i class="fa fa-phone"></i></span>
                            <input type="text" id="int_telefono" name="int_telefono" class="form-control input-transparent" placeholder="1234567890" value="<?php echo ($data?$data->int_telefono:''); ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="hint-field" class="col-sm-4 control-label">Tipo de Usuario</label>
                        <div class="col-sm-7">
                            <select class="select2 form-control" name="tipoUsuario_id" id="tipoUsuario_id">
                                <option value=""></option>
                                <?php
                                    foreach($Catalogos['TiposUsuarios'] as $key) {
                                        $select = '';
                                        if ($data) {
                                            if ($data->tipoUsuario_id == $key->tipoUsuario_id) {
                                                $select = 'selected="selected"';
                                            }
                                        }
                                        echo '<option value="'.$key->tipoUsuario_id.'" '.$select.'>'.$key->char_tipoUsuario.'</option>';
                                    }
                                ?>
                            </select>
                        </div>
                    </div>
                </fieldset>
                <div class="form-actions">
                    <div class="row">
                        <div class="col-sm-offset-4 col-sm-7">
                            <div class="btn-toolbar">
                                <button type="submit" class="btn btn-primary" id="Guardar">Guardar Cambios</button>
                                <button type="button" class="btn btn-inverse" onclick="location.href='<?php echo base_url2("Usuarios") ?>'">Cancelar</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </form>
</div>S