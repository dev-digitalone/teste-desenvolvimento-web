$(document).ready(function() {
    var url = (window.location.origin + "/teste-desenvolvimento-web/minhaconta/redefineSenha");

    $('#redefinir-senha').submit(function(e) {
        e.preventDefault();
        $.ajax({
            url: url,
            type: "POST",
            data: $("#redefinir-senha").serialize(),
            success: function() {
                if ($('#senha').val() == $('#confirma-senha').val()) {
                    swal("Sucesso!", "Senha alterada!", "success");
                } else {
                    swal("ERRO!", "Os campos das senhas devem ser iguais!", "error");
                }
            },
            error: function(XMLHttpRequest, textStatus, errorThrown) {
                swal("ERRO!", "Houve algum problema no seu cadastro!", "error");
            }
        });
    });

    var urlEmail = (window.location.origin + "/teste-desenvolvimento-web/minhaConta/editEmail");
    $('#redefinir-email').submit(function(e) {
        e.preventDefault();
        $.ajax({
            url: urlEmail,
            type: "POST",
            data: $("#redefinir-email").serialize(),
            success: function(response) {
                if (response == 1) {
                    swal("ERRO!", "E-mail já cadastrado!", "error");
                } else {
                    swal("Sucesso!", "Usuário cadastrado!", "success");
                }
            },
            error: function(XMLHttpRequest, textStatus, errorThrown) {
                swal("ERRO!", "Houve algum problema no seu cadastro!", "error");
            }
        });
    });
});