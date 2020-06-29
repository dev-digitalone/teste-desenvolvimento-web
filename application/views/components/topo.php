<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8" />
    <title>Teste de desenvolvimento</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" href="/teste-desenvolvimento-web/css/topo.css">
    <link rel="stylesheet" href="/teste-desenvolvimento-web/css/publicacao.css">
    <link rel="stylesheet" href="/teste-desenvolvimento-web/css/home.css">
    <link rel="stylesheet" href="/teste-desenvolvimento-web/css/minhaConta.css">
</head>

<body>
    <div class="section-topo col-12">
        <div class="container container-topo">
            <div class="retorno-home col-6">
                <a title="Retornar a home" href="/teste-desenvolvimento-web/home" class="topo-home"><img class="icone-home" src="/teste-desenvolvimento-web/img/icones/home.png"></a>
                <div class="campo-pesquisa" title="Insira um ID de usuário ou nome">
                    <form method="POST" class="caixa-pesquisa" action="/teste-desenvolvimento-web/publicacao/pesquisar">
                        <input type="text" class="conteudo-pesquisa" name="pesquisa" placeholder="Pesquisar">
                        <button type="submit" class=" icone-pesquisa"><img class="icone-home" src="/teste-desenvolvimento-web/img/icones/procurar.png"></button>
                    </form>
                </div>
            </div>
            <div class="infos-usuario col-6">
                <div class="ident-user">
                    <?php if (empty($this->session->foto)) { ?>
                        <div class="img-user-top" style="background-image: url(img/nome.png);"></div>
                    <?php } else { ?>
                        <div class="img-user-top" style="background-image: url('/teste-desenvolvimento-web/img/fotos-usuarios/<?php echo $this->session->foto ?>');"></div>

                    <?php } ?>
                    <?php $nome = explode(" ", $this->session->nome) ?>
                    <p class="nome-usuario"><?php echo ($nome[0]) ?></p>
                </div>
                <div class="botao-menu">
                    <img class="icone-menu" id="icone-menu" src="/teste-desenvolvimento-web/img/icones/icone-menu.png" />
                    <img class="icone-menu-fechar hide" id="icone-menu-fechar" src="/teste-desenvolvimento-web/img/icones/icone-menu.png" />

                    <div class="itens-usuario pointer col-lg-8 col-md-12 col-sm-12">
                        <ul class="lista-itens-usuario">
                            <li title="Nova publicação" class="item-usuario pointer"><img class="item-icone" id="icone-menu-fechar" src="/teste-desenvolvimento-web/img/icones/add.png" /><a class="item" href="/teste-desenvolvimento-web/publicacao">Publicar</a></li>
                            <li title="Informações da conta" class="item-usuario pointer"><img class="item-icone" id="icone-menu-fechar" src="/teste-desenvolvimento-web/img/icones/user.png" /><a class="item" href="/teste-desenvolvimento-web/minhaConta">Minha conta</a></li>
                            <li title="Minhas publicações" class="item-usuario pointer"><img class="item-icone" id="icone-menu-fechar" src="/teste-desenvolvimento-web/img/icones/post.png" /><a class="item" href="/teste-desenvolvimento-web/minhasPublicacoes">Minhas publicações</a></li>
                            <li title="Sair da conta" class="item-usuario pointer"><img class="item-icone" id="icone-menu-fechar" src="/teste-desenvolvimento-web/img/icones/sair.png" /><a class="item" href="/teste-desenvolvimento-web/login/logout">Sair</a></li>
                            <li class="item-usuario item-usuario-pesquisa pointer">
                                <div class="campo-pesquisa-mobile" title="Insira um ID de usuário ou nome">
                                    <form method="POST" class="caixa-pesquisa" action="/teste-desenvolvimento-web/publicacao/pesquisar">
                                        <input type="text" class="conteudo-pesquisa" name="pesquisa" placeholder="Pesquisar">
                                        <button type="submit" class=" icone-pesquisa"><img class="icone-home" src="/teste-desenvolvimento-web/img/icones/procurar.png"></button>
                                    </form>
                                </div>
                            </li>
                        </ul>

                    </div>
                </div>

            </div>
        </div>
    </div>