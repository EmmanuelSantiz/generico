<?php
/**
 * page_head.php
 *
 * Author: Emmanuel Santiz
 *
 * Header and Sidebar of each page
 *
 */
/*date_default_timezone_set('America/Monterrey');
$tiempo = ($this->session->userdata('__ci_last_regenerate')) ? $this->session->userdata('__ci_last_regenerate') : strtotime(date("Y-m-d H:i:s")); 
$actual =  strtotime(date("Y-m-d H:i:s"));
if (($actual-$tiempo) >= 1800) {
    $this->db->update('tbl_cat_usuarios', array('bol_sesion' => 0), array('id_usuario' => user_info()->id_usuario));
    redirect('inicio/logout/');
} else {
    $this->session->set_userdata('__ci_last_regenerate', $actual);
}*/
date_default_timezone_set('America/Monterrey');
$tiempo = ($this->session->userdata('__ci_last_regenerate')) ? $this->session->userdata('__ci_last_regenerate') : strtotime(date("Y-m-d H:i:s"));
//if($this->session->perfil == "Admin"){
if(isset($this->session->timeOut)){ 
$actual=date("Y-m-d H:i:s");
$diaActual=date("d",strtotime($actual));
$horaActual=date("H",strtotime($actual));
$minutoActual=date("i",strtotime($actual));
$diaInicioSession=date("d",strtotime($this->session->timeOut));
$horaInicioSession=date("H",strtotime($this->session->timeOut));
$minutoInicioSession=date("i",strtotime($this->session->timeOut));

if($diaActual > $diaInicioSession && $horaActual > $horaInicioSession){
    //$this->db->update('tbl_cat_usuarios', array('bol_sesion' => 0), array('id_usuario' => user_info()->id_usuario));
    redirect(base_url('inicio/logout'));
}else
if(($minutoActual-$minutoInicioSession) > 30){
   // $this->db->update('tbl_cat_usuarios', array('bol_sesion' => 0), array('id_usuario' => user_info()->id_usuario));
    redirect(base_url('inicio/logout'));
}else{
    $this->session->timeOut=$actual;
    $this->session->set_userdata('__ci_last_regenerate', $actual);
}

//echo $actual;
//echo $this->session->timeOut;
//dd($this->session);
}



//}
?>
<script src="<?php echo base_url("assets/js/app/page_head.js"); ?>"></script>
<div class="logo">
    <h4><a href="javascript:void(0);" class="link" data-url=""><strong>APP</strong></a></h4>
