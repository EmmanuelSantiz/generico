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
<script type="text/javascript">
function cerrarSesion() {
    sessionStorage.removeItem('id');
    sessionStorage.removeItem('id1');
    sessionStorage.removeItem('id2');

    window.location = '<?php echo base_url("inicio/logout")?>';
}
</script>
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
        <div class="loader-wrap hiding hide">
            <i class="fa fa-circle-o-notch fa-spin"></i>
        </div>
        </div>

<script type="text/template" id="settings-template">
    <div class="setting clearfix">
        <div>Sidebar on the</div>
        <div id="sidebar-toggle" class="pull-left btn-group" data-toggle="buttons-radio">
            <% onRight = sidebar == 'right'%>
            <button type="button" data-value="left" class="btn btn-sm btn-default <%= onRight? '' : 'active' %>">Left</button>
            <button type="button" data-value="right" class="btn btn-sm btn-default <%= onRight? 'active' : '' %>">Right</button>
        </div>
    </div>
    <div class="setting clearfix">
        <div>Sidebar</div>
        <div id="display-sidebar-toggle" class="pull-left btn-group" data-toggle="buttons-radio">
            <% display = displaySidebar%>
            <button type="button" data-value="true" class="btn btn-sm btn-default <%= display? 'active' : '' %>">Show</button>
            <button type="button" data-value="false" class="btn btn-sm btn-default <%= display? '' : 'active' %>">Hide</button>
        </div>
    </div>
    <div class="setting clearfix">
        <div>Dark Version</div>
        <div>
            <a href="../dark/index.html" class="btn btn-sm btn-default">&nbsp; Switch &nbsp;   <i class="fa fa-angle-right"></i></a>
        </div>
    </div>
    <div class="setting clearfix">
        <div>White Version</div>
        <div>
            <a href="../white/index.html" class="btn btn-sm btn-default">&nbsp; Switch &nbsp;   <i class="fa fa-angle-right"></i></a>
        </div>
    </div>
</script>

<script type="text/template" id="sidebar-settings-template">
    <% auto = sidebarState == 'auto'%>
    <% if (auto) {%>
    <button type="button"
            data-value="icons"
            class="btn-icons btn btn-transparent btn-sm">Icons</button>
    <button type="button"
            data-value="auto"
            class="btn-auto btn btn-transparent btn-sm">Auto</button>
    <%} else {%>
    <button type="button"
            data-value="auto"
            class="btn btn-transparent btn-sm">Auto</button>
    <% } %>
</script>

    </body>
</html>