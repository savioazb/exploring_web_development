<section class="articles">

    <?php foreach($articles as $article):?>

        <article>
            <img src="assets/images/<?=$article['image'];?>" alt="">
            <h2><?=$article['title'];?></h2>
            <div class="summary"><?=$article['summary'];?></div>

            <a href="articles/show/<?=$article['id'];?>">Ler Mais</a>
        
        </article>

    <?php endforeach;?>


</section>