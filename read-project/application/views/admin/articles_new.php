<form action="articles/insert" method="post" enctype="multipart/form-data">

    <p>
        <label for="">Título</label>
        <input type="text" name="title">
    </p>

    <p>
        <label for="">Sumario</label>
        <textarea name="summary"></textarea>

    </p>

    <p>
        <label for="">Texto</label>
        <textarea name="text"></textarea>

    </p>

    <p>
        <label for="">Autor</label>
        <textarea name="author"></textarea>

    </p>

    <p>
        <label for="">Imagem</label>
        <input type="file" name="image">

    </p>

    <p>
        <label for="">Data</label>
        <input type="date" name="date">

    </p>

    <p>
        <label for="">Publicar</label>
        <select name="publish">
            <option value="1">Sim</option>
            <option value="0">Não</option>
        </select>

    </p>

    <button>Enviar</button>

</form>