</div>
<!--nav id="sidebar" class="sidebar nav-collapse collapse"></nav-->
    <!--div class="wrap"-->
    <header class="page-header">
        <div class="navbar">
            <ul class="nav navbar-nav navbar-right pull-right">
                <li class="visible-phone-landscape">
                    <a href="#" id="search-toggle">
                        <i class="fa fa-search"></i>
                    </a>
                </li>
                <li class="dropdown">
                    <a href="#" title="Messages" id="messages"
                       class="dropdown-toggle"
                       data-toggle="dropdown">
                        <i class="glyphicon glyphicon-comment"></i>
                    </a>
                    <ul id="messages-menu" class="dropdown-menu messages" role="menu">
                        <li role="presentation">
                            <a href="#" class="message">
                                <img src="<?php echo base_url("assets/img/1.png"); ?>" alt="">
                                <div class="details">
                                    <div class="sender">Jane Hew</div>
                                    <div class="text">
                                        Hey, John! How is it going? ...
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li role="presentation">
                            <a href="#" class="message">
                                <img src="<?php echo base_url("assets/img/2.png"); ?>" alt="">
                                <div class="details">
                                    <div class="sender">Alies Rumiancaŭ</div>
                                    <div class="text">
                                        I'll definitely buy this template
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li role="presentation">
                            <a href="#" class="message">
                                <img src="<?php echo base_url("assets/img/3.png"); ?>" alt="">
                                <div class="details">
                                    <div class="sender">Michał Rumiancaŭ</div>
                                    <div class="text">
                                        Is it really Lore ipsum? Lore ...
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li role="presentation">
                            <a href="#" class="text-align-center see-all">
                                See all messages <i class="fa fa-arrow-right"></i>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#" title="8 support tickets"
                       class="dropdown-toggle"
                       data-toggle="dropdown">
                        <i class="glyphicon glyphicon-globe"></i>
                        <span class="count">0</span>
                    </a>
                    <ul id="support-menu" class="dropdown-menu support" role="menu">
                        <li role="presentation">
                            <a href="#" class="support-ticket">
                                <div class="picture">
                                    <span class="label label-important"><i class="fa fa-bell-o"></i></span>
                                </div>
                                <div class="details">
                                    Check out this awesome ticket
                                </div>
                            </a>
                        </li>
                        <li role="presentation">
                            <a href="#" class="support-ticket">
                                <div class="picture">
                                    <span class="label label-warning"><i class="fa fa-question-circle"></i></span>
                                </div>
                                <div class="details">
                                    "What is the best way to get ...
                                </div>
                            </a>
                        </li>
                        <li role="presentation">
                            <a href="#" class="support-ticket">
                                <div class="picture">
                                    <span class="label label-success"><i class="fa fa-tag"></i></span>
                                </div>
                                <div class="details">
                                    This is just a simple notification
                                </div>
                            </a>
                        </li>
                        <li role="presentation">
                            <a href="#" class="support-ticket">
                                <div class="picture">
                                    <span class="label label-info"><i class="fa fa-info-circle"></i></span>
                                </div>
                                <div class="details">
                                    12 new orders has arrived today
                                </div>
                            </a>
                        </li>
                        <li role="presentation">
                            <a href="#" class="support-ticket">
                                <div class="picture">
                                    <span class="label label-important"><i class="fa fa-plus"></i></span>
                                </div>
                                <div class="details">
                                    One more thing that just happened
                                </div>
                            </a>
                        </li>
                        <li role="presentation">
                            <a href="#" class="text-align-center see-all">
                                See all tickets <i class="fa fa-arrow-right"></i>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="divider"></li>
                <li class="hidden-xs">
                    <a href="#" id="settings"
                       title="Settings"
                       data-toggle="popover"
                       data-placement="bottom">
                        <i class="glyphicon glyphicon-cog"></i>
                    </a>
                </li>
                <li class="hidden-xs dropdown">
                    <a href="#" title="Account" id="account"
                       class="dropdown-toggle"
                       data-toggle="dropdown">
                        <i class="glyphicon glyphicon-user"></i>
                    </a>
                    <ul id="account-menu" class="dropdown-menu account" role="menu">
                        <li role="presentation" class="account-picture">
                            <img src="<?php echo base_url("assets/img/2.png"); ?>" alt="">
                            Philip Daineka
                        </li>
                        <li role="presentation">
                            <a href="javascript:void(0);" class="link">
                                <i class="fa fa-user"></i>
                                Profile
                            </a>
                        </li>
                        <li role="presentation">
                            <a href="javascript:void(0);" class="link">
                                <i class="fa fa-calendar"></i>
                                Calendar
                            </a>
                        </li>
                        <li role="presentation">
                            <a href="javascript:void(0);" class="link">
                                <i class="fa fa-inbox"></i>
                                Inbox
                            </a>
                        </li>
                    </ul>
                </li>
                <!--li class="visible-xs">
                    <a href="javascript:void(0);" class="btn-navbar" data-toggle="collapse"   data-target=".sidebar" title=""><i class="fa fa-bars"></i></a>
                </li-->
                <li role="presentation"><a href="" data-toggle="modal" data-target="#cerrar" data-backdrop="static"><i class="glyphicon glyphicon-off"></i></a></li>
            </ul>
        </div>
            <nav id='cssmenu' class='menu'></nav>
            <!--nav class="navbar navbar-inverse menu">
              <div class="container-fluid">
                <div class="navbar-header">
                  <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>                        
                  </button>
                </div>
                <div class="collapse navbar-collapse menu" id="cssmenu">
                </div>
              </div>
            </nav-->
    </header>
  
<!--Carga de Js de la pagina-->


<!--Carga de las funciones para la pagina-->
<script type="text/javascript">
var ajaxUrlPage_head = '<?php echo base_url("menu/get_menu"); ?>';
//var ajaxUrlBitacora = '<?= base_url("bitacora/get_bitacora") ?>';

