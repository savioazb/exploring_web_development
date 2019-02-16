<section class="articles">

    <article>
        <h2><?=$article['title'];?></h2>

        <img src="assets/images/<?=$article['image'];?>" alt="">

        <?=$article['text'];?>
    </article>

    <section class="comments">

        <?php foreach($comments as $comment):?>

            <div class="comment">

                <strong><?=$comment['author'];?></strong>, <?=$comment['date'];?>
                <p><?=$comment['comment'];?></p>
            
            </div>
        
        
        <?php endforeach;?>

        <form action="articles/post_comment/<?=$article['id'];?>" method="post">
        
            <input type="text" name="author" placeholder="Nome">
            <textarea name="comment" placeholder="Comentário"></textarea>
            <button>Enviar</button>
        
        </form>
    
    </section>

</section>
 