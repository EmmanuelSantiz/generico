<?php
/**
 * template_start.php
 *
 * Author: Emmanuel Santiz
 *
 * The first block of code used in every page of the template
 *
 */
?>
<!DOCTYPE html>
<html>
<head>
  <title>App</title>

  <link href="<?php echo base_url("assets/css/application.css"); ?>" rel="stylesheet">
  <link href="<?php echo base_url("assets/css/stylesMenu.css"); ?>" rel="stylesheet">
  <link href="<?php echo base_url("assets/css/datepicker.css"); ?>" rel="stylesheet">
  <link href="<?php echo base_url("assets/css/jquery.gritter.css"); ?>" rel="stylesheet">

  <link rel="shortcut icon" href="<?php echo base_url("assets/img/favicon.png"); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="App 1.0">
  <meta name="author" content="Emmanuel Sántiz">
  <meta charset="utf-8">

  <!--Include de scripts generales de la pagina-->
  <script src="<?php echo base_url("assets/lib/jquery/dist/jquery.min.js"); ?>"></script>
  <script src="<?php echo base_url("assets/lib/jquery-pjax/jquery.pjax.js"); ?>"></script>
  <script src="<?php echo base_url("assets/lib/bootstrap-sass/assets/javascripts/bootstrap.min.js") ?>"></script>
  <script src="<?php echo base_url("assets/lib/widgster/widgster.js"); ?>"></script>
  <script src="<?php echo base_url("assets/lib/underscore/underscore.js"); ?>"></script>
  <script src="<?php echo base_url("assets/lib/messenger/build/js/messenger.js"); ?>"></script>
  <script src="<?php echo base_url("assets/js/datepicker/bootstrap-datepicker.js"); ?>"></script>

  <!--Include del script general-->
  <script src="<?php echo base_url("assets/js/app/app.js"); ?>"></script>
  <script src="<?php echo base_url("assets/js/app.js"); ?>"></script>
  <script src="<?php echo base_url("assets/js/settings.js"); ?>"></script>
  <script src="<?php echo base_url("assets/js/numeric.js"); ?>"></script>
  <script src="<?php echo base_url("assets/lib/select2/select2.min.js") ?>"></script>

  <!--Include de scripts para el log-->
  <script src="<?php echo base_url("assets/lib/slimScroll/jquery.slimscroll.min.js"); ?>"></script>
  <script src="<?php echo base_url("assets/lib/jquery.sparkline/index.js"); ?>"></script>
  <script src="<?php echo base_url("assets/lib/d3/d3.min.js"); ?>"></script>
  <script src="<?php echo base_url("assets/lib/nvd3/build/nv.d3.min.js"); ?>"></script>

  <script src="<?php echo base_url("assets/lib/backbone/backbone.js"); ?>"></script>
  <script src="<?php echo base_url("assets/lib/backbone.localStorage/backbone.localStorage-min.js"); ?>"></script>

  <!--Include de scripts para la paginacion-->
  <script src="<?php echo base_url("assets/js/paginacion/jquery.twbsPagination.min.js"); ?>" type="text/javascript"></script>

  <!-- Calendario-->
  <link href="<?php echo base_url("assets/css/bootstrap_zebra/zebra_datepicker.min.css"); ?>" rel="stylesheet">
  <link href="<?php echo base_url("assets/css/examples.css"); ?>" rel="stylesheet">
  <script src="<?php echo base_url("assets/js/zebraDate/zebra_datepicker.min.js"); ?>"></script>

  <!-- Notificaciones -->
  <script src="https://js.pusher.com/4.1/pusher.min.js"></script>
  <script src="<?php echo base_url("assets/js/jquery.gritter.min.js"); ?>"></script>

  <!--NodeJS-->
  <!--script src="http://34.224.174.138/node_modules/socket.io/node_modules/socket.io-client/socket.io.js"></script-->
</head>
<body>
<script>
Pusher.logToConsole = false;

var pusher = new Pusher('6a82677d8cc097857243', {
  cluster: 'us2',
  encrypted: true
});

var channel = pusher.subscribe("notificaciones");

