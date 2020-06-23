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