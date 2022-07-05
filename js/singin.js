/* 
 * SocialSpot 2022
 * Made by: 
 *  jasmet_generico1
 *  soulbroken
 *  Prybet
 */
$(document).ready(function () {
    $("input[name=email]").change(function () {
        var email = $(this).val();
        $.ajax({
            url: "../Controllers/AjaxController.php",
            type: "post",
            data: {"email": email, "sub": "email"},
            dataType: "json"
        }).done(function (data) {

            if (data) {
                $("button[name=submit]").prop("disabled", true);
                $(".lbl_email").prop("hidden", false);
                $("input[name=email]").addClass("input_field_danger");
            } else {
                $("button[name=submit]").prop("disabled", false);
                $(".lbl_email").prop("hidden", true);
                $("input[name=email]").removeClass("input_field_danger");
            }

        });
    });
    $("input[name=user]").change(function () {
        var user = $(this).val();
        $.ajax({
            url: "../Controllers/AjaxController.php",
            type: "post",
            data: {"user": user, "sub": "user"},
            dataType: "json"
        }).done(function (data) {

            if (data) {
                $("button[name=submit]").prop("disabled", true);
                $(".lbl_user").prop("hidden", false);
                $("input[name=user]").addClass("input_field_danger");

            } else {
                $("button[name=submit]").prop("disabled", false);
                $(".lbl_user").prop("hidden", true);
                $("input[name=user]").removeClass("input_field_danger");
            }

        });
    });

    $(document).on('keyup', '#email', function () {
        document.querySelector("#email").value = document.querySelector("#email").value.replace(/\s+/g, "");
    });
    $(document).on('keyup', '#username', function () {
        document.querySelector("#username").value = document.querySelector("#username").value.replace(/\s+/g, "");
    });
    $(document).on('keyup', '#name', function () {
        if (document.querySelector("#name").value.startsWith(" ")) {
            document.querySelector("#name").value = document.querySelector("#name").value.replace(/\s+/g, "");
        }
    });

});
