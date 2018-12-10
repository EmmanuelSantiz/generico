$(function() {

    var arregloMenu = [];

    var inicio = function() {
        var contador = 1;

        $.post(urlGetMenus, function(data) {
            console.log(data);
            

            $('thead').html('');
            $('tbody').html('');

            var filaTH = jQuery('<tr></tr>');

            for(var i in data.titulos) {
              filaTH.append('<th class="hidden-xs">'+data.titulos[i]+'</th>');
            }
            filaTH.append('<th></th>');
            filaTH.append('<th></th>');
            $('thead').append(filaTH);

            $("#cargando").remove();

            if (data.menus.length == 0) {
                var fila = jQuery('<tr></tr>');
                fila.append('<td class="text-center" colspan=4 rowspan=3 style="text-align: center;font-size: large; font-weight: bold; text-decoration: underline; width: 100%; height: 100px;"></br> SIN DATOS </br></td>');
                $('tbody').append(fila);
            } else {
                arregloMenus = data.menus;
                var html = '';
                var contador = 1;
                  
                $('tbody').append('<tr style="display:none;" id="invisible"></tr>');
                for(var i in data.menus) {
                    //$('tbody').append(crearPadre(data.menus[i], contador, data.ids));
                    //var parent1 = contador;
                    //contador++;
                    console.log(contador)
                    crearPadre(data.menus[i], contador, data.ids)
                    $('tbody').append();
                }
                console.log(contador)
            }
        });

        function crearPadre(data, contador, array) {
            var fila = jQuery('<tr data-menu=true></tr>');
            fila.addClass('treegrid-'+contador);
            fila.append('<td>'+data.char_nombre+'</td>');
            fila.append('<td>'+data.text_descripcion+'</td>');
            fila.append('<td>'+data.date_registro+'</td>');
            var checked = (jQuery.inArray(data.id_menu, array) < 0)?'':'checked';
            fila.append('<td class="checkbox checkbox-primary"><input type="checkbox" '+checked+' class="addUtileria" data-id_menu="'+data.id_menu+'" data-tipo_menu=0><label for="checkbox"></label></td>');
            fila.append('<td><div class="btn-group"><button type="button" class="btn btn-primary principal" value="up" data-menu=true><i class="glyphicon glyphicon-arrow-up"></i></button><button type="button" class="btn btn-primary principal" value="down" data-menu=true><i class="glyphicon glyphicon-arrow-down"></button></div></td>');

            return contador++;
            //return fila;
        }

        $('#tipoMenu').change(function(e) {
            switch(parseInt($(this).val())) {
                case 1:
                    cargarPrincipal();
                break;
                case 2:
                    get(2);
                break;
            }
        });

        $('#modalForm').click(function(e) {
            var bandera = true;

            if(bandera) {

            }
        });

        function get(tipoMenu) {
            var data = '';

            if(tipoMenu == 2) {
                data = {nivel:$('#tipoMenu').val(), id_menu:$('#id_menu').val()};
            }
            $.ajax({
                    url: urlGetLevels,
                    type: 'post',
                    data: data,
                success: function (data) {
                    console.log(data)
                    switch(tipoMenu) {
                        case 1:
                            if(data.data.principal.length > 0) {
                                $.each(data.data.principal, function (i, item) {
                                    $('#id_menu').append($('<option>', { 
                                        value: item.id_menu,
                                        text : item.char_nombre 
                                    }));
                                });
                            } else {
                                $('#id_menu').append('<option value=0 selected="selected">Sin Datos</option>');
                            }
                            
                        break;

                        case 2:

                        break;
                    }
                }
            });
        }
    }

    inicio();
});