<div class="container">
    <div class="conteudo-publicacao col-12">
        <h1 class="txt-publicacao">Editar publicação</h1>
        <form method="post" action="../publicacao/editPublicacao" class="form-publicacao col-lg-8 col-md-12 col-sm-12" id="form-editar">
            <label class="form-txt" for="form-txt">Título</label>
            <input type="text" id="titulo" name="titulo" class="titulo row col-12 campo" value="<?php print_r($publicacao[0]['titulo']); ?>" />
            <label class="form-txt" for="form-txt">Conteúdo</label>
            <textarea type="text" id="conteudo" name="conteudo" class="conteudo row col-12 campo"><?php print_r($publicacao[0]['conteudo']); ?></textarea>
            <input type="hidden" id="id" name="id" value=<?php print_r($publicacao[0]['id']); ?> />
            <input type="hidden" id="editado" name="editado" value=1 />
            <div class="botoes row">
                <button type="submit" class="btn btn-publicar">Editar</button>

                <div class="item-anexo" data-toggle="modal" data-target=".modal-img">
                    <p class="btn btn-publicar btn-anexo">Inserir anexo</p>
                </div>
                <a class="btn btn-voltar" href="/teste-desenvolvimento-web/home">Voltar para todas as publicações</a>
            </div>
        </form>
        <div class="modal fade modal-img" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-sm">
                <div class="modal-content">
                    <div id="inserir-imagem" class="inserir-imagem">
                        <form method="post" id="foto-usuario" class="conteudo-form" action="../publicacao/setFoto" enctype="multipart/form-data">
                            <h1>Selecione a imagem desejada</h1>

                            <div class="form-input">
                                <input name="foto" type="file" class="input-foto" id="foto" accept="image/*">
                                <input type="hidden" id="id" name="id" value=<?php print_r($publicacao[0]['id']); ?> />
                                <label class="label-foto" for="foto">Arquivo</label>
                            </div>
                            <button type="submit" class="confirmar-btn">Inserir</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>