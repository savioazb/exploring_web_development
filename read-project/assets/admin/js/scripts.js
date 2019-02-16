$(document).ready(function(){

    $('.toggle_publish').click(function(e){

        var target = $(this);
        var id = $(this).attr('data-id');
        

        var link = 'articles/publish/' + id;

        if($(this).hasClass('published')){
            
            link = 'articles/unpublish/' + id;
        }
        

        $.ajax({
            url: link,
            success:function(){

                if(target.hasClass('published')){
                    target.addClass('unpublished').removeClass('published');
                }else{
                    target.addClass('published').removeClass('unpublished');
                }
                

            }
        })


    });

    $('.delete').click(function(){
        if (!confirm("Tem a certeza que quer apagar?")){
            return false;
        }
    });

   



});