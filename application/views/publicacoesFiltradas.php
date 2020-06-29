<div class="conteudo-home container">
    <h1 class="home-titulo">Publicações</h1>

    <?php foreach (array_reverse($publicacoes) as $publicacao) { ?>
        <div class="dados-publicacao">
            <div class="usuario-publicacao">
                <p class="conteudo-usuario"> <?php echo ($publicacao['nomeUsuario']);?> publicou:
                    <?php if ($publicacao['editado'] == 1) { ?>
                        (Editado)
                </p>
            <?php } ?>
            <?php $data = date('d/m/y H:i', strtotime($publicacao['data'])); ?>
            <p class="conteudo-data"> <?php echo ($data); ?></p>
            </div>

            <div class="textos-publicacao">
                <div class="titulo-publicacao">
                    <p class="conteudo-titulo"> <?php echo ($publicacao['titulo']); ?></p>
                </div>

                <div class="texto-publicacao">
                    <p class="conteudo-texto"> <?php echo ($publicacao['conteudo']); ?></p>
                </div>
            </div>
            <?php if (!empty($publicacao['fotoAnexo'])) { ?>            
            <div class="anexo-publicacao">
                <div class="img-publicacao" style="background-image: url('/teste-desenvolvimento-web/img/anexos-pub/<?php echo $publicacao['fotoAnexo'] ?>');"></div>
            </div>
            <?php }?>
            <div class="botoes-publicacao">
                <form method="post" action="minhasPublicacoes/editar">
                    <input type="hidden" id="id" name="id" value=<?php echo ($publicacao['id']) ?> />
                    <button class="btn btn-publicar btn-editar" type="submit">Editar</button>
                </form>
                <form method="post" action="publicacao/deletar">
                    <input type="hidden" id="id" name="id" value=<?php echo ($publicacao['id']) ?> />
                    <button class="btn btn-deletar" type="submit" onclick='return pergunta();'>Deletar</button>
                </form>
            </div>
        </div>
    <?php } ?>
</div>

