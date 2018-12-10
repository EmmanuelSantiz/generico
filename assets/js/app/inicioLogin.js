$(function() {
    var bandera = true;
    var login = function() {

        $('#logear').click(function(event) {
            
            $('#form-login input').each(function(index, el) {
                if($(el).val() == '') {
                    $(el).parent().find('.help-block').html('<font color="red">Este campo no puede estar vacio</font>');
                    bandera = false;
                }
            });

            if(bandera) {
                $('#logear').prop("disabled", true);
                get();
            }

            return false;
        });

        $('.form-control').on('keypress, change', function() {
            if($(this).val() != '') {
                $(this).parent().find('.help-block').html('').fadeOut('fast');
                bandera = true;
            }
        });

        function get() {
            $.post(ajaxUrl, {char_user: $('#char_user').val(), char_password: $('#char_password').val()}, function(data) {
                console.log(data);
                if(data.data) {
                    localStorage.setItem('msj', true);
                    localStorage.setItem("id_perfil", data.id_perfil);
                    location.reload();
                } else {
                    $('#logear').prop("disabled", false);
                    $('#errorLogin').show("fast");
                    $('#errorLogin').hide(6000);
                }

            });
        }
        

    }

    login();

});