$(".form-input input").on("focus", function() {
    $(this).addClass("focus");
});

$(".form-input input").on("blur", function() {
    if ($(this).val() == "")
        $(this).removeClass("focus");
});


$(document).ready(function() {
    var url = (window.location.origin + "/teste-desenvolvimento-web/publicacao/novaPublicacao")

    $('#form-publicacao').submit(function(e) {
        e.preventDefault();
        $.ajax({
            url: url,
            type: "POST",
            data: $("#form-publicacao").serialize(),
            success: function(response) {
                swal("Sucesso!", "Publicação cadastrada!", "success");
                $('#titulo').val("");
                $('#conteudo').val("");
            },
            error: function(XMLHttpRequest, textStatus, errorThrown) {
                swal("ERRO!", "Houve algum problema no seu cadastro!", "error");
            }
        });
    });
});