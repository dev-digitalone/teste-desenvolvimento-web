<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <title>Login</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" href="/teste-desenvolvimento-web/css/login.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
</head>

<body>
    <div class="conteudo">
        <div class="section-side">
            <img src="/teste-desenvolvimento-web/img/logo-digital-one.png" />

            <p class="texto-section-side texto1">Insira seus dados de acesso</p><br>
            <div class="itens-cadastro">
                <p class="item texto-cadastrar">Cadastrar</p>
                <p class="item texto-login">Login</p>
            </div>
        </div>

        
        <div id="section-login" id="#form-login" class="section-login form-login">
            <form method="post" id="form-logar" class="login-form" action="login/autenticar">
            <?php if ($this->session->flashdata("danger")) : ?>
            <p class="msg-erro"><?= $this->session->flashdata("danger") ?></p>
        <?php endif ?>
                <h1>Login</h1>

                <div class="form-input">
                    <input type="email" id="email-login" name="email-login" required>
                    <span data-placeholder="*E-mail"></span>
                </div>

                <div class="form-input">
                    <input type="password" id="senha-login" name="senha-login" required>
                    <span data-placeholder="*Senha"></span>
                </div>

                <div class="texto-senha">
                    <button data-toggle="modal" data-target="#modal-esqueci-senha" class="btn">Esqueci minha senha</button>
                </div>

                <button type="submit" class="login-btn">Entrar</button>
            </form>
        </div>

        <div id="section-cadastro" class="section-cadastro">

            <form method="post" id="form-cadastro" class="login-form form-cadastro">
                <h1>Cadastre-se</h1>

                <div class="form-input input-cadastro">
                    <input type="text" id="nome" name="nome" required>
                    <span data-placeholder="*Nome"></span>
                </div>

                <div class="form-input input-cadastro">
                    <input type="email" id="email" name="email" required>
                    <span data-placeholder="*E-mail"></span>
                </div>
                <div class="form-input input-cadastro">
                    <input type="password" id="senha" name="senha" required>
                    <span data-placeholder="*Senha"></span>
                </div>

                <input type="submit" class="login-btn cadastrar-btn"></input>
            </form>
        </div>

        <div class="modal" id="modal-esqueci-senha">
            <div class="conteudo-modal">
                <p>Insira seu e-mail</p>
                <input type="email" id="email" name="recuperar-email" required>
                <button type="submit" class="btn">Enviar</button>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="/teste-desenvolvimento-web/js/login.js"></script>
</body>

</html>