/* 
 * SocialSpot 2022
 * Made by: 
 *  jasmet_generico1
 *  soulbroken
 *  Prybet
 */

$(document).ready(function () {


    $("button[name=hash]").click(function () {
        var text = $("#hashtags").val();
        var hash = toHashTag(text);
        if (hash !== "") {
            var id = $("button[name=hash]").val();
            $.ajax({
                url: "../Controllers/AjaxController.php",
                type: "post",
                data: {"hash": hash, "sub": "hash", "id": id},
                success: function (data) {
                    console.log(data);
                    if (data) {
                        $("#conthashs").append("<input type='text' name='hash-' value=" + hash + " hidden>");
                        $("#conthashs").append("<span>" + hash + "</span>");
                    }
                },
                error: function (data) {
                }
            });
        } else {
        }
    });
});


function toHashTag(text) {
    var text = text.replace(/\s+/g, "");
    var text = text.replaceAll("#", "");
    var text = text.replaceAll("'", "");
    var text = text.replaceAll("\"", "");
    return text;
} 