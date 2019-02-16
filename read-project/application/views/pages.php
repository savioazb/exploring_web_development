<section>
    <h1><?=$page['title'];?></h1>
    <?=$page['text'];?>

    <?php if($page['id'] == 2):?>

        <form action="" method="post" class="contact_form">
            <input type="text" name="name" placeholder="Nome">
            <textarea name="message" placeholder="Mensagem"></textarea>
            <button>Enviar</button>
        
        </form>

        <div class="feedback"></div>

    <?php endif;?>

</section>
