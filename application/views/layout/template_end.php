<?php
/**
 * template_end.php
 *
 * Author: Emmanuel
 *
 * The last block of code used in every page of the template
 *
 * We put it in a separate file for consistency. The reason we
 * separated template_scripts.php and template_end.php is for enabling us
 * put between them extra javascript code needed only in specific pages
 *
 */
?>
<!--div class="col-lg-12">
	<section class="widget large">
        <header>
            <h4>Historico <span class="label label-success" id="totalBit"></span></h4>
             <div class="actions">
                <button class="btn btn-transparent btn-xs">Show All <i class="fa fa-arrow-down"></i></button>
            </div>
        </header>
        <div class="body">
            <div id="feed" class="feed">
                <div class="wrapper" id="Historico"></div>
            </div>
        </div>
    </section>
</div-->
<div id="cerrar" class="modal fade" role="dialog">
    <div class="modal-dialog modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Cerrar Sesion</h4>
            </div>
            <div class="modal-body"><p class="text-center">¿Esta seguro que desea salir?</p></div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" onclick="cerrarSesion();">Continuar</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
            </div>
        </div>
    </div>
</div>
</div>
</body>
</html>