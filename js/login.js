$(".form-input input").on("focus", function() {
    $(this).addClass("focus");
});

$(".form-input input").on("blur", function() {
    if ($(this).val() == "")
        $(this).removeClass("focus");
});

$(".texto-login").on("click", function() {
    if ($(".form-login").css("display", "block")) {
        $(".form-cadastro").css("display", "none");
    };
});

$(".texto-cadastrar").on("click", function() {
    if ($(".form-login").css("display", "none")) {
        $(".form-cadastro").css("display", "block");
    };
});

$(document).ready(function() {
    var url = (window.location.origin + "/teste-desenvolvimento-web/usuario/novoUsuario")

    $('#form-cadastro').submit(function(e) {
        e.preventDefault();
        $.ajax({
            url: url,
            type: "POST",
            data: $("#form-cadastro").serialize(),
            success: function(response) {
                if (response == 1) {
                    swal("ERRO!", "E-mail já cadastrado!", "error");
                } else {
                    swal("Sucesso!", "Usuário cadastrado!", "success");
                    $('#nome').val("");
                    $('#email').val("");
                    $('#senha').val("");
                }
            },
            error: function(XMLHttpRequest, textStatus, errorThrown) {
                swal("ERRO!", "Houve algum problema no seu cadastro!", "error");
            }
        });
    });
});