/*$(function() {
    var myVars = setInterval(function() {window.location = '<?php echo base_url("inicio/logout"); ?>';}, 1800000);
});*/

function crear_menu(data) {
    $('#cssmenu').html('');

    var id = sessionStorage.getItem('id');
    var id1 = sessionStorage.getItem('id1');
    var id2 = sessionStorage.getItem('id2');

    var ul = jQuery('<ul></ul>');
    // ul.class('side-nav');
    if (data.length > 0) {
        for(var i in data) {
            var li = jQuery('<li></li>');
            
            if(typeof(data[i].nivel1) != "undefined") {
                    
                // li.addClass('panel'+(id == data[i].id_menu?'active':''));
                li.append('<a class="accordion-toggle'+(id == data[i].id_menu?'':' collapsed')+'" data-toggle="collapse" data-parent="#side-nav" href="#'+data[i].char_nombre.split(" ").join('_')+'-collapse"><i class="'+data[i].char_icon+'"></i><span class="name">'+data[i].char_nombre+'</span></a>');

                var subUl = jQuery('<ul id="'+data[i].char_nombre.split(" ").join('_')+'-collapse"></ul>');
                subUl.addClass("panel-collapse collapse"+(id == data[i].id_menu?' in':''));

                for(var j in data[i].nivel1) {
                    if (typeof(data[i].nivel1[j].nivel2) == "undefined") {
                        subUl.append('<li '+(id1 == data[i].nivel1[j].id_menu?'class="active"':'')+'><a class="link" class="link" data-id="'+data[i].id_menu+'" data-id1="'+data[i].nivel1[j].id_menu+'" data-url="'+data[i].nivel1[j].char_url+'" href="javascript:void(0);">'+data[i].nivel1[j].char_nombre+'</a></li>');
                    } else {
                        var liNivel2 = jQuery('<li></li>');

                        liNivel2.addClass('panel '+(id1 == data[i].nivel1[j].id_menu?'active':''));
                        liNivel2.append('<a class="accordion-toggle'+(id1 == data[i].nivel1[j].id_menu?'':' collapsed')+'" data-toggle="collapse" data-parent="#'+data[i].char_nombre.split(" ").join('_')+'-collapse" href="#sub-menu-'+data[i].nivel1[j].id_menu+'-collapse">'+data[i].nivel1[j].char_nombre+'</a>');
                        var ulNivel2 = jQuery('<ul id="sub-menu-'+data[i].nivel1[j].id_menu+'-collapse"></ul>');
                        ulNivel2.addClass((id1 == data[i].nivel1[j].id_menu)?'panel-collapse open collapse in':'panel-collapse collapse');

                        for(var k in data[i].nivel1[j].nivel2) {
                            if (typeof(data[i].nivel1[j].nivel2[k].nivel3) == "undefined") {
                                ulNivel2.append('<li '+(id2 == data[i].nivel1[j].nivel2[k].id_menu?'class="active"':'')+'><a class="link" data-id="'+data[i].id_menu+'" data-id1="'+data[i].nivel1[j].id_menu+'" data-id2="'+data[i].nivel1[j].nivel2[k].id_menu+'" data-url="'+data[i].nivel1[j].nivel2[k].char_url+'" href="javascript:void(0);">'+data[i].nivel1[j].nivel2[k].char_nombre+'</a></li>');
                            } else {
                                var liNivel3 = jQuery('<li></li>');
                                liNivel3.addClass('panel');

                                liNivel3.append('<a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#sub-menu-'+data[i].nivel1[j].id_menu+'-collapse" href="#sub-menu-'+data[i].nivel1[j].nivel2[k].id_menu+'-collapse">'+data[i].nivel1[j].nivel2[k].char_nombre+'</a>');

                                var ulNivel3 = jQuery('<ul id="sub-menu-'+data[i].nivel1[j].nivel2[k].id_menu+'-collapse"></ul>');
                                ulNivel3.addClass('panel-collapse collapse');

                                for(var l in data[i].nivel1[j].nivel2[k].nivel3) {
                                    ulNivel3.append('<li><a href="#">'+data[i].nivel1[j].nivel2[k].nivel3[l].char_nombre+'</a></li>');
                                }

                                liNivel3.append(ulNivel3);
                                ulNivel2.append(liNivel3);
                            }
                        }

                        liNivel2.append(ulNivel2);
                        subUl.append(liNivel2);
                    }
                }

                li.append(subUl);
            }
            else {
                li.append('<a class="link" data-id="'+data[i].id_menu+'" data-url="'+data[i].char_url+'" href="javascript:void(0);"><i class="'+data[i].char_icon+'"></i> <span class="'+data[i].char_clas+'">'+data[i].char_nombre+'</span></a>');
            }
            ul.append(li);
        }
    }
        $('#cssmenu').append(ul);
}

