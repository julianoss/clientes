$(function () {
    var form = $("#formCadastro");
    var errorText = $("#errorText");

    form.on("submit", function () {
        return validate();
    });

    function validate() {
        var valid = true;

        $.each(form.serializeArray(), function (i, object) {
            var element = $("input[name='"+object.name+"']");

            if(element.val().trim() == "") {
                element.parent().parent().addClass("has-error").removeClass("has-success");
                valid = false;
            } else {
                element.parent().parent().addClass("has-success").removeClass("has-error");
            }
        });

        if(!valid) {
            errorText.removeClass("hidden");
        } else {
            errorText.addClass("hidden");
        }

        return valid;
    }
});