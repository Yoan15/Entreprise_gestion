$("#form-id").on("submit", function(e){
    e.preventDefault();
    const usernameInput = $("#username").val();
    const passwordInput = $("#password").val();
    if (usernameInput && passwordInput){
        $("<div>").attr({class: "alert alert-success", role: "alert"}).html("Formulaire correcte.").appendTo($("#message").empty())
    } else {
        $("<div>").attr({class: "alert alert-danger", role: "alert"}).html("Formulaire incorrecte.").appendTo($("#message").empty())
    }
});