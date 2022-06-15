/* 
 * SocialSpot 2022
 * Made by: 
 *  jasmet_generico1
 *  soulbroken
 *  Prybet
 */

$(document).ready(function () {


    $("button[name=hash]").click(function () {
        console.log("jajsjasjsjsaj");
        var id = $("button[name=hash]").val();
        var hash = $("#hashtags").val();
        $.ajax({
            url: "../Controllers/AjaxController.php",
            type: "post",
            data: {"hash": hash, "sub": "hash", "id": id},
            success: function (data) {
                if (data) {
                    $("#conthashs").append("<span>" + hash + "</span>");
                }
            },
            error: function (data) {
            }
        });
    });
});