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
        $("input[name=inputHash]").val("");
        if (hash !== "") {
            var id = $("button[name=hash]").val();
            $.ajax({
                url: "../Controllers/AjaxController.php",
                type: "post",
                data: {"text": hash, "sub": "hashtag", "id": id, "func" : "add"},
                dataType: "json",
                success: function (data) {
                    if (data) {
                        
                        if(data !== true){
                            $(".conten_oldHash").append("\n\
                                <label class='conten_lbl-hash' id='conten_lbl-hash_" + data.id + "'>\n\
                                   " + hash + "\n\
                                   <div class='conten_btn-hashtag'>\n\
                                       <button type='button' class='btn_hashtag' value=" + data.id + ">x</button>\n\
                                   </div>\n\
                               </label>");
                               $("#hashtags").empty();
                        }
                    }
                    $(".btn_hashtag").click(function () {
                        let id = $(this).val();
                        console.log(id);
                        $.ajax({
                            url: "../Controllers/AjaxController.php",
                            type: "post",
                            data: {"id": id, "sub": "hashtag", "func" : "remove"},
                            dataType: "json",
                            success: function (data) {
                                if (data) {
                                    $("#conten_lbl-hash_" + id).remove();
                                } else {
                                    console.log("algo malo ocurrio");
                                }
                            },
                            error: function (data) {
                                console.log(data);
                            }
                        });
                    });
                },
                error: function (data) {
                    console.log(id+ " es la id del post y el texto ingresado es " + hash);
                    console.log(data);
                }
            });
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