channel.bind('notificacion', function(data) {
  switch(data.tipo) {
    case 'AddManifiesto':
      if (data.id_usuario == '<?php echo user_info()->id_usuario; ?>' || '<?php echo user_info()->id_usuario; ?>' == '1') {
        noti(data.char_nombre+' Te ha asignado un manifiesto, con Folio '+data.folio+'!!');
        notiIE(base_url('assets/img/2.png'), 'Manifiesto', data.char_nombre+' Te ha asignado un manifiesto, con Folio '+data.folio+'!!');

        if ('<?php echo onToy(); ?>' == 'valeant_manifiesto/index') {
          $('#form-ajax').submit();
        }
      }
    break;
    case 'FinManifiesto':
      if (data.id_usuario == '<?php echo user_info()->id_usuario; ?>' || '<?php echo user_info()->id_usuario; ?>' == '1') {
        noti(data.char_nombre+' Ha finalizado el manifiesto, con Folio '+data.folio+'!!');
        notiIE(base_url('assets/img/2.png'), 'Manifiesto', data.char_nombre+' Ha finalizado el manifiesto, con Folio '+data.folio+'!!');

        if ('<?php echo onToy(); ?>' == 'valeant_manifiesto/index' || '<?php echo onToy(); ?>' == 'valeant_manifiesto/pago') {
          $('#form-ajax').submit();
        }
      }
    break;
    case 'ChequeLiberado':
      if (data.id_usuario == '<?//php echo user_info()->id_usuario; ?>' || '<?php echo user_info()->id_usuario; ?>' == '1') {
        noti(data.char_nombre+' Liberó el cheque del manifiesto, con Folio '+data.folio+'!!');
        notiIE(base_url('assets/img/2.png'), 'Manifiesto', data.char_nombre+' Liberó el cheque del manifiesto, con Folio '+data.folio+'!!');

        if ('<?php echo onToy(); ?>' == 'valeant_manifiesto/index' || '<?php echo onToy(); ?>' == 'valeant_manifiesto/pago') {
          $('#form-ajax').submit();
        }
      }
    break;
   case 'correos':
        if('<?php echo user_info()->bol_ticketsAll; ?>' == '1'){
          noti('Correos nuevos !!');
          notiIE(base_url('assets/img/2.png'), 'Correo', data.correos+' Correo(´s) nuevo(´s) para '+data.char_correo);
          if ('<?php echo onToy(); ?>' == 'tickets/index') {
              $('#form-ajax').submit();
           }
        }else
        if('<?php echo user_info()->bol_tickets; ?>'== '1' && '<?php echo user_info()->id_correo; ?>' == data.id_correo ){
          noti('Correos nuevos !!');
          notiIE(base_url('assets/img/2.png'), 'Correo', data.correos+' Correo(´s) nuevo(´s) para '+data.char_correo);
          if ('<?php echo onToy(); ?>' == 'tickets/index') {
            $('#form-ajax').submit();
          }
        }
    break;
    case 'tickets':
     // console.log(data);
      if(('<?php echo user_info()->bol_tickets; ?>'== '1' && '<?php echo user_info()->id_usuario; ?>'== data.id_usuarioR) || '<?php echo user_info()->bol_ticketsAll; ?>'== '1'){
         // noti('Correos nuevos !!');
          notiIE(base_url('assets/img/2.png'), 'Notas', data.char_mensaje);
        //  if ('<?php //echo onToy(); ?>' == 'tickets/index') {
         //   $('#form-ajax').submit();
          //}
        }
    break;
  }
});

function notifyMe(theBody, theIcon = null, theTitle, theText) {
  if (!("Notification" in window)) {
   notiIE(theIcon, theTitle, theText);
  } else if (Notification.permission === "granted") {
    spawnNotification(theBody, theIcon, theTitle);
  } else if (Notification.permission !== 'denied') {
    Notification.requestPermission(function (permission) {
      if (permission === "granted") {
        var notification = new Notification(theBody);
      }
    });
  }
}

function spawnNotification(theBody, theIcon, theTitle) {
  var options = {
    body: theBody,
    icon: theIcon
  }
  
  var n = new Notification(theTitle,options);
}

function notiIE(image = null, theTitle, theText) {
  $.gritter.add({
    title: theTitle,
    text: theText,
    image: base_url('assets/img/2.png'),
    sticky: false,
    before_open: function(){
      if($('.gritter-item-wrapper').length == 3) {
        return false;
      }
    }
  });
}

function noti(mensaje,$tipo = 'success') {
  var theme = 'air';

  $.globalMessenger({theme:theme, extraClasses:'messenger-fixed messenger-on-top'});
  Messenger.options = {theme:theme, extraClasses:'messenger-fixed messenger-on-top'};
  Messenger().post({message: mensaje, type:$tipo, showCloseButton:true});
}
//obtiene los correos
var usuarioValidoTickets="<?php echo @user_info()->bol_tickets; ?>";
var usuarioValidoTicketsAll="<?php echo @user_info()->bol_ticketsAll; ?>";

if(usuarioValidoTickets == 1 || usuarioValidoTicketsAll==1){
    //console.log(usuarioValidoTickets,usuarioValidoTicketsAll);
    //setTimeEntradaCorreos();
}

function setTimeEntradaCorreos(){/*
  if(!!window.EventSource)
 {
// var urlComment = base_url("Pruebas/survey");
var urlComment = base_url("GestionCorreo/verificarEntradaCorreos");
 //creamos un nuevo objeto EventSource y le decimos
 //que el server está en survey.php
 var server = new EventSource(urlComment);
 //abrimos la conexión
 server.onopen = function(e)
 {
 //var status = document.querySelector(".status");
 console.log("Conectado");
 
 }
 
 //cuando ocurre un error con la conexión
 server.onerror = function(e)
 {
 //si la conexión ha sido cerrada
 if (e.readyState == EventSource.CLOSED) 
 {
   console.log("Desconectado");

 }
 }
 
 //añadimos el evento votaciones al server, 
 //así puede escuchar cada vez que el server mande información
 server.addEventListener("votaciones", function(e)
 {
 var response = JSON.parse(e.data);
 //console.log(response);
 //console.log("respuesta tickets: "+response.tickets);
 if(response.tickets > 0 && response.perfil== "Admin"){
   // noti("tienes nuevos tickets");
    $(".count").html(response.tickets);
}
 if(response.seguimiento > 0 && response.perfil== "Admin"){
  //  noti("tienes nuevos seguimientos del ticket "+response.folioSeg);
    $(".count").html(response.seguimiento);
}
 
 if ('<?php echo onToy(); ?>' == 'tickets/index') {
          $('#form-ajax').submit();
      }

 

 }, false);
 }*/
}

$(function() {
  $('.datepicker').Zebra_DatePicker({
    format: 'd/m/Y',
    header_captions: {
      days: 'F, Y',
      months: 'Y',
      years: 'Y1 - Y2'
    }
  });
  if (localStorage.getItem('msj')) {
    var mensaje = "Bienvenido <?php echo @user_info()->char_nombre; ?>, Acabas de iniciar sesion";
    noti(mensaje);
    localStorage.removeItem('msj');
  }
});
</script>