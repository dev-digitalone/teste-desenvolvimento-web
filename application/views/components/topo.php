<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" href="/teste-desenvolvimento-web/css/topo.css">
    <link rel="stylesheet" href="/teste-desenvolvimento-web/css/publicacao.css">
</head>

<body>
    <div class="section-topo col-12">
        <div class="container container-topo">
            <div class="infos-usuario col-5">

                <img class="icone-menu" id="icone-menu" src="/teste-desenvolvimento-web/img/icones/icone-menu.png" />
                <img class="icone-menu-fechar hide" id="icone-menu-fechar" src="/teste-desenvolvimento-web/img/icones/icone-menu.png" />
                <p class="nome-usuario"><?php echo ($this->session->nome) ?></p>

            </div>
            <div class="itens-usuario pointer col-lg-3 col-md-4 col-sm-4">
                <ul class="lista-itens-usuario">
                    <li title="Nova publicação" class="item-usuario pointer"><img class="item-icone" id="icone-menu-fechar" src="/teste-desenvolvimento-web/img/icones/add.png" /><a class="item" href="publicacao">Publicar</a></li>
                    <li title="Informações da conta" class="item-usuario pointer"><img class="item-icone" id="icone-menu-fechar" src="/teste-desenvolvimento-web/img/icones/user.png" /><a class="item" href="#">Minha conta</a></li>
                    <li title="Cadastrar um novo usuário" class="item-usuario pointer"><img class="item-icone" id="icone-menu-fechar" src="/teste-desenvolvimento-web/img/icones/new-user.png" /><a class="item" href="#">Novo usuario</a></li>
                    <li title="Sair da conta" class="item-usuario pointer"><img class="item-icone" id="icone-menu-fechar" src="/teste-desenvolvimento-web/img/icones/sair.png" /><a class="item" href="login/logout">Sair</a></li>
                </ul>

            </div>
            <a title="Retornar a home" href="/teste-desenvolvimento-web/home"><img class="icone-home" src="/teste-desenvolvimento-web/img/icones/home.png"></a>
        </div>
    </div>