<?php if($this->session->msg):?>

    <div class="feedback"><?=$this->session->msg;?></div>



<?php endif;?>


<?php foreach ($articles as $article):?>

    <div class="article">
        <div><?=$article['id'];?></div>
        <div> <a href="articles/edit/<?=$article['id'];?>"><?=$article['title'];?></a></div>
        <div><?=$article['date'];?></div>
        <div>

            <?php if($article['publish'] == 1 ):?>

                <a class="published toggle_publish" data-id="<?=$article['id'];?>"></a>
                <?php else:?>
                <a class="unpublished toggle_publish" data-id="<?=$article['id'];?>"></a>


            <?php endif;?>



            
        
        
        </div>
        <div><a href="articles/delete/<?=$article['id'];?>" class="delete">Apagar</a></div>
    
    </div>


<?php endforeach;?>