<form action="articles/update/<?=$article['id'];?>" method="post" enctype="multipart/form-data">

    <p>
        <label for="">Título</label>
        <input type="text" name="title" value="<?=$article['title'];?>">
    </p>

    <p>
        <label for="">Sumario</label>
        <textarea name="summary"><?=$article['summary'];?></textarea>

    </p>

    <p>
        <label for="">Texto</label>
        <textarea name="text"><?=$article['text'];?></textarea>

    </p>

    <p>
        <label for="">Autor</label>
        <input type="text" name="author" value="<?=$article['author'];?>">

    </p>

    <p>
        <label for="">Imagem</label>
        <input type="text" name="image" value="<?=$article['image'];?>">

    </p>

    <p>
        <label for="">Data</label>
        <input type="date" name="date" value="<?=$article['date'];?>">

    </p>

    <p>
        <label for="">Publicar</label>
        <select name="publish">
            <option value="1">Sim</option>
            <option value="0" <?php if($article['publish'] != 1){echo 'selected';}?>>Não</option>
        </select>

    </p>

    <button>Update</button>

</form>