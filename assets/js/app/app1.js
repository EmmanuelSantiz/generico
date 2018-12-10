/**
* Funciones Generales para cargar formularios dinamicamente
*/
jQuery(document).ready(function() {

    var auto = $('#form-ajax').data('history');
        
    if(auto) {
        llenarCamposStorage();
    } else {
        destroyStorage();
    }

    $('.reset').click(function(event) {
        destroyStorage();
        $('#form-ajax input, #form-ajax select').each(function(index, el) {
            if ($(el).attr('id') != 'orden' && $(el).attr('id') != 'tipo') {
                if ($(el).attr('id') == 'page') {
                    $('#page').val(1);
                }
                $(el).val('');
            }
        });
    });

    //Funcion general para todos los formularios
    $('#form-ajax').submit(function(e) {
        e.preventDefault();
        buscar_registros();
        return false;
    });

    $('#form-ajax').submit();

    $('.giro').keyup(function(event) {
        $('#page').val(1);
        buscar_registros();
    });

    $('.sel').change(function(event) {
        $('#page').val(1);
        buscar_registros();
    });

    $('.order').click(function() {
        var element = $(this);

        if(element.hasClass('sorting')) {
            $('.order').each(function() {
                $(this).removeClass($(this).attr('class')).addClass('order sorting');
            });

            element.removeClass('sorting').addClass('sorting_asc');
            $('#form-ajax #tipo').val(element.data('variable'));
            $('#form-ajax #orden').val('DESC');
        }

        if($(this).hasClass('sorting_asc')) {
            element.removeClass('sorting_asc').addClass('sorting_desc');
            $('#form-ajax #tipo').val(element.data('variable'));
            $('#form-ajax #orden').val('ASC');
        } else if($(this).hasClass('sorting_desc')) {
            element.removeClass('sorting_desc').addClass('sorting_asc');
            $('#form-ajax #tipo').val(element.data('variable'));
            $('#form-ajax #orden').val('DESC');
        }
        $('#page').val(1);
        buscar_registros();
    });

    $('.numeric').numeric();
    $('.numeric-integer').numeric({ decimal: false, negative: false });
    $('.numeric-double-integer').numeric({ negative: false });

    /*$('.giro').keypress(function(event) {
        alert($(this).val())
        alert(1)
        buscar_registros();
    });*/

    //Funcion para manipular el cuerpo de datatables
    /*$('.widget-controls > a').click(function(event) {
        if($(this).data('widgster') == 'expand') {
            $(this).hide();
            $(this).next().show();
            $('.body').fadeOut('slow');
        } else {
            $(this).hide();
            $(this).prev().show();
            $('.body').fadeIn('slow');
        }
    });*/


    /***********************************Validar Formularios**********************************/

    var auto = $('#'+$('form').attr('id')).data('auto');
    var bit = $('#'+$('form').attr('id')).data('bit');

    $("#"+$('form').attr('id')).keypress(function(e) {
        if (e.which == 13) {
            return false;
        }
    });

    if(auto == true) {
        for(var i in arrayRequeridos) {
            cadena += '#'+arrayRequeridos[i]+(parseInt(i) == (arrayRequeridos.length-1)?'':', ');
        }

        $(cadena).on('keyup change', function() {
            if($(this).val() != "") {
                $(this).removeClass("parsley-error");
                $(this).parent().find('ul').html('');
            }
        });

        /*$(cadena).keyup(function() {
            if($(this).val() != "") {
                $(this).removeClass("parsley-error");
                $(this).parent().find('ul').html('');
            }
        });*/

        $('#guardar').click(function() {
            var post = true;
            $('#'+$('form').attr('id')+' [name]').each(function(index, el) {
                if(jQuery.inArray($(el).attr('id'), arrayRequeridos) !== -1) {
                    if ($(el).val() == '') {
                        if (!$(el).hasClass("parsley-error")) {
                            $(el).addClass("parsley-error");
                            $(el).parent().append('<ul class="parsley-errors-list filed"><li class="parsley-required">Este campo no puede estar vacio</li></ul>');
                        }
                        post = false;
                    }
                }
            });
            return post;
        });
    }

    if (bit == true) {
        $('#btnBitacora').click(function() {
            var elemento = $(this).parent().next();

            if (elemento.css('display') == 'none') {
                $(this).html('<i class="fa fa-minus"></i> Ocultar');
                elemento.show();
            } else {
                $(this).html('<i class="fa fa-plus"></i> Mostrar');
                elemento.hide();
            }
        });

        $('#text_comentario').keyup(function() {
            $('#btnComment').prop('disabled', (!$(this).val() != ''));
        });
    }

});

    var myVar;
    function buscar_registros() {
        clearTimeout(myVar);
        myVar = setTimeout(generar_resultados, 500);
        llenarStorage();
    }

    var generar_resultados = function() {
        var data = $('#form-ajax').serialize();

        $.ajax({
            url: ajaxUrl,
            type: 'post',
            data: {data : data},
            beforeSend: function() {
                var spiner = jQuery('<div></div>');
                spiner.addClass('loader animated fadeIn handle');
                spiner.append('<span class="spinner"><i class="fa fa-spinner fa-spin"></i></span>');
                $('tbody').html(spiner);
            },
            success: function(data) {
                console.log(data);
                $('tbody').html('');

                if(data.data.length > 0) {
                    //$('#pagination').twbsPagination('destroy');
                    for(var i in data.data) {
                        crear_elemento(data.data[i]);
                    }
                    
                    //$('#pagination').twbsPagination('destroy');
                    paginador(data.post.page, data.total_paginas);
                } else {
                    crear_vacio();
                }

                if(data.total_registros||""){
                    $('.paginas').html(data.total_registros+' registro'+((data.total_registros>1)?'s':'')+' en '+data.total_paginas+' p&aacute;gina'+((data.total_paginas>1)?'s':''));
                } else {
                    $('.paginas').html('P&aacute;gina'+((data.total_paginas>1)?'s':'')+': '+data.total_paginas);
                }
            }, error: function( req, status, err ) {
                console.log( 'something went wrong', status, err );
              }
        });
    }

    function paginador(page, total_paginas) {
        $('#pagination').twbsPagination({
                visiblePages: 5,
                totalPages: total_paginas,
                first:'&laquo;',
                last:'&raquo;',
                prev:'<',
                next:'>',
            onPageClick: function (event, page) {
                if ($('#page').val() != page) {
                    $('#page').val(page);
                    buscar_registros();
                }
            }
        });
    }

    function MASK(form, n, mask, format) {
        if (format == "undefined") format = false;
        if (format || NUM(n)) {
            dec = 0, point = 0;
            x = mask.indexOf(".")+1;
            if (x) { dec = mask.length - x; }

            if (dec) {
                n = NUM(n, dec)+"";
                x = n.indexOf(".")+1;
                if (x) { point = n.length - x; } else { n += "."; }
            } else {
                n = NUM(n, 0)+"";
            }

            for (var x = point; x < dec ; x++) {
                n += "0";
            }
            x = n.length, y = mask.length, XMASK = "";
            while ( x || y ) {
                if ( x ) {
                    while ( y && "#0.".indexOf(mask.charAt(y-1)) == -1 ) {
                        if ( n.charAt(x-1) != "-")
                            XMASK = mask.charAt(y-1) + XMASK;
                            y--;
                        }
                        XMASK = n.charAt(x-1) + XMASK, x--;
                } else if ( y && "$0".indexOf(mask.charAt(y-1))+1 ) {
                    XMASK = mask.charAt(y-1) + XMASK;
                }
                if ( y ) { y-- }
            }
        } else {
            XMASK="";
        }
        
        if (form) { 
            form.val(XMASK);
        }
        return XMASK;
    }

    function NUM(s, dec) {
        for (var s = s+"", num = "", x = 0 ; x < s.length ; x++) {
            c = s.charAt(x);
            if (".-+/*".indexOf(c)+1 || c != " " && !isNaN(c)) { num+=c; }
        }
        if (isNaN(num)) { num = eval(num); }
        if (num == "")  { num=0; } else { num = parseFloat(num); }
        if (dec != undefined) {
            r=.5; if (num<0) r=-r;
            e=Math.pow(10, (dec>0) ? dec : 0 );
            return parseInt(num*e+r) / e;
        } else {
            return num;
        }
    }

    function number_format(amount, decimals) {

        amount += '';
        amount = parseFloat(amount.replace(/[^0-9\.]/g, ''));
        decimals = decimals || 0;

        if (isNaN(amount) || amount === 0) 
            return parseFloat(0).toFixed(decimals);

        amount = '' + amount.toFixed(decimals);
        var amount_parts = amount.split('.'),
        regexp = /(\d+)(\d{3})/;

        while (regexp.test(amount_parts[0]))
            amount_parts[0] = amount_parts[0].replace(regexp, '$1' + ',' + '$2');

        return amount_parts.join('.');
    }

    function llenarStorage() {
        var history = [];
        var temp = null;
        $('#form-ajax input, #form-ajax select').each(function(index, el) {
            if (localStorage.getItem('historial')) 
                temp = localStorage.getItem('historial');              

            var element = $(el);
            var name = element.attr('name');
            if (name && name != 'tipo_nomina') {
                var valor = element.val();
                if(valor!='') {
                    if(temp) {
                        history = JSON.parse(temp); 
                    }
                    var value = $.trim(valor);
                    if(value.length > 0) {
                        if($.inArray(value,history) != -1){
                        } else {
                            if (history) {
                                history.push({name,valor});
                            }
                        }
                    }
                }
            }
        });
        localStorage.setItem('historial', JSON.stringify(history)); 
    }

    function destroyStorage(){
        localStorage.setItem('historial', null);
    }

    function llenarCamposStorage() {        
        if($('#form-ajax').data('history')) {
            var temp = localStorage.getItem('historial'); 
            var history = JSON.parse(temp);
            if (history) {
                for (var i = history.length - 1; i >= 0; i--) {
                    if(history[i].name=='page') {
                        $('#form-ajax').find('[name="'+history[i].name+'"]').val(history[i].valor);
                    } else {
                        $('#form-ajax').find('[name="'+history[i].name+'"]').val(history[i].valor).prop('disabled',false);  
                    }
                }
            }
        }
    }