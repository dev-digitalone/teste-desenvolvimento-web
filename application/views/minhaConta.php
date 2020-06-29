    <div class="container conteudo-minha-conta">
        <div class="card text-white col-lg-2 col-md-2" data-toggle="modal" data-target=".modal-senha">
            <img class="card-img-top" src="/teste-desenvolvimento-web/img/senha.png" alt="Card image cap">
            <div class="card-body">
                <p class="card-text">Redefinir senha</p>
            </div>
        </div>
        <div class="card text-white col-lg-2 col-md-2" data-toggle="modal" data-target=".modal-nome">
            <img class="card-img-top" src="/teste-desenvolvimento-web/img/nome.png" alt="Card image cap">
            <div class="card-body">
                <p class="card-text">Alterar nome</p>
            </div>
        </div>
        <div class="card text-white col-lg-2 col-md-2" data-toggle="modal" data-target=".modal-email">
            <img class="card-img-top" src="/teste-desenvolvimento-web/img/mail.png" alt="Card image cap">
            <div class="card-body">
                <p class="card-text">Alterar e-mail</p>
            </div>
        </div>
        <div class="card text-white col-lg-2 col-md-2" data-toggle="modal" data-target=".modal-img">
            <img class="card-img-top" src="/teste-desenvolvimento-web/img/foto.png" alt="Card image cap">
            <div class="card-body">
                <p class="card-text">Alterar imagem</p>
            </div>
        </div>

        <div class="modal fade modal-senha" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-sm">
                <div class="modal-content">
                    <div id="redefinir-senha-conteudo" class="redefinir-senha-conteudo">
                        <form method="post" id="redefinir-senha" class="conteudo-form">
                            <h1>Insira sua nova senha</h1>

                            <div class="form-input">
                                <input type="password" id="senha" name="senha" required>
                                <span data-placeholder="*Senha"></span>
                            </div>

                            <div class="form-input">
                                <input type="password" id="confirma-senha" name="confirma-senha" required>
                                <span data-placeholder="*Confirme sua senha"></span>
                            </div>
                            <button title="As duas senhas devem ser iguais" type="submit" class="confirmar-btn redefinir-btn">Redefinir</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade modal-nome" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-sm">
                <div class="modal-content">
                    <div id="redefinir-nome" class="redefinir-nome">
                        <form method="post" id="redefinir-nome" class="conteudo-form" action="minhaConta/editNome">
                            <h1>Insira o nome desejado</h1>

                            <div class="form-input">
                                <input type="text" id="nome" name="nome" required>
                                <span data-placeholder="*Nome"></span>
                            </div>
                            <button type="submit" class="confirmar-btn">Redefinir</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade modal-email" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-sm">
                <div class="modal-content">
                    <div id="conteudo-redefinir-email" class="conteudo-redefinir-email">
                        <form method="post" id="redefinir-email" class="conteudo-form">
                            <h1>Insira o e-mail desejado</h1>

                            <div class="form-input">
                                <input type="email" id="email" name="email" required>
                                <span data-placeholder="*E-mail"></span>
                            </div>
                            <button type="submit" class="confirmar-btn">Redefinir</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade modal-img" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-sm">
                <div class="modal-content">
                    <div id="inserir-imagem" class="inserir-imagem">
                        <form method="post" id="foto-usuario" class="conteudo-form" action="minhaConta/setFoto" enctype="multipart/form-data">
                            <h1>Selecione a imagem desejada</h1>

                            <div class="form-input">
                                <input name="foto" type="file" class="input-foto" id="foto" accept="image/*">
                                <label class="label-foto" for="foto">Arquivo</label>
                            </div>

                            <button type="submit" class="confirmar-btn">Redefinir</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>