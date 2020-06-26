<div class="container">
    <div class="conteudo-publicacao col-12">
        <h1 class="txt-publicacao">Editar publicação</h1>
        <form method="post" action="../publicacao/editPublicacao" class="form-publicacao col-lg-8 col-md-12 col-sm-12" id="form-editar">
            <label class="form-txt" for="form-txt">Título</label>
            <input type="text" id="titulo" name="titulo" class="titulo row col-12 campo" value="<?php print_r($publicacao[0]['titulo']); ?>" />
            <label class="form-txt" for="form-txt">Conteúdo</label>
            <textarea type="text" id="conteudo" name="conteudo" class="conteudo row col-12 campo"><?php print_r($publicacao[0]['conteudo']); ?></textarea>
            <input type="hidden" id="id" name="id" value=<?php print_r($publicacao[0]['id']); ?> />
            <input type="hidden" id="editado" name="editado" value= 1 />
            <div class="botoes row">
                <button type="submit" class="btn btn-publicar">Editar</button>
                <a class="btn btn-voltar" href="/teste-desenvolvimento-web/home">Voltar para todas as publicações</a>
            </div>
        </form>
    </div>
</div>