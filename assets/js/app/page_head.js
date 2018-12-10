$(function() {

    get_page_header();
    //get_bitacora_gral();

});

function get_page_header() {
    $.post(ajaxUrlPage_head, function(data) {
        //console.log(data)
        $('#sidebar').html('');
        if(data.data !== undefined) {
            $("#sidebar").append(crear_menu(data.data));
        }

        $(".link").on('click', function(event) {
            event.preventDefault();
            sessionStorage.clear();
            var elem = $(this);

            if (elem.data('id') !== undefined) {
                sessionStorage.setItem('id', elem.data('id'));
            }

            if (elem.data('id1') !== undefined) {
                sessionStorage.setItem('id1', elem.data('id1'));
            }

            if (elem.data('id2') !== undefined) {
                sessionStorage.setItem('id2', elem.data('id2'));
            }

            window.location = base_url(elem.data('url'));
        });
    });
}


function base_url(cadena = "") {
    var base = window.location.href.split('/');
    return base[0]+'//'+base[2]+'/7d1043473d55bfa90e8530d35801d4e381bc69f0/'+cadena;
}

$(document).ready(function(){
    var altura = $('.menu').offset().top;
    
    $(window).on('scroll', function(){
        if ( $(window).scrollTop() > altura ){
            $('.menu').addClass('menu-fixed');
        } else {
            $('.menu').removeClass('menu-fixed');
        }
    });
 
});

