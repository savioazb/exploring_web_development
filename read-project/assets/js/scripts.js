$(document).ready(function(){

    $('.contact_form').submit(function(event){

        $.ajax({

            url: 'pages/send_comment',
            method: 'POST',
            data: $('.contact_form').serialize(),
            success: function(msg){

                $('.feedback').text(msg);
                $('.contact_form').hide();

            },
            error:function(){
                $('.feedback').text('Não foi possível enviar!');
                $('.contact_form').hide();

            }

        });

        event.preventDefault();

    })



});