/*function crear_menu(data) {
    $('#cssmenu').html('');

    var id = sessionStorage.getItem('id');
    var id1 = sessionStorage.getItem('id1');
    var id2 = sessionStorage.getItem('id2');

    var ul = jQuery('<ul></ul>');
    ul.addClass('nav navbar-nav');
    if (data.length > 0) {
        for(var i in data) {
            var li = jQuery('<li></li>');
            
            if(typeof(data[i].nivel1) != "undefined") {
                li.addClass('dropdown');
                li.append('<a class="dropdown-toggle" data-toggle="dropdown" href="#"><i class="'+data[i].char_icon+'"></i> <span class="caret">'+data[i].char_nombre+'</span></a>');

                var subUl = jQuery('<ul></ul>');
                subUl.addClass("dropdown-menu");

                for(var j in data[i].nivel1) {
                    if (typeof(data[i].nivel1[j].nivel2) == "undefined") {
                        subUl.append('<li><a href="#">'+data[i].nivel1[j].char_nombre+'</a></li>');
                    } else {
                        var liNivel2 = jQuery('<li></li>');

                        liNivel2.addClass('dropdown');
                        liNivel2.append('<a class="dropdown-toggle" data-toggle="dropdown" href="#">'+data[i].nivel1[j].char_nombre+' <span class="caret"></span></a>');
                        var ulNivel2 = jQuery('<ul></ul>');
                        ulNivel2.addClass('dropdown-menu');

                        for(var k in data[i].nivel1[j].nivel2) {
                            if (typeof(data[i].nivel1[j].nivel2[k].nivel3) == "undefined") {
                                ulNivel2.append('<li><a data-url="'+data[i].nivel1[j].nivel2[k].char_url+'" href="javascript:void(0);">'+data[i].nivel1[j].nivel2[k].char_nombre+'</a></li>');
                            } else {
                                var liNivel3 = jQuery('<li></li>');*/
                                //No descomentar
                                /*liNivel3.addClass('panel');

                                liNivel3.append('<a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#sub-menu-'+data[i].nivel1[j].id_menu+'-collapse" href="#sub-menu-'+data[i].nivel1[j].nivel2[k].id_menu+'-collapse">'+data[i].nivel1[j].nivel2[k].char_nombre+'</a>');

                                var ulNivel3 = jQuery('<ul id="sub-menu-'+data[i].nivel1[j].nivel2[k].id_menu+'-collapse"></ul>');
                                ulNivel3.addClass('panel-collapse collapse');

                                for(var l in data[i].nivel1[j].nivel2[k].nivel3) {
                                    ulNivel3.append('<li><a href="#">'+data[i].nivel1[j].nivel2[k].nivel3[l].char_nombre+'</a></li>');
                                }

                                liNivel3.append(ulNivel3);*/
                                //No decomentar
                                /*ulNivel2.append(liNivel3);
                            }
                        }

                        liNivel2.append(ulNivel2);
                        subUl.append(liNivel2);
                    }
                }

                li.append(subUl);
            }
            else {
                li.append('<a data-id="'+data[i].id_menu+'" data-url="'+data[i].char_url+'" href="'+data[i].char_url+'"><i class="'+data[i].char_icon+'"></i> <span class="caret">'+data[i].char_nombre+'</span></a>');
            }
            ul.append(li);
        }
    }
        $('#cssmenu').append(ul);
}*/
</script>
