$("#icone-menu").on("click", function() {
    if ($(".itens-usuario").css("height", "0px")) {
        $(".itens-usuario").addClass("open");
        $(".itens-usuario").removeClass("pointer");
        $(".item-usuario").css("opacity", "1");
        $(".item-usuario").removeClass("pointer");
        $(".icone-menu").addClass("hide");
        $(".icone-menu-fechar").removeClass("hide");
        $(".conteudo-publicacao").css("z-index", "-1");
    }
});

$("#icone-menu-fechar").on("click", function() {
    $(".itens-usuario").removeClass("open");
    $(".itens-usuario").addClass("pointer");
    $(".item-usuario").css("opacity", "0");
    $(".item-usuario").addClass("pointer");
    $(".icone-menu").removeClass("hide");
    $(".icone-menu-fechar").addClass("hide");
    $(".conteudo-publicacao").css("z-index", "1");

})