<?php 
    include __DIR__ . '/../inicio-html.php';
?>
        
        <a href='formulario-novo-curso.php' class='btn btn-primary mb-2'>
            Cadastrar curso
        </a>

        <form action="/salvar-curso<?= isset($curso) ? '?id= ' . $curso->getId() : ''; ?>" method="post">
            <div class='input-group'>
                <label for="descricao">Descricao</label>
                <input type="text" name="descricao" value="<?= isset($curso) ? $curso->getDescricao() : ''; ?>" class="form-control">
            </div>
            <button class='btn btn-primary'> Salvar</button>
        </form>

<?php 
    include __DIR__ . '/../fim-html.php';
?>